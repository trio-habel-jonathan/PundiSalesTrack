<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class AuthController extends Controller
{
    //
    public function ShowLoginForm() {

        return view('auth.login');
    }

    public function login(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        $users = User::where('email', $request->email)->first();

         if ($users && Hash::check($request->password, $users->password)) {
        Auth::login($users);

        // Pengalihan berdasarkan role
        if ($users->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Berhasil login sebagai admin!');
        } elseif ($users->role === 'sales') {
            return redirect('sales/profil_sales')->with('success', 'Berhasil login sebagai sales!');
        }
     }

    return back()->withErrors(['email' => 'Email atau password salah.']);

    
    }

    public function ShowRegisterForm() {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login.');
    }


    public function logout() {
        Auth::logout();
        return redirect('/login')->with('succes','Berhasil Logout.');
    }
}
