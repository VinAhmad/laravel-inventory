<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MasterGudangController;
use App\Http\Controllers\MasterKategorigController;
use App\Http\Controllers\StokController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate'])
    ->name('kirim-data-login');

Route::get('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth');

Route::get('/master', [MasterController::class, 'index'])->middleware('auth')->name('master');

// Route Master Barang
Route::get('/master/barang', [MasterBarangController::class, 'index'])->middleware('auth')->name('master-barang');
Route::get('/master/barang/tambah', [MasterBarangController::class, 'create'])->middleware('auth')->name('master-barang-tambah');
Route::post('/master/barang/simpan', [MasterBarangController::class, 'store'])->middleware('auth')->name('master-barang-simpan');
Route::get('/master/barang/hapus/{id}', [MasterBarangController::class, 'destroy'])->where('id', '[0-9]+')->middleware('auth')->name('master-barang-hapus');
Route::get('master/barang/detail/{id}', [MasterBarangController::class, 'show'])->middleware('auth')->name('master-barang-detail')->where('id', '[0-9]+');
Route::get('master/barang/edit/{id}', [MasterBarangController::class, 'edit'])->middleware('auth')->name('master-barang-edit')->where('id', '[0-9]+');
Route::post('master/barang/update/{id}', [MasterBarangController::class, 'update'])->middleware('auth')->name('master-barang-update')->where('id', '[0-9]+');;

Route::get('master/gudang', [MasterGudangController::class, 'index'])->middleware('auth')->name('master-gudang');
Route::get('master/kategori', [MasterKategorigController::class, 'index'])->middleware('auth')->name('master-kategori');

// Route stok masuk
Route::get('/stok-masuk', [StokController::class, 'form_stok_masuk'])->name('stok-masuk')->middleware('auth');
