<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogPinjamController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // kelola data
    Route::prefix('kelola-data')->group(function () {
        // data buku
        Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
        Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
        Route::put('/buku', [BukuController::class, 'update'])->name('buku.update');
        Route::delete('/buku/{id}', [BukuController::class, 'drop'])->name('buku.drop');
        
        // anggota
        Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
        Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
        Route::put('/anggota', [AnggotaController::class, 'update'])->name('anggota.update');
        Route::delete('/anggota/{id}', [AnggotaController::class, 'drop'])->name('anggota.drop');
    });
    
    
    // sirkulasi
    Route::get('/sirkulasi', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::post('/sirkulasi', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::put('/sirkulasi/perpanjang/{id}', [PeminjamanController::class, 'perpanjang'])->name('peminjaman.perpanjang');
    Route::put('/sirkulasi/pengembalian/{id}', [PeminjamanController::class, 'pengembalian'])->name('peminjaman.pengembalian');
    
    // log data
    Route::prefix('/log-data')->group(function () {
        // peminjaman
        Route::get('/peminjaman', [LogPinjamController::class, 'peminjaman'])->name('log-data.peminjaman');
        
        // pengembalian
        Route::get('/pengembalian', [LogPinjamController::class, 'pengembalian'])->name('log-data.pengembalian');
    });

    
    // pengguna
    Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna.index');
    Route::put('/pengguna', [UserController::class, 'update'])->name('pengguna.update');

    Route::middleware('isAdmin')->group(function () {
        Route::post('/pengguna', [UserController::class, 'store'])->name('pengguna.store');
        Route::put('/pengguna/admin/{id}', [UserController::class, 'changeToAdmin'])->name('pengguna.toAdmin');
        Route::delete('/pengguna/admin/{id}', [UserController::class, 'drop'])->name('pengguna.drop');
    });
});

Auth::routes();