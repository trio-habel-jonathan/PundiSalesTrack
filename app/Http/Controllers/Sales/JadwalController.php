<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\TimSales;
use App\Models\Lokasi;
use App\Models\ProfilSales;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{

    public function index() {
        $userId = Auth::id();
    
        // Ambil profil sales berdasarkan user yang login
        $profil_sales = ProfilSales::where('id_users', $userId)->first();
    
        if (!$profil_sales) {
            return redirect()->route('sales.profil_sales.index')->with('error', 'Anda belum memiliki profil sales.');
        }
    
        // Set default date range to today if no filter is applied
        $tanggal_mulai = request('tanggal_mulai') ? Carbon::parse(request('tanggal_mulai')) : Carbon::today();
        $tanggal_selesai = request('tanggal_selesai') ? Carbon::parse(request('tanggal_selesai')) : Carbon::today();
        
        // Ensure the end date is not before the start date
        if ($tanggal_selesai->lt($tanggal_mulai)) {
            $tanggal_selesai = $tanggal_mulai;
        }
    
        // Query jadwal based on date range
        $jadwal = Jadwal::where('id_tim_sales', $profil_sales->id_tim_sales)
            ->whereDate('tanggal_kunjungan', '>=', $tanggal_mulai->format('Y-m-d'))
            ->whereDate('tanggal_kunjungan', '<=', $tanggal_selesai->format('Y-m-d'))
            ->whereNotIn('status', ['selesai', 'gagal'])
            ->paginate(10);
    
        // Preserve query string on pagination
        $jadwal->appends(request()->all());
    
        return view('sales.jadwal.index', compact('jadwal'));
    }

}
