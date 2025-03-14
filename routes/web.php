<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PengecekanfasilitasController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\OtherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login'); 
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
    Route::get('/kamar/search', [KamarController::class, 'search'])->name('kamar.search');

});

Route::middleware('auth')->group(function () {
    Route::get('/pengecekan', [PengecekanfasilitasController::class, 'index'])->name('pengecekan');
    Route::get('/pengecekan/create', [PengecekanfasilitasController::class, 'create'])->name('pengecekan.create');
    Route::post('/pengecekan/store', [PengecekanfasilitasController::class, 'store'])->name('pengecekan.store');
    Route::get('/pengecekan/search', [PengecekanfasilitasController::class, 'search'])->name('pengecekan.search');
    Route::get('/pengecekan/tarnsaksi', [PengecekanfasilitasController::class, 'laporanFasilitasRusak'])->name('laporan.fasilitasrusak');
    Route::get('/pengecekan/export', [PengecekanfasilitasController::class, 'export'])->name('pengecekan.export');
    Route::get('/pengecekan/export-pdf/{bulan}/{tahun}', [PengecekanfasilitasController::class, 'exportPdf'])->name('pengecekan.exportPdf');
    Route::delete('/pengecekan/{id}', [PengecekanfasilitasController::class, 'destroy'])->name('pengecekan.destroy');

});


Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/userr/{id}', [UserController::class, 'destroy'])->name('user.destroy');

});

Route::middleware('auth')->group(function () {
    Route::get('/karyawan/kamar', [PegawaiController::class, 'index'])->name('kamar.karyawan');
    Route::get('/karyawan/kamar/{id}/edit', [PegawaiController::class, 'edit'])->name('karyawan.edit');
    Route::put('/karyawan/kamar/{id}', [PegawaiController::class, 'update'])->name('karyawan.update');
    Route::get('/karyawan/search', [PegawaiController::class, 'search'])->name('karyawan.search');
});

Route::middleware('auth')->group(function () {
    Route::get('/other', [OtherController::class, 'index'])->name('other');
    Route::get('/other/search', [OtherController::class, 'search'])->name('other.search');
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/laporan/fasilitas', function () {return view('laporan.fasilitas_rusak');})->name('laporan.fasilitas_rusak');
Route::get('/laporan/fasilitas', function () {return view('laporan.fasilitas');})->name('laporan.fasilitas');
Route::get('/laporan/transaksi', function () {return view('laporan.transaksi');})->name('laporan.transaksi');

require __DIR__.'/auth.php';
