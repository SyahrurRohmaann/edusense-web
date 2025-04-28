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

Route::get('/download', function () {
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

// nav Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/admin/kelola-pengguna', function () {
    return view('admin.kelola-pengguna');
})->name('kelola-pengguna');

Route::get('/admin/manajemen-soal', function () {
    return view('admin.soal');
})->name('manajemen-soal');

Route::get('/admin/data-user', function () {
    return view('data-user');
})->name('data-user');

Route::get('/admin/rekap-nilai', function () {
    return view('rekap-nilai');
})->name('rekap-nilai');

Route::get('/admin/pengaturan', function () {
    return view('pengaturan');
})->name('pengaturan');

Route::get('/logout', function () {
    // Logika logout
    return redirect('/login');
})->name('logout');