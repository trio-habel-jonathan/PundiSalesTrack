<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\FotoProduk;
use App\Models\ProfilSales;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index() {

        $produk = Produk::paginate(10);

        return view('admin.produk.index',(compact('produk')));
    }

    public function create() {
        return view('admin.produk.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:100',
            'deskripsi_produk' => 'required|string|max:255',
            'harga' => 'required|numeric', 
            'foto_produk.*' => 'image|mimes:jpeg,png,jpg|max:2048' // Validasi foto
        ]);
    
        // Simpan produk dulu
        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'harga' => $request->harga,
        ]);
    
        // **Cek apakah produk berhasil disimpan**
        if (!$produk) {
            return back()->with('error', 'Produk gagal disimpan!');
        }
    
        // **Gunakan ID Produk yang baru dibuat untuk foto**
        if ($request->hasFile('foto_produk')) {
            foreach ($request->file('foto_produk') as $foto) {
                $path = $foto->store('foto_produk', 'public'); // Simpan ke storage
    
                FotoProduk::create([
                    'id_produk' => $produk->id_produk, 
                    'foto' => $path
                ]);
            }
        }
        
    
        return redirect()->route('produk.index')->with('success', 'Produk Berhasil Ditambahkan!');
    }

    public function edit($id) {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit',compact('produk'));
    }

    public function update(Request $request, $id)
    {  
    // Validasi request
    $validatedData = $request->validate([
        'nama_produk' => 'required|string|max:100',
        'deskripsi_produk' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'foto_produk.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    // Cari produk
    $produk = Produk::findOrFail($id);

    // Update informasi produk
    $produk->update([
        'nama_produk' => $request->nama_produk,
        'deskripsi_produk' => $request->deskripsi_produk,
        'harga' => $request->harga,
    ]);

    // Handle foto
    if ($request->hasFile('foto_produk')) {
        foreach ($request->file('foto_produk') as $index => $foto) {
            if ($foto) {
                // Cek apakah ada foto lama di index yang sama
                $existingFoto = $produk->fotoProduk[$index] ?? null;
                
                // Jika ada foto lama, hapus dari storage dan update recordnya
                if ($existingFoto) {
                    Storage::disk('public')->delete($existingFoto->foto);
                    
                    // Upload foto baru
                    $path = $foto->store('foto_produk', 'public');
                    
                    // Update record yang ada
                    $existingFoto->update([
                        'foto' => $path
                    ]);
                } else {
                    // Jika tidak ada foto lama di index ini, buat record baru
                    $path = $foto->store('foto_produk', 'public');
                    
                    FotoProduk::create([
                        'id_produk' => $produk->id_produk,
                        'foto' => $path
                    ]);
                }
            }
        }
    }

    return redirect()
        ->route('produk.index')
        ->with('success', 'Produk berhasil diperbarui!');
}
    

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
    
        if ($produk->foto_produk) {
            Storage::disk('public')->delete($produk->foto_produk);
        }

        $produk->delete();
    
        return redirect()->route('produk.index')->with('success', 'Produk Berhasil Dihapus!');
    }


    public function show() {
        $produk = Produk::all();
        return view('admin.produk.index', compact('produk'));
    }

    public function detail($id) {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.detail', compact('produk'));
    }    


    // --------------------------------- SALES ------------------------------- //
    public function index_sales() {
        $produk = Produk::paginate(10);


        $userId = Auth::id();
        $profil_sales = ProfilSales::where('id_users', $userId)->first();
        if (!$profil_sales) {
            return redirect()->route('sales.profil_sales.index')
                             ->with('error', 'Anda belum memiliki profil sales.');
        }


        return view('sales.produk.index', compact('produk'));

    }

    public function detail_sales($id) {
        $produk = Produk::findOrFail($id);
        return view('sales.produk.detail', compact('produk'));
    }


    public function create_sales() {
        return view('sales.produk.create');
    }

    public function store_sales(Request $request) {
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:100',
            'deskripsi_produk' => 'required|string|max:255',
            'harga' => 'required|numeric', 
            'foto_produk.*' => 'image|mimes:jpeg,png,jpg|max:2048' // Validasi foto
        ]);
    
        // Simpan produk dulu
        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'harga' => $request->harga,
        ]);
    
        // **Cek apakah produk berhasil disimpan**
        if (!$produk) {
            return back()->with('error', 'Produk gagal disimpan!');
        }
    
        // **Gunakan ID Produk yang baru dibuat untuk foto**
        if ($request->hasFile('foto_produk')) {
            foreach ($request->file('foto_produk') as $foto) {
                $path = $foto->store('foto_produk', 'public'); // Simpan ke storage
    
                FotoProduk::create([
                    'id_produk' => $produk->id_produk, 
                    'foto' => $path
                ]);
            }
        }
        
    
        return redirect()->route('sales.produk.index')->with('success', 'Produk Berhasil Ditambahkan!');
    }

    public function edit_sales($id) {
        $produk = Produk::findOrFail($id);
        return view('sales.produk.edit',compact('produk'));
    }

    public function update_sales(Request $request, $id)
    {  
    // Validasi request
    $validatedData = $request->validate([
        'nama_produk' => 'required|string|max:100',
        'deskripsi_produk' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'foto_produk.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    // Cari produk
    $produk = Produk::findOrFail($id);

    // Update informasi produk
    $produk->update([
        'nama_produk' => $request->nama_produk,
        'deskripsi_produk' => $request->deskripsi_produk,
        'harga' => $request->harga,
    ]);

    // Handle foto
    if ($request->hasFile('foto_produk')) {
        foreach ($request->file('foto_produk') as $index => $foto) {
            if ($foto) {
                // Cek apakah ada foto lama di index yang sama
                $existingFoto = $produk->fotoProduk[$index] ?? null;
                
                // Jika ada foto lama, hapus dari storage dan update recordnya
                if ($existingFoto) {
                    Storage::disk('public')->delete($existingFoto->foto);
                    
                    // Upload foto baru
                    $path = $foto->store('foto_produk', 'public');
                    
                    // Update record yang ada
                    $existingFoto->update([
                        'foto' => $path
                    ]);
                } else {
                    // Jika tidak ada foto lama di index ini, buat record baru
                    $path = $foto->store('foto_produk', 'public');
                    
                    FotoProduk::create([
                        'id_produk' => $produk->id_produk,
                        'foto' => $path
                    ]);
                }
            }
        }
    }

    return redirect()
        ->route('sales.produk.index')
        ->with('success', 'Produk berhasil diperbarui!');
}
    
}
