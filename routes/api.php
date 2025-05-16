<?php

use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->middleware('api')
    ->group(function () {
        Route::middleware('auth:sanctum')->group(function () {
            Route::apiResource('user', UserController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
        });
    });
