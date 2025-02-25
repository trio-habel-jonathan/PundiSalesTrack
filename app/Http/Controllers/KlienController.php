<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klien;
use App\Models\Lokasi;

class KlienController extends Controller
{
    public function index() {

        $klien = Klien::orderBy('id_klien', 'desc')->paginate(10);
        return view('admin.klien.index',compact('klien'));
    }

    public function create() {

        $lokasi = Lokasi::all();
        return view('admin.klien.create',compact('lokasi'));
    }


    public function store(Request $request) {
        $request->validate([
            'id_lokasi' => 'required|exists:lokasi,id_lokasi',
            'nama_klien' => 'required|string|max:100',
            'nomor_telepon' => 'required|string|max:20',
            'email' => 'required|string|email|max:100|unique:klien,email',
          
        ]);

       
        Klien::create([
            'id_lokasi' => $request->id_lokasi,
            'nama_klien' => $request->nama_klien,
            'nomor_telepon' => $request->nomor_telepon,
            'email' => $request->email,
        ]);
        
        return redirect()->route('klien.index')->with('success', 'Klien Berhasil Ditambahkan!');
    }

    public function edit($id) {
        $klien = Klien::findOrFail($id);
        $lokasi = Lokasi::all();

        return view('admin.klien.edit',compact('klien','lokasi'));
    }



    public function update(Request $request, $id) {

        $klien = Klien::findOrFail($id);
        
        $request->validate([
            'id_lokasi' => 'required|exists:lokasi,id_lokasi',
            'nama_klien' => 'required|string|max:100',
            'nomor_telepon' => 'required|string|max:20',
            'email' => 'required|string|email|max:100|unique:users,email',
        ]);

       
        $klien->update([
            'id_lokasi' => $request->id_lokasi,
            'nama_klien' => $request->nama_klien,
            'nomor_telepon' => $request->nomor_telepon,
            'email' => $request->email,
        ]);
        
        return redirect()->route('klien.index')->with('success', 'Klien Berhasil Diperbarui!');
    }



    public function destroy($id) {
        $klien = Klien::findOrFail($id);

        $klien->delete();
        return redirect()->route('klien.index')->with('success', 'Klien Berhasil Dihapus!');
    }
    

}