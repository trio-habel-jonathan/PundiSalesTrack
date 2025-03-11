<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

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

}
