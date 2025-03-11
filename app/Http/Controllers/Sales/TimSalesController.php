<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\TimSales;
use App\Models\ProfilSales;
use Illuminate\Support\Facades\Auth;



class TimSalesController extends Controller
{

    public function index()
    {
        $userId = Auth::id();

        // Ambil profil sales dari user yang login
        $profil = ProfilSales::where('id_users', $userId)->first();

        if (!$profil) {
            return redirect()->route('sales.profil_sales.index')
                             ->with('error', 'Anda belum memiliki profil sales.');
        }

        // Mengambil tim berdasarkan ID tim dari profil
        $tim = TimSales::with('members')->find($profil->id_tim_sales);

        // Jika relasi sudah didefinisikan dengan benar, $tim->members
        // akan mengembalikan semua anggota tim
        // Jika tidak, kamu bisa query langsung:
        // $members = ProfilSales::where('id_tim_sales', $profil->id_tim_sales)->get();

        return view('sales.tim_sales.index', compact('tim' ,'profil'));
    }
}


