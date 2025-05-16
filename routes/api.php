<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\LoginController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')
    ->group(function () {
        Route::apiResource('user', UserController::class)
            ->only(['index', 'show', 'store', 'update', 'destroy'])
            ->middleware('auth:sanctum');

        Route::post('/tokens/test', [AuthController::class, 'createTestToken']);
    });

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register');
