<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\NavigationController::class, 'index'])->name('home');
Route::get('quote/{id}', [App\Http\Controllers\QuoteController::class, 'show'])->name('single');
Auth::routes();
