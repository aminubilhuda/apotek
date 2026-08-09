<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', fn () => redirect()->to('/admin/login'))->name('login');

Route::middleware('auth')->get('/transaksi/{transaksi}/cetak-nota', [NotaController::class, 'cetak'])->name('transaksi.cetak-nota');
