<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenjualanDetailController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/barang', [BarangController::class, 'index']);
Route::get('/stok', [StokController::class, 'index']);
Route::get('/penjualan', [PenjualanDetailController::class, 'index']);

