<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PenjualanDetailController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Routing\RouteGroup;




Route::get('/', [WelcomeController::class, 'index']);
Route::get('/stok', [StokController::class, 'index']);
Route::get('/penjualan', [PenjualanController::class, 'index']);

Route::Group(['prefix' => 'user'], function(){
    Route::get('/', [UserController::class, 'index']); //menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);  //menampilkan data user dalam bentuk json untuk datables
    Route::get('/create', [UserController::class, 'create']); //menampilkan hallaman form tambah user
    Route::post('/', [UserController::class, 'store']); //menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']); //menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']); //menampilkan halaman form edit
    Route::put('/{id}', [UserController::class, 'update']); //menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']); //menghapus data user
});

Route::Group(['prefix' => 'level'], function(){
    Route::get('/', [LevelController::class, 'index']); //menampilkan halaman awal user
    Route::post('/list', [LevelController::class, 'list']);  //menampilkan data user dalam bentuk json untuk datables
    Route::get('/create', [LevelController::class, 'create']); //menampilkan hallaman form tambah user
    Route::post('/', [LevelController::class, 'store']); //menyimpan data user baru
    Route::get('/{id}', [LevelController::class, 'show']); //menampilkan detail user
    Route::get('/{id}/edit', [LevelController::class, 'edit']); //menampilkan halaman form edit
    Route::put('/{id}', [LevelController::class, 'update']); //menyimpan perubahan data user
    Route::delete('/{id}', [LevelController::class, 'destroy']); //menghapus data user
});

Route::Group(['prefix' => 'kategori'], function(){
    Route::get('/', [KategoriController::class, 'index']); //menampilkan halaman awal user
    Route::post('/list', [KategoriController::class, 'list']);  //menampilkan data user dalam bentuk json untuk datables
    Route::get('/create', [KategoriController::class, 'create']); //menampilkan hallaman form tambah user
    Route::post('/', [KategoriController::class, 'store']); //menyimpan data user baru
    Route::get('/{id}', [KategoriController::class, 'show']); //menampilkan detail user
    Route::get('/{id}/edit', [KategoriController::class, 'edit']); //menampilkan halaman form edit
    Route::put('/{id}', [KategoriController::class, 'update']); //menyimpan perubahan data user
    Route::delete('/{id}', [KategoriController::class, 'destroy']); //menghapus data user
});

Route::Group(['prefix' => 'barang'], function(){
    Route::get('/', [BarangController::class, 'index']); //menampilkan halaman awal user
    Route::post('/list', [BarangController::class, 'list']);  //menampilkan data user dalam bentuk json untuk datables
    Route::get('/create', [BarangController::class, 'create']); //menampilkan hallaman form tambah user
    Route::post('/', [BarangController::class, 'store']); //menyimpan data user baru
    Route::get('/{id}', [BarangController::class, 'show']); //menampilkan detail user
    Route::get('/{id}/edit', [BarangController::class, 'edit']); //menampilkan halaman form edit
    Route::put('/{id}', [BarangController::class, 'update']); //menyimpan perubahan data user
    Route::delete('/{id}', [BarangController::class, 'destroy']); //menghapus data user
});
