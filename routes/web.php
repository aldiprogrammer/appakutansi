<?php

use App\Http\Controllers\admin\CostController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LevelController;
use App\Http\Controllers\admin\PenggunaController;
use App\Http\Controllers\admin\ProdukController;
use App\Http\Controllers\admin\ProsesController;
use App\Http\Controllers\admin\RekeningController;
use App\Http\Controllers\admin\StoreController;
use App\Http\Controllers\admin\TransaksiCostController;
use App\Http\Controllers\admin\TransaksiPelangganController;
use App\Http\Controllers\admin\TransferController;
use App\Http\Controllers\admin\WilayahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\pdf\PdfCustomer;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'act_login'])->name('auth.login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/wilayah', [WilayahController::class, 'index'])->name('wilayah');
Route::post('/wilayah', [WilayahController::class, 'create'])->name('wilayah.create');
Route::put('/wilayah/{id}', [WilayahController::class, 'update'])->name('wilayah.update');
Route::delete('/hapuswilayah/{id}', [WilayahController::class, 'delete'])->name('wilayah.delete');

Route::get('/level', [LevelController::class, 'index'])->name('level');
Route::post('/level', [LevelController::class, 'create'])->name('level.create');
Route::put('/level/{id}', [LevelController::class, 'update'])->name('level.update');
Route::delete('/hapuslevel/{id}', [LevelController::class, 'delete'])->name('level.delete');

Route::get('/user', [PenggunaController::class, 'index'])->name('user');
Route::post('/user', [PenggunaController::class, 'create'])->name('user.create');
Route::put('/user/{id}', [PenggunaController::class, 'update'])->name('user.update');
Route::delete('/hapususer/{id}', [PenggunaController::class, 'delete'])->name('user.delete');

Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
Route::get('/customer/{id}', [CustomerController::class, 'detail'])->name('customer.detail');
Route::post('/customer', [CustomerController::class, 'create'])->name('customer.create');
// Route::post('/rekening', [CustomerController::class, 'rekening'])->name('customer.rekening');
Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::delete('/hapuscustomer/{id}', [CustomerController::class, 'delete'])->name('customer.delete');


Route::get('/cost', [CostController::class, 'index'])->name('cost');
Route::post('/cost', [CostController::class, 'create'])->name('cost.create');
Route::put('/cost/{id}', [CostController::class, 'update'])->name('cost.update');
Route::delete('/hapuscost/{id}', [CostController::class, 'delete'])->name('cost.delete');
Route::get('/detailcost/{id}', [CostController::class, 'detailcost'])->name('cost.detailcost');

Route::get('/transaksicost', [TransaksiCostController::class, 'index'])->name('transaksicost');
Route::post('/transaksicost', [TransaksiCostController::class, 'create'])->name('transaksicost.create');
Route::put('/transaksicost/{id}', [TransaksiCostController::class, 'update'])->name('transaksicost.update');
Route::delete('/hapustransaksicost/{id}', [TransaksiCostController::class, 'delete'])->name('transaksicost.delete');

Route::get('/store', [StoreController::class, 'index'])->name('store');
Route::get('/store/{id}', [StoreController::class, 'detail'])->name('store.detail');
Route::post('/store', [StoreController::class, 'create'])->name('store.create');
Route::put('/store/{id}', [StoreController::class, 'update'])->name('store.update');
Route::delete('/hapusstore/{id}', [StoreController::class, 'delete'])->name('store.delete');

Route::get('/rekening/{kode}', [RekeningController::class, 'index'])->name('rekening');
Route::post('/rekening', [RekeningController::class, 'create'])->name('rekening.create');
Route::delete('rekening/hapusrekening/{id}', [RekeningController::class, 'delete'])->name('rekening.delete');
Route::put('rekening/{id}', [RekeningController::class, 'update'])->name('rekening.update');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/produk/{id}', [ProdukController::class, 'detail'])->name('produk.detail');
Route::post('/produk', [ProdukController::class, 'create'])->name('produk.create');
Route::delete('/hapusproduk/{id}', [ProdukController::class, 'delete'])->name('produk.delete');
Route::put('produk/{id}', [ProdukController::class, 'update'])->name('produk.update');

Route::get('/transaksi', [TransaksiPelangganController::class, 'index'])->name('transaksi');
Route::post('/transaksi', [TransaksiPelangganController::class, 'create'])->name('transaksi.create');
Route::delete('/hapustransaksi/{id}', [TransaksiPelangganController::class, 'delete'])->name('transaksi.delete');
Route::put('transaksi/{id}', [TransaksiPelangganController::class, 'update'])->name('transaksi.update');
Route::put('updatestatus/{id}', [TransaksiPelangganController::class, 'updatestatus'])->name('transaksi.updatestatus');

Route::get('/proses', [ProsesController::class, 'index'])->name('proses');
Route::put('updatestatusproses/{id}', [ProsesController::class, 'updatestatus'])->name('transaksi.updatestatus');

Route::get('/transfer', [TransferController::class, 'index'])->name('transfer');

Route::get('/pdfcustomer', [PdfCustomer::class, 'index'])->name('pdfcustomer');
