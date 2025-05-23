<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KelolaSoalController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\RekapNilaiController;
use App\Http\Controllers\Admin\SoalController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Middleware\AdminMiddleware;

use App\Http\Controllers\User\ProfilAnakController;
use App\Http\Controllers\User\DataUserController;
use App\Http\Controllers\User\LeaderboardController;
use App\Http\Controllers\User\RekapNilaiUserController;
use App\Http\Controllers\User\PengaturanUserController;

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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});

// Halaman Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

//Halaman Registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {

        // You'll probably need a route for deletion too
        Route::delete('/admin/kelola-pengguna/{user}', [RegisterController::class, 'destroy'])->name('pengguna.destroy');

        //Halaman User

        // nav Admin
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Resource route untuk kelola pengguna
        Route::resource('pengguna', PenggunaController::class)->except(['show']);

        // Tambahkan alias untuk kelola-pengguna yang mengarah ke index method dari PenggunaController
        Route::get('/kelola-pengguna', [PenggunaController::class, 'index'])->name('kelola-pengguna');

        // Tambahkan rute AJAX jika diperlukan untuk mendapatkan data pengguna
        Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');

        Route::get('/kelola-soal', [KelolaSoalController::class, 'index'])->name('kelola-soal');

        Route::get('/admin/kelolasoal', [KelolaSoalController::class, 'index'])->name('kelolasoal.index');
        Route::post('/admin/kelolasoal/store', [KelolaSoalController::class, 'store'])->name('kelolasoal.store');
        Route::delete('/admin/kelolasoal/{id}', [KelolaSoalController::class, 'destroy'])->name('kelolasoal.destroy');

        Route::get('/manajemen-soal', [SoalController::class, 'index'])->name('manajemen-soal');
    });
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Route CRUD untuk soal
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/manajemen-soal', [SoalController::class, 'store'])->name('soal.store');
    Route::get('/manajemen-soal/{id}/edit', [SoalController::class, 'edit'])->name('soal.edit');
    Route::put('/manajemen-soal/{id}', [SoalController::class, 'update'])->name('soal.update');
    Route::delete('/manajemen-soal/{id}', [SoalController::class, 'destroy'])->name('soal.destroy');
    Route::get('/rekap-nilai', [RekapNilaiController::class, 'index'])->name('rekap-nilai');
    Route::delete('/manajemen-soal', [SoalController::class, 'index'])->name('soal.index');
    Route::get('/pengaturan', function () {
        return view('admin.pengaturan');
    })->name('pengaturan');

    // Tambahkan route lainnya jika perlu
});

Route::get('/admin/data-user', function () {
    return view('admin.datauser');
})->name('data-user');


// Halaman User

Route::prefix('user')->name('user.')->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profil-anak', [ProfilAnakController::class, 'index'])->name('profil-anak');
    Route::get('/data-user', [DataUserController::class, 'index'])->name('data-user');
    Route::get('/rekap-nilai', [RekapNilaiUserController::class, 'index'])->name('rekap-nilai');
    Route::get('/pengaturan', [PengaturanUserController::class, 'index'])->name('pengaturan');
    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');
});
