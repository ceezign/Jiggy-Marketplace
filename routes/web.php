<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;
use function Laravel\Prompts\search;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/item/search', [ItemController::class, 'search'])->name('search');

Route::get('/item/wishlist', [ItemController::class, 'wishlist'])->name('item.wishlist');

Route::resource('item', ItemController::class);

Route::get('/signup', [SignupController::class, 'signup'])->name('signup');

Route::get('/login', [LoginController::class, 'login'])->name('login');




