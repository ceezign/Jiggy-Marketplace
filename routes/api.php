<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;


Route::post('register', [AuthController::class, 'register'])->name('api.register');
Route::post('login', [AuthController::class, 'login'])->name('api.login');
Route::middleware('auth:api')->get('/user', [AuthController::class, 'user'])->name('api.user');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('api.logout');