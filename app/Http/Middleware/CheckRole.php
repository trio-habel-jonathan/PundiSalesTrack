<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User; // Mengimpor model Pengguna

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Menyimpan user yang sudah ter-autentikasi
        $user = $request->user();

        // Jika user tidak ada, atau bukan instance Pengguna, atau role tidak sesuai
        if (!$user || !$user instanceof User || $user->role !== $role) {
            return redirect();
        }

        return $next($request);
    }
}
