<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\NavigationController::class, 'index'])->name('home');
Route::get('dashboard/', [App\Http\Controllers\QuoteController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('quote/{id}/', [App\Http\Controllers\QuoteController::class, 'show'])->name('single');
Route::get('create/', [App\Http\Controllers\QuoteController::class, 'create'])->name('create')->middleware('auth');
Route::post('store/', [App\Http\Controllers\QuoteController::class, 'store'])->name('store');
Auth::routes();
