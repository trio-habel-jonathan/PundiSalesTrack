<?php

namespace App\Http\Controllers;

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
        $profil_sales = ProfilSales::all();
        return view('admin.profil_sales.index',compact('profil_sales'));
    }

    public function create() {
        $users = User::all(); 
        $jabatans = Jabatan::all();
        $timSales = TimSales::all();
        return view('admin.profil_sales.create', compact('users', 'jabatans', 'timSales'));
    }

    public function store(Request $request) {
        $request->validate([
            'id_users' => 'required|exists:users,id_users',
            'id_tim_sales' => 'required|exists:tim_sales,id_tim_sales',
            'id_jabatan' => 'required|exists:jabatan,id_jabatan',
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        $filePath = $request->file('foto_profil')->store('foto_profil', 'public');
    
        ProfilSales::create([
            'id_users' => $request->id_users,
            'id_tim_sales' => $request->id_tim_sales,
            'id_jabatan' => $request->id_jabatan,
            'foto_profil' => $filePath,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
        ]);
        
        return redirect()->route('profil_sales.index')->with('success', 'Profil Sales Berhasil Ditambahkan!');
    }

    public function edit($id) {
        
        $profil_sales = ProfilSales::findOrFail($id);
        $users = User::all(); 
        $jabatans = Jabatan::all();
        $timSales = TimSales::all();
        return view('admin.profil_sales.edit', compact('profil_sales', 'users', 'jabatans', 'timSales'));
    }

    public function update(Request $request, $id) {
        $profil_sales = ProfilSales::findOrFail($id);
        
        $request->validate([
            'id_users' => 'required|exists:users,id_users',
            'id_tim_sales' => 'required|exists:tim_sales,id_tim_sales',
            'id_jabatan' => 'required|exists:jabatan,id_jabatan',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        if ($request->hasFile('foto_profil')) {
            if ($profil_sales->foto_profil) {
                Storage::disk('public')->delete($profil_sales->foto_profil);
            }
            $filePath = $request->file('foto_profil')->store('foto_profil', 'public');
            $profil_sales->foto_profil = $filePath;
        }

        $profil_sales->update([
            'id_users' => $request->id_users,
            'id_tim_sales' => $request->id_tim_sales,
            'id_jabatan' => $request->id_jabatan,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
        ]);
        
        return redirect()->route('profil_sales.index')->with('success', 'Profil Sales Berhasil Diperbarui!');
    }

    public function destroy($id) {
        $profil_sales = ProfilSales::findOrFail($id);
        if ($profil_sales->foto_profil) {
            Storage::disk('public')->delete($profil_sales->foto_profil);
        }
        $profil_sales->delete();
        return redirect()->route('profil_sales.index')->with('success', 'Profil Sales Berhasil Dihapus!');
    }

        public function show($id)
    {
        return $this->detail($id);
    }

    public function detail($id)
    {
        $profil = ProfilSales::findOrFail($id);
        return view('admin.profil_sales.detail', compact('profil'));
    }



    // ----------------------------------------------- SALES -----------------------------------------------
    public function index_sales() {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::id();
    
        // Ambil data profil_sales yang sesuai dengan ID pengguna
        $profil = ProfilSales::where('id_users', $userId)->first();
    
        return view('sales.profil_sales.index', compact('profil'));
    }

    public function create_sales() {
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
    
    
    public function store_sales(Request $request) {
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
