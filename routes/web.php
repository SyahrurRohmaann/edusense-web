<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LogoutController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/features', [HomeController::class, 'features']);
Route::get('/store', [HomeController::class, 'store']);

// Auth routes (simplified for this example)

Route::get('/download', function() {
    return view('download');
});

// Middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});

// Halaman Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//Halaman Admin
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

//Halaman User
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');