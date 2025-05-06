<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\RekapNilaiController;


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
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});

// Halaman Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

//Halaman User
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

// nav Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/admin/kelola-pengguna', function () {
    return view('admin.pengguna');
})->name('kelola-pengguna');

Route::get('/admin/manajemen-soal', function () {
    return view('admin.soal');
})->name('manajemen-soal');

Route::get('/admin/data-user', function () {
    return view('admin.datauser');
})->name('data-user');

Route::get('/admin/rekap-nilai', [RekapNilaiController::class, 'index'])->name('rekap-nilai');

// Route::get('/admin/rekap-nilai', function () {
//     return view('admin.rekapnilai');
// })->name('rekap-nilai');

Route::get('/admin/pengaturan', function () {
    return view('admin.pengaturan');
})->name('pengaturan');

// Route::get('/logout', function () {
//     // Logika logout
//     return redirect('/login');
// })->name('logout');