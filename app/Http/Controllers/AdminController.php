<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\ProfilSales;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $totalSales = ProfilSales::count();


        return view ('admin.dashboard', compact('totalSales'));    
    }

    
}
