<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\TimSales;
use App\Models\Lokasi;
use App\Models\ProfilSales;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index(Request $request) {
        $query = Jadwal::query();
        
        // Text search for tim_sales name
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->whereHas('tim_sales', function ($q) use ($search) {
                $q->where('nama_tim_sales', 'like', "%$search%");
            });
        }
        
        // Date filtering for tanggal_kunjungan
        if ($request->has('tanggal_kunjungan') && !empty($request->tanggal_kunjungan)) {
            $query->whereDate('tanggal_kunjungan', $request->tanggal_kunjungan);
        }
        
        // Sort by latest first
        $query->orderBy('tanggal_kunjungan', 'desc');
        
        $jadwal = $query->paginate(10)->withQueryString();
        
        return view('admin.jadwal.index', compact('jadwal'));
    }
    
    public function create() {

        $tim_sales = TimSales::all();
        $lokasi = Lokasi::all();
        return view('admin.jadwal.create',compact('tim_sales','lokasi'));
    }


    public function store(Request $request) {
        $validatedData = $request->validate([
            'id_lokasi' => 'required|exists:lokasi,id_lokasi',
            'id_tim_sales' => 'required|exists:tim_sales,id_tim_sales',
            'tanggal_kunjungan' => 'required|date',
            'status' => 'required|string',
        ]);

        Jadwal::create($validatedData);
        
        return redirect()->route('jadwal.index')->with('success', 'Jadwal Berhasil Ditambahkan!');
    }

    public function edit($id) {

        $jadwal = Jadwal::findOrFail($id);
        $tim_sales = TimSales::all();
        $lokasi = Lokasi::all();

        return view('admin.jadwal.edit',compact('jadwal','tim_sales','lokasi'));
    }

    public function update(Request $request, $id) {

        $jadwal = Jadwal::findOrFail($id);

        $validatedData = $request->validate([
            'id_lokasi' => 'required|exists:lokasi,id_lokasi',
            'id_tim_sales' => 'required|exists:tim_sales,id_tim_sales',
            'tanggal_kunjungan' => 'required|date',
            'status' => 'required|string',
        ]);
      
        $jadwal->update($validatedData);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal Berhasil Diperbarui!');
        
    }

    public function destroy ($id) {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal Berhasil Dihapus!');

    }

    // ---------------------------- SALES --------------------------------

   


    public function index_sales() {
        $userId = Auth::id();
    
        // Ambil profil sales berdasarkan user yang login
        $profil_sales = ProfilSales::where('id_users', $userId)->first();
    
        if (!$profil_sales) {
            return redirect()->route('sales.profil_sales.index')->with('error', 'Anda belum memiliki profil sales.');
        }
    
        // Set default date range to today if no filter is applied
        $tanggal_mulai = request('tanggal_mulai') ? Carbon::parse(request('tanggal_mulai')) : Carbon::today();
        $tanggal_selesai = request('tanggal_selesai') ? Carbon::parse(request('tanggal_selesai')) : Carbon::today();
        
        // Ensure the end date is not before the start date
        if ($tanggal_selesai->lt($tanggal_mulai)) {
            $tanggal_selesai = $tanggal_mulai;
        }
    
        // Query jadwal based on date range
        $jadwal = Jadwal::where('id_tim_sales', $profil_sales->id_tim_sales)
            ->whereDate('tanggal_kunjungan', '>=', $tanggal_mulai->format('Y-m-d'))
            ->whereDate('tanggal_kunjungan', '<=', $tanggal_selesai->format('Y-m-d'))
            ->whereNotIn('status', ['selesai', 'gagal'])
            ->paginate(10);
    
        // Preserve query string on pagination
        $jadwal->appends(request()->all());
    
        return view('sales.jadwal.index', compact('jadwal'));
    }

}
