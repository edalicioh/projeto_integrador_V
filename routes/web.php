<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', fn () => redirect()->route('login'));



Route::get('/home', [ClassesController::class, 'index'])->name('home');
Route::resource('/class', ClassesController::class);
