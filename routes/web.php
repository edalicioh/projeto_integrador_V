<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', fn () => redirect()->route('login'));

Route::get('/home', [HomeController::class, 'index'])->name('home');
