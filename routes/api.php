<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\LoginController;
use App\Http\Controllers\Api\v1\TagController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')
    ->group(function () {
        //User
        Route::apiResource('users', UserController::class)
            ->only(['index', 'show', 'store', 'update', 'destroy'])
            ->middleware('auth:sanctum');

        //User tags
        Route::post('users/{id}/tags/', [UserController::class, 'attachTags'])->name('users.tags.attach')
            ->middleware('auth:sanctum');
        Route::delete('users/{id}/tags/{tag_id}', [UserController::class, 'detachTag'])->name('users.tags.detach')
            ->middleware('auth:sanctum');

        //Tags
        Route::apiResource('tags', TagController::class)
            ->only(['store', 'update', 'destroy'])
            ->middleware('auth:sanctum');

        Route
    });

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register');

//Token for test
Route::post('/tokens/test', [AuthController::class, 'createTestToken']);
