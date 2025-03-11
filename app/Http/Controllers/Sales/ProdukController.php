<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;

use App\Http\Requests\ProdukRequest;
use App\Models\Produk;
use App\Models\FotoProduk;
use App\Models\ProfilSales;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index() {
        $produk = Produk::paginate(10);


        $userId = Auth::id();
        $profil_sales = ProfilSales::where('id_users', $userId)->first();
        if (!$profil_sales) {
            return redirect()->route('sales.profil_sales.index')
                             ->with('error', 'Anda belum memiliki profil sales.');
        }


        return view('sales.produk.index', compact('produk'));

    }

    public function detail($id) {
        $produk = Produk::findOrFail($id);
        return view('sales.produk.detail', compact('produk'));
    }


    public function create() {
        return view('sales.produk.create');
    }

    public function store(ProdukRequest $request) {
        $produk = Produk::create($request->only(['nama_produk', 'deskripsi_produk', 'harga']));
    
        if (!$produk) {
            return back()->with('error', 'Produk gagal disimpan!');
        }
    
        if ($request->hasFile('foto_produk')) {
            foreach ($request->file('foto_produk') as $foto) {
                $path = $foto->store('foto_produk', 'public');
                FotoProduk::create([
                    'id_produk' => $produk->id_produk,
                    'foto' => $path
                ]);
            }
        }
    
        return redirect()->route('sales.produk.index')->with('success', 'Produk Berhasil Ditambahkan!');
    }

    public function edit($id) {
        $produk = Produk::findOrFail($id);
        return view('sales.produk.edit',compact('produk'));
    }

 public function update(ProdukRequest $request, $id) {  
        $produk = Produk::findOrFail($id);
        $produk->update($request->only(['nama_produk', 'deskripsi_produk', 'harga']));
    
        if ($request->hasFile('foto_produk')) {
            foreach ($request->file('foto_produk') as $index => $foto) {
                if ($foto) {
                    $existingFoto = $produk->fotoProduk[$index] ?? null;
                    
                    if ($existingFoto) {
                        Storage::disk('public')->delete($existingFoto->foto);
                        $path = $foto->store('foto_produk', 'public');
                        $existingFoto->update(['foto' => $path]);
                    } else {
                        $path = $foto->store('foto_produk', 'public');
                        FotoProduk::create([
                            'id_produk' => $produk->id_produk,
                            'foto' => $path
                        ]);
                    }
                }
            }
        }
    
        return redirect()->route('sales.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }
    
    
}
