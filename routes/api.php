<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SoalController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/tes-api', function () {
    return response()->json(['message' => 'API route works!']);
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/soal/category/{id}', [SoalController::class, 'byCategory']);

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/user', [AuthController::class, 'user']);
//     Route::get('/soal', [SoalController::class, 'index']);
//     Route::get('/soal/{id}', [SoalController::class, 'show']);
//     Route::get('/categories', [CategoryController::class, 'index']);
//     Route::get('/soal/{id}/detail', [SoalController::class, 'detail']);
//     Route::post('/soal/{id}/rekap', [SoalController::class, 'rekap']);
// });
