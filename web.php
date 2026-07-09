<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;

Route::get('/', function(){
    return view('dashboard');
});

Route::resource('buku', BukuController::class);
Route::resource('anggota', AnggotaController::class);
Route::resource('peminjaman', PeminjamanController::class);
Route::resource('pengembalian', PengembalianController::class);

Route::get('/laporan',[LaporanController::class,'index']);
Route::get('/',[DashboardController::class,'index']);
Route::get('/laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');