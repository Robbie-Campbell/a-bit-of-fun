<?php

use Illuminate\Support\Facades\Route;

# Home Route
Route::get('/', [App\Http\Controllers\NavigationController::class, 'index'])->name('home');

# User Routes
Route::get('user/dashboard/{id}', [App\Http\Controllers\UserController::class, 'dashboard'])->name('user.dashboard')->middleware('auth');
Route::get('user/edit/', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::post('user/update/', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

# Quote Routes
Route::get('quote/single/{id}', [App\Http\Controllers\QuoteController::class, 'show'])->name('quote.single');
Route::get('quote/create/', [App\Http\Controllers\QuoteController::class, 'create'])->name('quote.create')->middleware('auth');
Route::get('quote/edit/{id}/', [App\Http\Controllers\QuoteController::class, 'edit'])->name('quote.edit')->middleware('auth');
Route::get('quote/category/{id}/', [App\Http\Controllers\QuoteController::class, 'category'])->name('quote.category');
Route::post('quote/store/', [App\Http\Controllers\QuoteController::class, 'store'])->name('quote.store');
Route::post('quote/update/{id}/', [App\Http\Controllers\QuoteController::class, 'update'])->name('quote.update');
Route::delete('quote/delete/{id}/', [App\Http\Controllers\QuoteController::class, 'delete'])->name('quote.delete');

# Like Routes
Route::get('quote/like/{id}/', [App\Http\Controllers\LikeController::class, 'like'])->name('likes.like');
Route::get('quote/unlike/{id}/', [App\Http\Controllers\LikeController::class, 'unlike'])->name('likes.unlike');
Route::get('user/likes/{id}/', [App\Http\Controllers\LikeController::class, 'user_likes'])->name('likes.user_likes');
Auth::routes();
