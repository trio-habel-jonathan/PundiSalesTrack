<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProfilSales;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Menampilkan daftar pengguna.
     */
    public function index(Request $request)
    {
        // Pencarian berdasarkan nama, email, atau ID
        $search = $request->input('search');

        if ($search) {
            $users = User::where('email', 'LIKE', "%$search%")
                ->orWhere('id_users', 'LIKE', "%$search%")
                ->paginate(10);
        } else {
            $users = User::paginate(10);
        }

        $profil_sales = ProfilSales::paginate(10);

        return view('admin.users.index', compact('users','profil_sales'));
    }

    /**
     * Menampilkan form untuk menambahkan pengguna baru.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Menyimpan data pengguna baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:100|unique:users,email',
            'role' => 'required|in:admin,sales',
            'password' => 'required|string|min:8', // Password minimal 8 karakter
        ]);

        // Menyimpan pengguna baru
        User::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Hash password
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Menampilkan halaman edit untuk pengguna.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Memperbarui data pengguna.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email,' . $id . ',id_users',
            'role' => 'required|in:admin,sales',
            'password' => 'nullable|string|min:8', // Password opsional saat update
        ]);

        $user = User::findOrFail($id);

        // Update data pengguna
        $user->update([
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
            'password' => $validatedData['password'] ? Hash::make($validatedData['password']) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    /**
     * Menghapus pengguna dari database.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('error', 'Pengguna berhasil dihapus.');
    }
}
