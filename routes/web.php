<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TimSalesController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProfilSalesController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\FileController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


Route::get('/', function () {
    return view('index');
});

Route::middleware('guest')->group(function(){
    Route::get('/login', [AuthController::class, 'ShowLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register',[AuthController::class, 'ShowRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/users', UsersController::class);
    Route::resource('admin/tim_sales', TimSalesController::class);
    Route::resource('admin/jabatan', JabatanController::class);
    
    Route::resource('admin/profil_sales', ProfilSalesController::class);
    Route::get('admin/profil_sales/detail/{id}', [ProfilSalesController::class, 'detail'])
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



Route::middleware(['auth', 'role:sales'])->group(function(){ 
    Route::get('/sales/profil_sales', [ProfilSalesController::class, 'index_sales'])->name('sales.profil_sales.index');
    Route::get('/sales/profil_sales/create', [ProfilSalesController::class, 'create_sales'])->name('sales.profil_sales.create');
    Route::post('/sales/profil_sales/store', [ProfilSalesController::class, 'store_sales'])->name('sales.profil_sales.store');

    Route::get('/sales/produk', [ProdukController::class, 'index_sales'])->name('sales.produk.index');
    Route::get('/sales/produk/create', [ProdukController::class, 'create_sales'])->name('sales.produk.create');
    Route::post('/sales/produk/store', [ProdukController::class, 'store_sales'])->name('sales.produk.store');
    Route::get('/sales/produk/edit/{id}', [ProdukController::class, 'edit_sales'])->name('sales.produk.edit');
    Route::put('/sales/produk/update/{id}', [ProdukController::class, 'update_sales'])->name('sales.produk.update');


    Route::get('/sales/produk/detail/{id}', [ProdukController::class, 'detail_sales'])->name('sales.produk.detail');

    Route::get('/sales/jadwal', [JadwalController::class, 'index_sales'])->name('sales.jadwal.index');
    
    Route::get('/sales/kunjungan', [KunjunganController::class, 'index_sales'])->name('sales.kunjungan.index');
    Route::get('/sales/kunjungan/detail/{id}', [KunjunganController::class, 'detail_sales'])->name('sales.kunjungan.detail');
    Route::post('/validate-location', [KunjunganController::class, 'validateLocation_sales'])->name('sales.kunjungan.validate.location');

    // Halaman create dan store untuk sales (hanya dapat diakses jika validasi lokasi sudah dilakukan)
    Route::get('/create', [KunjunganController::class, 'create_sales'])->name('sales.kunjungan.create');
    Route::post('/store', [KunjunganController::class, 'store_sales'])->name('sales.kunjungan.store');
    
    Route::get('/sales/tim_sales', [TimSalesController::class, 'index_sales'])->name('sales.tim_sales.index');
    

    

    
    

});






