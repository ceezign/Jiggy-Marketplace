<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SocialAuthController;
use Illuminate\Support\Facades\Route;
use function Laravel\Prompts\search;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/item/search', [ItemController::class, 'search'])->name('item.search');

// wishlist
Route::get('/wishlist', [ItemController::class, 'wishlist'])->name('item.wishlist');
Route::post('/wishlist/add/{id}', [ItemController::class, 'addToWishlist'])->name('item.addToWishlist');
Route::delete('/wishlist/remove/{id}', [ItemController::class, 'removeFromWishlist'])->name('item.removeFromWishlist');

// Items

Route::get('/item', [ItemController::class, 'index'])->name('item.index');
Route::get('/item/{item}', [ItemController::class, 'show'])->name('item.show');

Route::resource('item', ItemController::class);

// Auth Form 
Route::get('/signup', [SignupController::class, 'signup'])->name('signup');
Route::get('/login', [LoginController::class, 'login'])->name('login');

// Account
Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account');
});

// // Auth
// Route::post('register', [AuthController::class, 'register'])->name('api.register');
// Route::post('login', [AuthController::class, 'login'])->name('api.login');
// Route::middleware('auth.api')->get('/user', [AuthController::class, 'user'])->name('api.user');

// Social Auth
Route::get('auth/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('social.redirect');
Route::get('auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');

// Social callback handler (stores JWT client-side)
Route::get('auth/social-callback', function(){ 
    return view('auth.social-callback'); 
})->name('social.handle');


//  Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{itemId}', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::put('/cart/update/{cartItemId}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::delete('/cart/remove/{cartItemId}', [CartController::class, 'removeFromCart'])->name('cart.removeFromCart');




