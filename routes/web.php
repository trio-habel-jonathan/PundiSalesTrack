<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TimSalesController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\ProfilSalesController as AdminProfilSalesController;
use App\Http\Controllers\Sales\ProfilSalesController as SalesProfilSalesController;



use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Admin\LokasiController;
use App\Http\Controllers\Admin\KlienController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KunjunganController;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


Route::middleware('guest')->group(function(){

    
Route::get('/', function () {
    return view('index');
});
    Route::get('/login', [AuthController::class, 'ShowLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register',[AuthController::class, 'ShowRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
   
    
});
Route::middleware('auth')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/users', UsersController::class);
    Route::resource('admin/tim_sales', TimSalesController::class);
    Route::resource('admin/jabatan', JabatanController::class);
    
    Route::resource('admin/profil_sales', AdminProfilSalesController::class);
    Route::get('admin/profil_sales/detail/{id}', [AdminProfilSalesController::class, 'detail'])
        ->name('profil_sales.detail');
    
    Route::resource('admin/produk', ProdukController::class);
    Route::get('admin/produk/detail/{id}', [ProdukController::class, 'detail'])
        ->name('produk.detail');

    Route::resource('admin/lokasi', LokasiController::class);
    Route::resource('admin/klien', KlienController::class);
    Route::resource('admin/jadwal', JadwalController::class);

    Route::resource('admin/kunjungan', KunjunganController::class);
    Route::get('admin/kunjungan/detail/{id}', [KunjunganController::class, 'detail'])
        ->name('kunjungan.detail');
});



Route::middleware(['auth', 'role:sales'])->prefix('sales')->group(function() {
    // Halaman profil sales
    Route::get('/profil_sales', [SalesProfilSalesController::class, 'index'])->name('sales.profil_sales.index');
    Route::get('/profil_sales/create', [SalesProfilSalesController::class, 'create'])->name('sales.profil_sales.create');
    Route::post('/profil_sales/store', [SalesProfilSalesController::class, 'store'])->name('sales.profil_sales.store');

    // Produk sales
    Route::get('/produk', [ProdukController::class, 'index_sales'])->name('sales.produk.index');
    Route::get('/produk/create', [ProdukController::class, 'create_sales'])->name('sales.produk.create');
    Route::post('/produk/store', [ProdukController::class, 'store_sales'])->name('sales.produk.store');
    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit_sales'])->name('sales.produk.edit');
    Route::put('/produk/update/{id}', [ProdukController::class, 'update_sales'])->name('sales.produk.update');
    Route::get('/produk/detail/{id}', [ProdukController::class, 'detail_sales'])->name('sales.produk.detail');

    // Jadwal sales
    Route::get('/jadwal', [JadwalController::class, 'index_sales'])->name('sales.jadwal.index');

    // Kunjungan sales
    Route::get('/kunjungan', [KunjunganController::class, 'index_sales'])->name('sales.kunjungan.index');
    Route::get('/kunjungan/detail/{id}', [KunjunganController::class, 'detail_sales'])->name('sales.kunjungan.detail');
    Route::post('/validate-location', [KunjunganController::class, 'validateLocation_sales'])->name('sales.kunjungan.validate.location');
    Route::get('/kunjungan/create', [KunjunganController::class, 'create_sales'])->name('sales.kunjungan.create');
    Route::post('/kunjungan/store', [KunjunganController::class, 'store_sales'])->name('sales.kunjungan.store');

    // Tim sales
    Route::get('/tim_sales', [TimSalesController::class, 'index_sales'])->name('sales.tim_sales.index');
});
