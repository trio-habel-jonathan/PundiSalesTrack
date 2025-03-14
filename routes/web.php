<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

/*
|--------------------------------------------------------------------------
| Authentication Controllers
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Admin Controllers
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\TimSalesController as AdminTimSalesController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\ProfilSalesController as AdminProfilSalesController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Admin\LokasiController;
use App\Http\Controllers\Admin\KlienController;
use App\Http\Controllers\Admin\JadwalController as AdminJadwalController;
use App\Http\Controllers\Admin\KunjunganController as AdminKunjunganController;

/*
|--------------------------------------------------------------------------
| Sales Controllers
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Sales\TimSalesController as SalesTimSalesController;
use App\Http\Controllers\Sales\ProfilSalesController as SalesProfilSalesController;
use App\Http\Controllers\Sales\ProdukController as SalesProdukController;
use App\Http\Controllers\Sales\JadwalController as SalesJadwalController;
use App\Http\Controllers\Sales\KunjunganController as SalesKunjunganController;

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function() {
    Route::get('/', function () {
        return view('index');
    });
    
    // Authentication Routes
    Route::get('/login', [AuthController::class, 'ShowLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'ShowRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // Dashboard route
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    /*
     * User Admin Routes
     */
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('index');
        Route::get('/create', [UsersController::class, 'create'])->name('create');
        Route::post('/', [UsersController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('edit');
        Route::put('/{id}', [UsersController::class, 'update'])->name('update');
        Route::delete('/{id}', [UsersController::class, 'destroy'])->name('destroy');
    });

    /*
     * Tim Sales Admin Routes
     */
    Route::prefix('tim_sales')->name('tim_sales.')->group(function () {
        Route::get('/', [AdminTimSalesController::class, 'index'])->name('index');
        Route::get('/create', [AdminTimSalesController::class, 'create'])->name('create');
        Route::post('/', [AdminTimSalesController::class, 'store'])->name('store');
        Route::get('/{id}', [AdminTimSalesController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [AdminTimSalesController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminTimSalesController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminTimSalesController::class, 'destroy'])->name('destroy');
    });

    /*
     * Jabatan Admin Routes
     */
    Route::prefix('jabatan')->name('jabatan.')->group(function () {
        Route::get('/', [JabatanController::class, 'index'])->name('index');
        Route::get('/create', [JabatanController::class, 'create'])->name('create');
        Route::post('/', [JabatanController::class, 'store'])->name('store');
        Route::get('/{id}', [JabatanController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [JabatanController::class, 'edit'])->name('edit');
        Route::put('/{id}', [JabatanController::class, 'update'])->name('update');
        Route::delete('/{id}', [JabatanController::class, 'destroy'])->name('destroy');
    });

    /*
     * Profil Sales Admin Routes
     */
    Route::prefix('profil_sales')->name('profil_sales.')->group(function () {
        Route::get('/', [AdminProfilSalesController::class, 'index'])->name('index');
        Route::get('/create', [AdminProfilSalesController::class, 'create'])->name('create');
        Route::post('/', [AdminProfilSalesController::class, 'store'])->name('store');
        Route::get('/{id}', [AdminProfilSalesController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [AdminProfilSalesController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminProfilSalesController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminProfilSalesController::class, 'destroy'])->name('destroy');
        
        // Detail route
        Route::get('/detail/{id}', [AdminProfilSalesController::class, 'detail'])->name('detail');
    });

    /*
     * Produk Admin Routes
     */
    Route::prefix('produk')->name('produk.')->group(function () {
        Route::get('/', [AdminProdukController::class, 'index'])->name('index');
        Route::get('/create', [AdminProdukController::class, 'create'])->name('create');
        Route::post('/', [AdminProdukController::class, 'store'])->name('store');
        Route::get('/{id}', [AdminProdukController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [AdminProdukController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminProdukController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminProdukController::class, 'destroy'])->name('destroy');
        
        // Detail route
        Route::get('/detail/{id}', [AdminProdukController::class, 'detail'])->name('detail');
    });

    /*
     * Lokasi Admin Routes
     */
    Route::prefix('lokasi')->name('lokasi.')->group(function () {
        Route::get('/', [LokasiController::class, 'index'])->name('index');
        Route::get('/create', [LokasiController::class, 'create'])->name('create');
        Route::post('/', [LokasiController::class, 'store'])->name('store');
        Route::get('/{id}', [LokasiController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [LokasiController::class, 'edit'])->name('edit');
        Route::put('/{id}', [LokasiController::class, 'update'])->name('update');
        Route::delete('/{id}', [LokasiController::class, 'destroy'])->name('destroy');
    });

    /*
     * Klien Admin Routes
     */
    Route::prefix('klien')->name('klien.')->group(function () {
        Route::get('/', [KlienController::class, 'index'])->name('index');
        Route::get('/create', [KlienController::class, 'create'])->name('create');
        Route::post('/', [KlienController::class, 'store'])->name('store');
        Route::get('/{id}', [KlienController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [KlienController::class, 'edit'])->name('edit');
        Route::put('/{id}', [KlienController::class, 'update'])->name('update');
        Route::delete('/{id}', [KlienController::class, 'destroy'])->name('destroy');
    });

    /*
     * Jadwal Admin Routes
     */
    Route::prefix('jadwal')->name('jadwal.')->group(function () {
        Route::get('/', [AdminJadwalController::class, 'index'])->name('index');
        Route::get('/create', [AdminJadwalController::class, 'create'])->name('create');
        Route::post('/', [AdminJadwalController::class, 'store'])->name('store');
        Route::get('/{id}', [AdminJadwalController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [AdminJadwalController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminJadwalController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminJadwalController::class, 'destroy'])->name('destroy');
    });

    /*
     * Kunjungan Admin Routes
     */
    Route::prefix('kunjungan')->name('kunjungan.')->group(function () {
        Route::get('/', [AdminKunjunganController::class, 'index'])->name('index');
        Route::get('/create', [AdminKunjunganController::class, 'create'])->name('create');
        Route::post('/', [AdminKunjunganController::class, 'store'])->name('store');
        Route::get('/{id}', [AdminKunjunganController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [AdminKunjunganController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminKunjunganController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminKunjunganController::class, 'destroy'])->name('destroy');
        
        // Detail route
        Route::get('/detail/{id}', [AdminKunjunganController::class, 'detail'])->name('detail');
    });
});

/*
|--------------------------------------------------------------------------
| Sales Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:sales'])->prefix('sales')->name('sales.')->group(function() {
    /*
     * Profil Sales Routes
     */
    Route::prefix('profil_sales')->name('profil_sales.')->group(function() {
        Route::get('/', [SalesProfilSalesController::class, 'index'])->name('index');
        Route::get('/create', [SalesProfilSalesController::class, 'create'])->name('create');
        Route::post('/store', [SalesProfilSalesController::class, 'store'])->name('store');
    });

    /*
     * Produk Sales Routes
     */
    Route::prefix('produk')->name('produk.')->group(function() {
        Route::get('/', [SalesProdukController::class, 'index'])->name('index');
        Route::get('/create', [SalesProdukController::class, 'create'])->name('create');
        Route::post('/store', [SalesProdukController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SalesProdukController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [SalesProdukController::class, 'update'])->name('update');
        Route::get('/detail/{id}', [SalesProdukController::class, 'detail'])->name('detail');
    });

    /*
     * Jadwal Sales Routes
     */
    Route::prefix('jadwal')->name('jadwal.')->group(function() {
        Route::get('/', [SalesJadwalController::class, 'index'])->name('index');
    });

    /*
     * Kunjungan Sales Routes
     */
    Route::prefix('kunjungan')->name('kunjungan.')->group(function() {
        Route::get('/', [SalesKunjunganController::class, 'index'])->name('index');
        Route::get('/detail/{id}', [SalesKunjunganController::class, 'detail'])->name('detail');
        Route::post('/validate-location', [SalesKunjunganController::class, 'validateLocation_sales'])->name('validate.location');
        Route::get('/create', [SalesKunjunganController::class, 'create'])->name('create');
        Route::post('/store', [SalesKunjunganController::class, 'store'])->name('store');
    });

    /*
     * Tim Sales Routes
     */
    Route::prefix('tim_sales')->name('tim_sales.')->group(function() {
        Route::get('/', [SalesTimSalesController::class, 'index'])->name('index');
    });
});