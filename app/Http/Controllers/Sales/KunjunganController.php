<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\KunjunganRequest;
use App\Models\Kunjungan;
use App\Models\Klien;
use App\Models\Produk;
use App\Models\ProfilSales;
use App\Models\Jadwal;
use App\Models\FotoKunjungan;
use App\Models\TimSales;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB; 


class KunjunganController extends Controller
{

       public function index(Request $request) {
        $userId = Auth::id();
        $profil_sales = ProfilSales::where('id_users', $userId)->first();
        
        if (!$profil_sales) {
            return redirect()->route('sales.profil_sales.index')
                             ->with('error', 'Anda belum memiliki profil sales.');
        }
        
        $tim_sales_id = $profil_sales->id_tim_sales;
        $profil_sales_tim = ProfilSales::where('id_tim_sales', $tim_sales_id)->pluck('id_profile_sales');
        
        $query = Kunjungan::whereIn('id_profile_sales', $profil_sales_tim);
        
        // Text search
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->whereHas('klien', function ($subq) use ($search) {
                    $subq->where('nama_klien', 'like', "%$search%");
                })->orWhereHas('produk', function ($subq) use ($search) {
                    $subq->where('nama_produk', 'like', "%$search%");
                })->orWhereHas('profil_sales', function ($subq) use ($search) {
                    $subq->where('nama', 'like', "%$search%");
                })->orWhere('status', 'like', "%$search%");
            });
        }
        
        // Date filtering
        if ($request->has('tanggal_mulai') && !empty($request->tanggal_mulai)) {
            $query->whereDate('waktu_mulai', '>=', $request->tanggal_mulai);
        }
        
        if ($request->has('tanggal_selesai') && !empty($request->tanggal_selesai)) {
            $query->whereDate('waktu_mulai', '<=', $request->tanggal_selesai);
        }
        
        $query->orderBy('waktu_mulai', 'desc');
        
        $kunjungan = $query->paginate(10)->withQueryString();
        
        return view('sales.kunjungan.index', compact('profil_sales', 'kunjungan'));
    }

    public function detail($id) {
        $userId = Auth::id();
        $profil_sales = ProfilSales::where('id_users', $userId)->first();
        
        if (!$profil_sales) {
            return redirect()->route('sales.profil_sales.index')
                             ->with('error', 'Anda belum memiliki profil sales.');
        }
    
        // Ambil data kunjungan beserta relasi
        $kunjungan = Kunjungan::with(['produk', 'klien', 'profil_sales', 'jadwal'])->findOrFail($id);
    
        // Cek apakah pengguna dalam tim yang sama dengan pemilik kunjungan
        if ($kunjungan->profil_sales->id_tim_sales !== $profil_sales->id_tim_sales) {
            return redirect()->route('sales.kunjungan.index')
                             ->with('error', 'Anda tidak memiliki izin untuk melihat detail kunjungan ini.');
        }
    
        return view('sales.kunjungan.detail', compact('kunjungan'));
    }
    
    
    


    /**
     * Memproses validasi lokasi via AJAX untuk sales.
     */
    public function validateLocation_sales(Request $request) {
        $request->validate([
            'user_latitude'  => 'required|numeric',
            'user_longitude' => 'required|numeric',
            'jadwal'         => 'required|exists:jadwal,id_jadwal',
        ]);
    
        $userLat = $request->input('user_latitude');
        $userLon = $request->input('user_longitude');
        $jadwal = Jadwal::with('lokasi')->findOrFail($request->jadwal);
        $targetLat = $jadwal->lokasi->latitude;
        $targetLon = $jadwal->lokasi->longitude;
    
        // Ambang toleransi, misalnya 0.5 km (500 meter)
        $allowedDistance = 0.5;
        $distance = $this->calculateDistance($userLat, $userLon, $targetLat, $targetLon);
    
        if ($distance <= $allowedDistance) {
            // Simpan ID jadwal yang tervalidasi di session
            session()->put('location_validated_sales', $request->jadwal);
            return response()->json(['status' => 'success']);
        } else {
            return response()->json([
                'status'  => 'fail',
                'message' => 'Anda tidak berada di lokasi yang dimaksud. Jarak Anda: ' . round($distance * 1000) . ' meter.'
            ]);
        }
    }
    
    /**
     * Halaman create kunjungan untuk sales.
     * Hanya dapat diakses jika validasi lokasi telah dilakukan.
     */
    public function create(Request $request) {
        $jadwalId = $request->input('jadwal');
        $jadwal = Jadwal::findOrFail($jadwalId);
    
        // Jika validasi lokasi belum dilakukan, redirect langsung ke halaman jadwal
        if (!session()->has('location_validated_sales') || session()->get('location_validated_sales') != $jadwalId) {
            return redirect()->route('sales.jadwal.index')
                   ->with('error', 'Silakan validasi lokasi terlebih dahulu.');
        }
    
        $klien = Klien::all();
        $produk = Produk::all();
        $userId = Auth::id();
        $profil_sales = ProfilSales::where('id_users', $userId)->first();
        if (!$profil_sales) {
            return redirect()->route('sales.profil_sales.index')
                            ->with('error', 'Anda belum memiliki profil sales.');
        }
    
        return view('sales.kunjungan.create', compact('klien', 'produk', 'profil_sales', 'jadwal'));
    }
    
    

    public function store(KunjunganRequest $request)
    {
        DB::beginTransaction(); // Mulai transaksi
    
        try {
            // Simpan data kunjungan
            $kunjungan = Kunjungan::create($request->validated());
    
            // Jika gagal menyimpan, rollback dan tampilkan error
            if (!$kunjungan) {
                DB::rollBack();
                return back()->with('error', 'Kunjungan gagal disimpan!');
            }
    
            // Upload foto jika ada
            if ($request->hasFile('foto_kunjungan')) {
                foreach ($request->file('foto_kunjungan') as $foto) {
                    $path = $foto->store('foto_kunjungan', 'public');
                    FotoKunjungan::create([
                        'id_kunjungan' => $kunjungan->id_kunjungan,
                        'foto' => $path,
                    ]);
                }
            }
    
            DB::commit(); // Simpan transaksi
            return redirect()->route('sales.kunjungan.index')->with('success', 'Kunjungan Berhasil Ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack(); // Batalkan transaksi jika ada error
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Menghitung jarak antara dua koordinat dengan rumus Haversine.
     * Hasil dalam kilometer.
     */
    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $R = 6371; // Radius bumi (km)
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $R * $c;
    }
}
