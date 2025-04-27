<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilSales;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil total sales
        $totalSales = ProfilSales::count();

        // Ambil data kunjungan terakhir
        $kunjunganTerakhir = DB::table('kunjungan')
            ->join('klien', 'kunjungan.id_klien', '=', 'klien.id_klien')
            ->select('kunjungan.*', 'klien.nama_klien')
            ->orderBy('kunjungan.created_at', 'desc')
            ->limit(5)
            ->get();

        // Ambil data status kunjungan
        $kunjunganStatus = DB::table('kunjungan')
            ->select(DB::raw('status, COUNT(*) as total'))
            ->groupBy('status')
            ->get();

        // Ambil data produk populer
        $produkPopuler = DB::table('kunjungan')
            ->join('produk', 'kunjungan.id_produk', '=', 'produk.id_produk')
            ->select('produk.nama_produk', DB::raw('COUNT(*) as total'))
            ->groupBy('produk.nama_produk')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('totalSales', 'kunjunganTerakhir', 'kunjunganStatus', 'produkPopuler'));
    }
}
