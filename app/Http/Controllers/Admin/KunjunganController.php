<?php

namespace App\Http\Controllers\Admin;

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
        $query = Kunjungan::orderBy('id_kunjungan', 'desc');
    
        // Text search
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
        
        // Date filtering
        if ($request->has('tanggal_mulai') && !empty($request->tanggal_mulai)) {
            $query->whereDate('waktu_mulai', '>=', $request->tanggal_mulai);
        }
        
        if ($request->has('tanggal_selesai') && !empty($request->tanggal_selesai)) {
            $query->whereDate('waktu_mulai', '<=', $request->tanggal_selesai);
        }
    
        $kunjungan = $query->paginate(10);
        
        return view('admin.kunjungan.index', compact('kunjungan'));
    }
    

    public function create() {
        $klien = Klien::all();
        $produk = Produk::all();
        $profil_sales = ProfilSales::whereHas('tim_sales')->get();
        $jadwal = Jadwal::all();
        return view('admin.kunjungan.create', compact('klien', 'produk', 'profil_sales', 'jadwal'));
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
        return redirect()->route('kunjungan.index')->with('success', 'Kunjungan Berhasil Ditambahkan!');
    } catch (\Exception $e) {
        DB::rollBack(); // Batalkan transaksi jika ada error
        return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

    public function edit($id)
{
    $kunjungan = Kunjungan::findOrFail($id);
    $klien = Klien::all();
    $produk = Produk::all();
    $profil_sales = ProfilSales::whereHas('tim_sales')->get();
    $jadwal = Jadwal::all();
    $foto_kunjungan = FotoKunjungan::where('id_kunjungan', $id)->get();
    
    return view('admin.kunjungan.edit', compact('kunjungan', 'klien', 'produk', 'profil_sales', 'jadwal', 'foto_kunjungan'));
}

public function update(KunjunganRequest $request, $id)
{
    DB::beginTransaction(); 

    try {
        $kunjungan = Kunjungan::findOrFail($id);

        $kunjungan->update($request->validated());

        if (!$kunjungan) {
            DB::rollBack();
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

        DB::commit(); // Simpan transaksi
        return redirect()->route('kunjungan.index')->with('success', 'Kunjungan Berhasil Diperbarui!');
    } catch (\Exception $e) {
        DB::rollBack(); // Batalkan transaksi jika ada error
        return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
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

    public function destroy($id) {
        $kunjungan = Kunjungan::findOrFail($id);
        $fotoKunjungan = FotoKunjungan::where('id_kunjungan', $id)->get();
        
        foreach ($fotoKunjungan as $foto) {
            Storage::disk('public')->delete($foto->foto);
            $foto->delete();
        }
        
        $kunjungan->delete();
        
        return redirect()->route('kunjungan.index')->with('success', 'Kunjungan Berhasil Dihapus!');
    }
    
}