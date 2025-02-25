<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $totalUser = User::count();


        return view ('admin.dashboard', compact('totalUser'));    
    }

    
}
