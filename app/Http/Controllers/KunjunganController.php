<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Klien;
use App\Models\Produk;
use App\Models\ProfilSales;
use App\Models\Jadwal;
use App\Models\FotoKunjungan;
use App\Models\TimSales;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KunjunganController extends Controller
{
    // ---------------------------- ADMIN --------------------------------
    public function index(Request $request) {
        $query = Kunjungan::orderBy('id_kunjungan', 'desc');
    
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->whereHas('klien', function ($q) use ($search) {
                $q->where('nama_klien', 'like', "%$search%");
            })->orWhereHas('produk', function ($q) use ($search) {
                $q->where('nama_produk', 'like', "%$search%");
            })->orWhereHas('profil_sales', function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%");
            })->orWhere('status', 'like', "%$search%");
        }
    
        $kunjungan = $query->paginate(10);
        
        return view('admin.kunjungan.index', compact('kunjungan'));
    }
    

    public function create() {
        $klien = Klien::all();
        $produk = Produk::all();
        $profil_sales = ProfilSales::all();
        $jadwal = Jadwal::all();
        return view('admin.kunjungan.create', compact('klien', 'produk', 'profil_sales', 'jadwal'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_klien' => 'required|exists:klien,id_klien',
            'id_produk' => 'required|exists:produk,id_produk',
            'id_profile_sales' => 'required|exists:profil_sales,id_profile_sales',
            'id_jadwal' => 'required|exists:jadwal,id_jadwal',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date',
            'deskripsi_aktivitas' => 'required|string',
            'status' => 'required|string',
            'foto_kunjungan.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Simpan data kunjungan
        $kunjungan = Kunjungan::create([
            'id_klien' => $request->id_klien,
            'id_produk' => $request->id_produk,
            'id_profile_sales' => $request->id_profile_sales,
            'id_jadwal' => $request->id_jadwal,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'deskripsi_aktivitas' => $request->deskripsi_aktivitas,
            'status' => $request->status,
        ]);
    
        if (!$kunjungan) {
            return back()->with('error', 'Kunjungan gagal disimpan!');
        }
    
        // Upload foto
        if ($request->hasFile('foto_kunjungan')) {
            foreach ($request->file('foto_kunjungan') as $foto) {
                $path = $foto->store('foto_kunjungan', 'public');
                FotoKunjungan::create([
                    'id_kunjungan' => $kunjungan->id_kunjungan,
                    'foto' => $path,
                ]);
            }
        }
    
        return redirect()->route('kunjungan.index')->with('success', 'Kunjungan Berhasil Ditambahkan!');
    }

    public function edit($id)
{
    $kunjungan = Kunjungan::findOrFail($id);
    $klien = Klien::all();
    $produk = Produk::all();
    $profil_sales = ProfilSales::all();
    $jadwal = Jadwal::all();
    $foto_kunjungan = FotoKunjungan::where('id_kunjungan', $id)->get();
    
    return view('admin.kunjungan.edit', compact('kunjungan', 'klien', 'produk', 'profil_sales', 'jadwal', 'foto_kunjungan'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'id_klien' => 'required|exists:klien,id_klien',
        'id_produk' => 'required|exists:produk,id_produk',
        'id_profile_sales' => 'required|exists:profil_sales,id_profile_sales',
        'id_jadwal' => 'required|exists:jadwal,id_jadwal',
        'waktu_mulai' => 'required|date',
        'waktu_selesai' => 'required|date',
        'deskripsi_aktivitas' => 'required|string',
        'status' => 'required|string',
        'foto_kunjungan.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $kunjungan = Kunjungan::findOrFail($id);
    
    $kunjungan->update([
        'id_klien' => $request->id_klien,
        'id_produk' => $request->id_produk,
        'id_profile_sales' => $request->id_profile_sales,
        'id_jadwal' => $request->id_jadwal,
        'waktu_mulai' => $request->waktu_mulai,
        'waktu_selesai' => $request->waktu_selesai,
        'deskripsi_aktivitas' => $request->deskripsi_aktivitas,
        'status' => $request->status,
    ]);

    if (!$kunjungan) {
        return back()->with('error', 'Kunjungan gagal diperbarui!');
    }

    // Upload foto baru jika ada
    if ($request->hasFile('foto_kunjungan')) {
        foreach ($request->file('foto_kunjungan') as $foto) {
            $path = $foto->store('foto_kunjungan', 'public');
            FotoKunjungan::create([
                'id_kunjungan' => $kunjungan->id_kunjungan,
                'foto' => $path,
            ]);
        }
    }

    // Hapus foto yang dipilih untuk dihapus
    if ($request->has('hapus_foto')) {
        foreach ($request->hapus_foto as $id_foto) {
            $foto = FotoKunjungan::findOrFail($id_foto);
            Storage::disk('public')->delete($foto->foto);
            $foto->delete();
        }
    }

    return redirect()->route('kunjungan.index')->with('success', 'Kunjungan Berhasil Diperbarui!');
}
    public function show() {
        $produk = Produk::all();
        $klien = Klien::all();
       
        $profil_sales = ProfilSales::all();
        $jadwal = Jadwal::all();
        return view('admin.kunjungan.index', compact('produk', 'klien', 'profil_sales','jadwal'));
    }

    public function detail($id) {
        $kunjungan = Kunjungan::with(['produk', 'klien', 'profil_sales', 'jadwal'])->findOrFail($id);
        
        return view('admin.kunjungan.detail', compact('kunjungan'));
    }
    

    // ------------------------------------ SALES ----------------------------------

    public function index_sales() {
        $userId = Auth::id();
        $profil_sales = ProfilSales::where('id_users', $userId)->first();
        if (!$profil_sales) {
            return redirect()->route('sales.profil_sales.index')
                             ->with('error', 'Anda belum memiliki profil sales.');
        }
        $tim_sales_id = $profil_sales->id_tim_sales;
        $profil_sales_tim = ProfilSales::where('id_tim_sales', $tim_sales_id)->pluck('id_profile_sales');
        $kunjungan = Kunjungan::whereIn('id_profile_sales', $profil_sales_tim)->paginate(10);
        return view('sales.kunjungan.index', compact('profil_sales', 'kunjungan'));
    }
    
    /**
     * Halaman validasi lokasi untuk sales.
     * URL misal: /sales/kunjungan/validate_sales?jadwal=2
     */
    public function showValidationPage_sales(Request $request) {
        $jadwalId = $request->query('jadwal');
        return view('sales.kunjungan.validate', compact('jadwalId'));
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
    public function create_sales(Request $request) {
        $jadwalId = $request->input('jadwal');
        $jadwal = Jadwal::findOrFail($jadwalId);
    
        // Cek apakah validasi lokasi sudah dilakukan dan ID jadwal tervalidasi sama dengan jadwal yang diminta
        if (!session()->has('location_validated_sales') || session()->get('location_validated_sales') != $jadwalId) {
            return redirect()->route('sales.kunjungan.validate_sales', ['jadwal' => $jadwalId])
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
    

    public function store_sales(Request $request) { 
        $validatedData = $request->validate([
            'id_klien' => 'required|exists:klien,id_klien',
            'id_produk' => 'required|exists:produk,id_produk',
            'id_profile_sales' => 'required|exists:profil_sales,id_profile_sales',
            'id_jadwal' => 'required|exists:jadwal,id_jadwal',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date',
            'deskripsi_aktivitas' => 'required|string',
            'status' => 'required|string',
            'foto_kunjungan.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $kunjungan = Kunjungan::create([
            'id_klien' => $request->id_klien,
            'id_produk' => $request->id_produk,
            'id_profile_sales' => $request->id_profile_sales,
            'id_jadwal' => $request->id_jadwal,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'deskripsi_aktivitas' => $request->deskripsi_aktivitas,
            'status' => $request->status,
        ]);
    
        if (!$kunjungan) {
            return back()->with('error', 'Kunjungan gagal disimpan!');
        }
    
        if ($request->hasFile('foto_kunjungan')) {
            foreach ($request->file('foto_kunjungan') as $foto) {
                $path = $foto->store('foto_kunjungan', 'public');
                FotoKunjungan::create([
                    'id_kunjungan' => $kunjungan->id_kunjungan,
                    'foto' => $path,
                ]);
            }
        }
    
        return redirect()->route('sales.kunjungan.index')->with('success', 'Kunjungan Berhasil Ditambahkan!');
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
