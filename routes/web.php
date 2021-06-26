<?php

use Illuminate\Support\Facades\Route;

# Home Route
Route::get('/', [App\Http\Controllers\NavigationController::class, 'index'])->name('home');

# User Routes
Route::get('dashboard/', [App\Http\Controllers\QuoteController::class, 'dashboard'])->name('user.dashboard')->middleware('auth');

# Quote Routes
Route::get('quote/{id}/', [App\Http\Controllers\QuoteController::class, 'show'])->name('quote.single');
Route::get('create/', [App\Http\Controllers\QuoteController::class, 'create'])->name('quote.create')->middleware('auth');
Route::get('edit/{id}/', [App\Http\Controllers\QuoteController::class, 'edit'])->name('quote.edit')->middleware('auth');
Route::post('store/', [App\Http\Controllers\QuoteController::class, 'store'])->name('quote.store');
Route::post('update/{id}/', [App\Http\Controllers\QuoteController::class, 'update'])->name('quote.update');
Route::delete('delete/{id}/', [App\Http\Controllers\QuoteController::class, 'delete'])->name('quote.delete');

# Like Routes
Route::get('quote/like/{id}/', [App\Http\Controllers\LikeController::class, 'like'])->name('reply.like');
Route::get('quote/unlike/{id}/', [App\Http\Controllers\LikeController::class, 'unlike'])->name('reply.unlike');
Auth::routes();
