<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;

class LokasiController extends Controller
{
    public function index() {
        $lokasi = Lokasi::paginate(10);
      
        return view('admin.lokasi.index',compact('lokasi'));
    }

    public function create() {
        return view('admin.lokasi.create');
    }


    public function store(Request $request) {
        $validatedData = $request->validate([
            'alamat' => 'required|string|max:255', // 'text' diganti dengan 'string'
            'provinsi' => 'required|string|max:50',
            'kota' => 'required|string|max:50',
            'longitude' => 'required|numeric', // Validasi untuk double
            'latitude' => 'required|numeric',  // Validasi untuk double
        ]);
    
        Lokasi::create($validatedData);
        
        return redirect()->route('lokasi.index')->with('success', 'Lokasi Berhasil Ditambahkan!');
    }

    public function edit($id) {
        $lokasi = Lokasi::findOrFail($id);
        return view('admin.lokasi.edit',compact('lokasi'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'alamat' => 'required|string|max:255', // 'text' diganti dengan 'string'
            'provinsi' => 'required|string|max:50',
            'kota' => 'required|string|max:50',
            'longitude' => 'required|numeric', // Validasi untuk double
            'latitude' => 'required|numeric',  // Validasi untuk double
        ]);
    
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update($validatedData);
    
        return redirect()->route('lokasi.index')->with('success', 'Lokasi Berhasil Diperbarui!');
    }



    public function destroy($id) {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();
        return redirect()->route('lokasi.index')->with('success', 'Lokasi Berhasil Dihapus!');
    }
    

}



