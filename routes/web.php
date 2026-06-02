<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transaksi/{transaksi}/cetak-nota', [NotaController::class, 'cetak'])->name('transaksi.cetak-nota');
