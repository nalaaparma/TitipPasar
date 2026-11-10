<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('home');
});

// Halaman home
Route::get('/home', function () {
    return view('home');
});
Route::resource('produk', ProdukController::class);
