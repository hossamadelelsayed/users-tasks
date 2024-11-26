<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('{id}', App\Http\Controllers\Api\v1\Users\getUserController::class);
    });
});
