<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PengecekanfasilitasController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('landing'); 
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
});


Route::middleware('auth')->group(function () {
    Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas');
    Route::post('/fasilitas', [FasilitasController::class, 'store'])->name('fasilitas.store');
    Route::get('/fasilitas/create', [FasilitasController::class, 'create'])->name('fasilitas.create');
    Route::get('/fasilitas/{id}/edit', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
    Route::delete('/fasilitas/{id}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');
    Route::put('/fasilitas/{id}', [FasilitasController::class, 'update'])->name('fasilitas.update');
    Route::get('/fasilitas/search', [FasilitasController::class, 'search'])->name('fasilitas.search');
    Route::get('/laporan/fasilitas', [FasilitasController::class, 'laporanFasilitas'])->name('laporan.fasilitas');
    Route::get('/fasilitas/export', [FasilitasController::class, 'export'])->name('fasilitas.export');
    Route::get('/fasilitas/export-pdf/{bulan}/{tahun}', [FasilitasController::class, 'exportPdf'])->name('fasilitas.exportPdf');
});

Route::middleware('auth')->group(function () {
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
    Route::get('/transaksi/search', [TransaksiController::class, 'search'])->name('transaksi.search');
    Route::get('/laporan/tarnsaksi', [TransaksiController::class, 'laporanTransaksi'])->name('laporan.transaksi');
    Route::get('/transaksi/export', [TransaksiController::class, 'export'])->name('transaksi.export');
    Route::get('/transaksi/export-pdf/{bulan}/{tahun}', [TransaksiController::class, 'exportPdf'])->name('transaksi.exportPdf');

});

Route::middleware('auth')->group(function () {
    Route::get('/kamar', [KamarController::class, 'index'])->name('kamar');
    Route::get('/kamar/create', [KamarController::class, 'create'])->name('kamar.create');
    Route::post('/kamar', [KamarController::class, 'store'])->name('kamar.store');
    Route::get('/kamar/{id}/edit', [KamarController::class, 'edit'])->name('kamar.edit');
    Route::put('/kamar/{id}', [KamarController::class, 'update'])->name('kamar.update');
    Route::delete('/kamar/{id}', [KamarController::class, 'destroy'])->name('kamar.destroy');

});

Route::middleware('auth')->group(function () {
    Route::get('/pengecekan', [PengecekanfasilitasController::class, 'index'])->name('pengecekan');
    Route::get('/pengecekan/create', [PengecekanfasilitasController::class, 'create'])->name('pengecekan.create');
    Route::post('/pengecekan/store', [PengecekanfasilitasController::class, 'store'])->name('pengecekan.store');
});


Route::get('/laporan/fasilitas', function () {return view('laporan.fasilitas');})->name('laporan.fasilitas');

Route::get('/laporan/transaksi', function () {return view('laporan.transaksi');})->name('laporan.transaksi');

require __DIR__.'/auth.php';
