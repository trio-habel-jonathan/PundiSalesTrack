<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfilSales;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\TimSales;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilSalesController extends Controller
{
   
    public function index() {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::id();
    
        // Ambil data profil_sales yang sesuai dengan ID pengguna
        $profil = ProfilSales::where('id_users', $userId)->first();
    
        return view('sales.profil_sales.index', compact('profil'));
    }

    public function create() {
        $userId = Auth::id();
        $users = User::findOrFail($userId);
        
        // Cek apakah profil sales untuk user ini sudah ada
        $profil_sales = ProfilSales::where('id_users', $userId)->first();
    
        if ($profil_sales) {
            return redirect()->route('sales.profil_sales.index')->with('error', 'Profil Sales sudah ada.');
        }
    
        $jabatans = Jabatan::all();
        $timSales = TimSales::all();
        
        return view('sales.profil_sales.create', compact('users', 'jabatans', 'timSales'));
    }
    
    
    public function store(Request $request) {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();
        
        // Validasi input
        $request->validate([
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);
    
        // Menyimpan file foto_profil
        $filePath = $request->file('foto_profil')->store('foto_profil', 'public');
    
        // Membuat data profil sales baru
        ProfilSales::create([
            'id_users' => $userId,
            'foto_profil' => $filePath,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
        ]);
    
        // Redirect ke halaman profil sales dengan pesan sukses
        return redirect()->route('sales.profil_sales.index')->with('success', 'Profil Sales Berhasil Ditambahkan!');
    }
    
    
}
