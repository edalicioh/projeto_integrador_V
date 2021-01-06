<?php

use App\Http\Controllers\Api\JWTAuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [JWTAuthController::class, 'login']);
    Route::group(['middleware' => 'auth.jwt'], function () {
        Route::get('logout', [JWTAuthController::class, 'logout']);
        Route::get('refresh', [JWTAuthController::class, 'refresh']);
        Route::get('me', [JWTAuthController::class, 'me']);
        Route::get('homeJwt', [HomeController::class, 'indexJwt']);
    });
});
