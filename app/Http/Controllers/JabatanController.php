<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');

        if ($search) {
            $jabatan = Jabatan::where('nama_jabatan','LIKE', "%$search%")
                    ->paginate(10);
        } else {
            $jabatan = Jabatan::paginate(10);
        }

        return view('admin.jabatan.index',compact('jabatan'));
    }   

    public function create() {
        return view('admin.jabatan.create');
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'nama_jabatan' => 'required|string|max:100',
            'deskripsi_jabatan' => 'required|string|max:255',

        ]);

        Jabatan::create($validatedData);

        return redirect()->route('jabatan.index')->with('success', 'Jabatan Berhasil Ditambahkan!');   

    }

   public function edit($id) {
    
    $jabatan = Jabatan::findOrFail($id);
    return view('admin.jabatan.edit',compact('jabatan'));
   }

   public function update(Request $request, $id) {
    $validatedData = $request->validate([
        'nama_jabatan' => 'required|string|max:100',
        'deskripsi_jabatan' => 'required|string|max:255',

    ]);

    $jabatan = Jabatan::findOrFail($id);
    $jabatan->update($validatedData);

    return redirect()->route('jabatan.index')->with('success', 'Jabatan Berhasil Diperbarui!');
   }





   public function destroy () {
    $jabatan = Jabatan::findOrFail($id);
    $jabatan->delete();

    return redirect()->route('jabatan.index')->with('success', 'Jabatan Berhasil Dihapus!');
   }
}

