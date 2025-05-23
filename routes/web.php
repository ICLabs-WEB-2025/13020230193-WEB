<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PropertyController as UserPropertyController;
use App\Http\Controllers\User\KPRCalculatorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Middleware\AdminMiddleware;


// 🔐 AUTENTIKASI PUBLIK (LOGIN SEMUA ROLE: ADMIN, BUYER, SELLER)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// 🧾 REGISTER BUYER & SELLER
Route::get('/register/buyer', [RegisterController::class, 'showBuyerForm'])->name('register.buyer');
Route::post('/register/buyer', [RegisterController::class, 'registerBuyer']);
Route::get('/register/seller', [RegisterController::class, 'showSellerForm'])->name('register.seller');
Route::post('/register/seller', [RegisterController::class, 'registerSeller']);


// 📦 RUTE ADMIN (DASHBOARD & RESOURCE)
Route::prefix('admin')
    ->middleware(['auth', AdminMiddleware::class])
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('properties', PropertyController::class)->names('properties');
        Route::resource('users', UserController::class)->names('users')->except(['show']);
});


Route::middleware(['auth', 'admin'])->get('/tes-admin', function () {
    return 'Middleware admin berhasil.';
});


// 🌐 RUTE USER PUBLIK
Route::name('user.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Rute untuk properti
    Route::prefix('properties')->name('properties.')->group(function () {
        Route::get('/', [UserPropertyController::class, 'index'])->name('index');
        Route::get('/{property}', [UserPropertyController::class, 'show'])->name('show');
    });

    // Rute untuk kalkulator KPR
    Route::prefix('kpr')->name('kpr.')->group(function () {
        Route::get('/', [KPRCalculatorController::class, 'index'])->name('index');
        Route::post('/', [KPRCalculatorController::class, 'calculate'])->name('calculate');
    });
});
