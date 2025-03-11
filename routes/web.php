<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\TimSalesController as AdminTimSalesController;
use App\Http\Controllers\Sales\TimSalesController as SalesTimSalesController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\ProfilSalesController as AdminProfilSalesController;
use App\Http\Controllers\Sales\ProfilSalesController as SalesProfilSalesController;



use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Sales\ProdukController as SalesProdukController;
use App\Http\Controllers\Admin\LokasiController;
use App\Http\Controllers\Admin\KlienController;
use App\Http\Controllers\Admin\JadwalController as AdminJadwalController;
use App\Http\Controllers\Sales\JadwalController as SalesJadwalController;
use App\Http\Controllers\Admin\KunjunganController as AdminKunjunganController;
use App\Http\Controllers\Sales\KunjunganController as SalesKunjunganController;





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
    Route::resource('admin/tim_sales', AdminTimSalesController::class);
    Route::resource('admin/jabatan', JabatanController::class);
    
    Route::resource('admin/profil_sales', AdminProfilSalesController::class);
    Route::get('admin/profil_sales/detail/{id}', [AdminProfilSalesController::class, 'detail'])
        ->name('profil_sales.detail');
    
    Route::resource('admin/produk', AdminProdukController::class);
    Route::get('admin/produk/detail/{id}', [AdminProdukController::class, 'detail'])
        ->name('produk.detail');

    Route::resource('admin/lokasi', LokasiController::class);
    Route::resource('admin/klien', KlienController::class);
    Route::resource('admin/jadwal', AdminJadwalController::class);

    Route::resource('admin/kunjungan', AdminKunjunganController::class);
    Route::get('admin/kunjungan/detail/{id}', [AdminKunjunganController::class, 'detail'])
        ->name('kunjungan.detail');
});



Route::middleware(['auth', 'role:sales'])->prefix('sales')->name('sales.')->group(function() {

    // Profil Sales
    Route::prefix('profil_sales')->name('profil_sales.')->group(function() {
        Route::get('/', [SalesProfilSalesController::class, 'index'])->name('index');
        Route::get('/create', [SalesProfilSalesController::class, 'create'])->name('create');
        Route::post('/store', [SalesProfilSalesController::class, 'store'])->name('store');
    });

    // Produk Sales
    Route::prefix('produk')->name('produk.')->group(function() {
        Route::get('/', [SalesProdukController::class, 'index'])->name('index');
        Route::get('/create', [SalesProdukController::class, 'create'])->name('create');
        Route::post('/store', [SalesProdukController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SalesProdukController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [SalesProdukController::class, 'update'])->name('update');
        Route::get('/detail/{id}', [SalesProdukController::class, 'detail'])->name('detail');
    });

    // Jadwal Sales
    Route::prefix('jadwal')->name('jadwal.')->group(function() {
        Route::get('/', [SalesJadwalController::class, 'index'])->name('index');
    });

    // Kunjungan Sales
    Route::prefix('kunjungan')->name('kunjungan.')->group(function() {
        Route::get('/', [SalesKunjunganController::class, 'index'])->name('index');
        Route::get('/detail/{id}', [SalesKunjunganController::class, 'detail'])->name('detail');
        Route::post('/validate-location', [SalesKunjunganController::class, 'validateLocation_sales'])->name('validate.location');
        Route::get('/create', [SalesKunjunganController::class, 'create'])->name('create');
        Route::post('/store', [SalesKunjunganController::class, 'store'])->name('store');
    });

    // Tim Sales
    Route::prefix('tim_sales')->name('tim_sales.')->group(function() {
        Route::get('/', [SalesTimSalesController::class, 'index'])->name('index');
    });

});

