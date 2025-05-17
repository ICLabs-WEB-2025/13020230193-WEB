<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Berikut adalah definisi rute untuk aplikasi web, termasuk rute autentikasi
| admin dan rute admin untuk mengelola dashboard, properti, dan pengguna.
|
*/

// Rute Autentikasi Admin
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// Rute Admin (tanpa middleware auth/admin untuk sementara)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('properties', PropertyController::class)->names('properties');
    Route::resource('users', UserController::class)->names('users')->except(['show']);
});
