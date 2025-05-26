<?php

use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LevelController;
use App\Http\Controllers\admin\PenggunaController;
use App\Http\Controllers\admin\WilayahController;
use App\Http\Controllers\AuthController;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
Route::post('/customer', [CustomerController::class, 'create'])->name('customer.create');
Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::delete('/hapuscustomer/{id}', [CustomerController::class, 'delete'])->name('customer.delete');