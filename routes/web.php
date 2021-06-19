<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\NavigationController::class, 'index'])->name('home');
Route::get('quote/{id}/', [App\Http\Controllers\QuoteController::class, 'show'])->name('single');
Route::get('create/', [App\Http\Controllers\QuoteController::class, 'create'])->name('create');
Route::post('store/', [App\Http\Controllers\QuoteController::class, 'store'])->name('store');
Auth::routes();
