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


Route::Group(['prefix' => 'user'], function(){
    Route::get('/', [UserController::class, 'index']);
    Route::post('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::get('/create_ajax', [UserController::class, 'create_ajax']);
    Route::post('/user_ajax', [UserController::class, 'store_ajax']); // Didefinisikan sebelum {id}
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
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

Route::Group(['prefix' => 'stok'], function(){
    Route::get('/', [StokController::class, 'index']); //menampilkan halaman awal user
    Route::post('/list', [StokController::class, 'list']);  //menampilkan data user dalam bentuk json untuk datables
    Route::get('/create', [StokController::class, 'create']); //menampilkan hallaman form tambah user
    Route::post('/', [StokController::class, 'store']); //menyimpan data user baru
    Route::get('/{id}', [StokController::class, 'show']); //menampilkan detail user
    Route::get('/{id}/edit', [StokController::class, 'edit']); //menampilkan halaman form edit
    Route::put('/{id}', [StokController::class, 'update']); //menyimpan perubahan data user
    Route::delete('/{id}', [StokController::class, 'destroy']); //menghapus data user
});

Route::Group(['prefix' => 'penjualanDetail'], function(){
    Route::get('/', [PenjualanDetailController::class, 'index']); //menampilkan halaman awal user
    Route::post('/list', [PenjualanDetailController::class, 'list']);  //menampilkan data user dalam bentuk json untuk datables
    Route::get('/create', [PenjualanDetailController::class, 'create']); //menampilkan hallaman form tambah user
    Route::post('/', [PenjualanDetailController::class, 'store']); //menyimpan data user baru
    Route::get('/{id}', [PenjualanDetailController::class, 'show']); //menampilkan detail user
    Route::get('/{id}/edit', [PenjualanDetailController::class, 'edit']); //menampilkan halaman form edit
    Route::put('/{id}', [PenjualanDetailController::class, 'update']); //menyimpan perubahan data user
    Route::delete('/{id}', [PenjualanDetailController::class, 'destroy']); //menghapus data user
});