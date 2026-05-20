<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuAdminController;
use App\Http\Controllers\Admin\PelayananAdminController;
use App\Http\Controllers\Admin\ProfilAdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/pelayanan', [PelayananController::class, 'create'])->name('pelayanan.create');
Route::post('/pelayanan', [PelayananController::class, 'store'])->name('pelayanan.store');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        
        // Menu
        Route::get('/menu', [MenuAdminController::class, 'index'])->name('admin.menu');
        Route::post('/menu/store', [MenuAdminController::class, 'store'])->name('admin.menu.store');
        Route::post('/menu/update', [MenuAdminController::class, 'update'])->name('admin.menu.update');
        Route::get('/menu/delete/{id}', [MenuAdminController::class, 'destroy'])->name('admin.menu.destroy');
        Route::get('/menu/cetak', [MenuAdminController::class, 'cetak'])->name('admin.menu.cetak');

        // Pelayanan
        Route::get('/pelayanan', [PelayananAdminController::class, 'index'])->name('admin.pelayanan');
        Route::get('/pelayanan/delete/{id}', [PelayananAdminController::class, 'destroy'])->name('admin.pelayanan.destroy');

        // Profil & Admin
        Route::get('/profil', [ProfilAdminController::class, 'index'])->name('admin.profil');
        Route::post('/profil', [ProfilAdminController::class, 'update'])->name('admin.profil.update');
        Route::get('/tambah_admin', [ProfilAdminController::class, 'createAdmin'])->name('admin.tambah');
        Route::post('/tambah_admin', [ProfilAdminController::class, 'storeAdmin'])->name('admin.tambah.store');
    });
});
