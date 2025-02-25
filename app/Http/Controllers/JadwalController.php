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
    public function index() {
        
        $jadwal = Jadwal::paginate(10);

        return view('admin.jadwal.index',compact('jadwal'));
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
    
        // Ambil tanggal hari ini
        $today = Carbon::today();
    
        // Ambil hanya jadwal untuk hari ini
        $jadwal = Jadwal::where('id_tim_sales', $profil_sales->id_tim_sales)
            ->whereDate('tanggal_kunjungan', $today) // Filter hanya untuk hari ini
            ->whereNotIn('status', ['selesai', 'gagal'])
            ->paginate(10);
    
        return view('sales.jadwal.index', compact('jadwal'));
    }
    

}
