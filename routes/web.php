<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;
use function Laravel\Prompts\search;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/item/search', [ItemController::class, 'search'])->name('item.search');

// wishlist
Route::get('/wishlist', [ItemController::class, 'wishlist'])->name('item.wishlist');
Route::post('/wishlist/add/{id}', [ItemController::class, 'addToWishlist'])->name('item.addToWishlist');
Route::delete('/wishlist/remove/{id}', [ItemController::class, 'removeFromWishlist'])->name('item.removeFromWishlist');

// Items
Route::resource('item', ItemController::class);

// Auth
Route::get('/signup', [SignupController::class, 'signup'])->name('signup');
Route::get('/login', [LoginController::class, 'login'])->name('login');

//  Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{itemId}', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::put('/cart/update/{cartItemId}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::delete('/cart/remove/{cartItemId}', [CartController::class, 'removeFromCart'])->name('cart.removeFromCart');




