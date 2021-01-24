<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\FrequencyController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', fn () => redirect()->route('login'));



Route::get('/home', [ClassesController::class, 'index'])->name('home');
Route::resource('/class', ClassesController::class);

Route::get('/frequency/{classesId}', [FrequencyController::class, 'show'])->name('frequency.show');
Route::get('/frequency/calendar/{classesId}', [FrequencyController::class, 'showCalendar'])->name('frequency.calendar');
Route::post('/frequency/date', [FrequencyController::class, 'getFrequencyByDate'])->name('frequency.date');
Route::post('/frequency/store', [FrequencyController::class, 'storeFrequencyByDate'])->name('frequency.store');
