<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\TimSales;
use App\Models\ProfilSales;
use Illuminate\Support\Facades\Auth;



class TimSalesController extends Controller
{
    public function index(Request $request) {
       $search = $request->input('search');

       if ($search) {
        $tim_sales = TimSales::where('nama_tim_sales','LIKE', "%$search%")
                ->paginate(10);
       } else {
        $tim_sales = TimSales::paginate(10);
       }
        return view('admin.tim_sales.index',compact('tim_sales'));

    }

    public function create() {

        return view('admin.tim_sales.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'nama_tim_sales' => 'required|string|max:100',
        ]);

        TimSales::create($validatedData);
        
        return redirect()->route('tim_sales.index')->with('success', 'Tim Sales Berhasil Ditambahkan!');

    }

    public function edit($id) {
        $tim_sales = TimSales::findOrFail($id);
        return view('admin.tim_sales.edit',compact('tim_sales'));
    }
    

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'nama_tim_sales' => 'required|string|max:100',
        ]);

        $tim_sales = TimSales::findOrFail($id);
        $tim_sales->update($validatedData);

        return redirect()->route('tim_sales.index')->with('success', 'Tim Sales Berhasil Diperbarui!');
    }


    public function destroy () {
        $tim_sales = TimSales::findOrFail($id);
        $tim_sales->delete();

        return redirect()->route('tim_sales.index')->with('success', 'Tim Sales Berhasil Dihapus!');
    }
}