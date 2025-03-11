<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

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
