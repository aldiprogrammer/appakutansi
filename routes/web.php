<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\WilayahController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'act_login'])->name('auth.login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/wilayah', [WilayahController::class, 'index'])->name('wilayah');
