<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            // Redirect berdasarkan role
            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'sales') {
                return redirect()->route('sales.profil_sales.index'); // Pastikan route ini tidak melakukan redirect lain
            }

            return redirect('/'); // Jika role tidak diketahui, arahkan ke halaman utama
        }

        return $next($request);
    }
}
