<?php

use App\Http\Controllers\admin\DashboardController;
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