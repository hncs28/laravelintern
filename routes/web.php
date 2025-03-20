<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LectureController;

Route::get('/', function () {
    return view('auth/login');
})->name('loginform');
Route::get('/dashboard',function(){
    return view('front/dashboard');
})->name('dashboard');
Route::get('/registerform', function () {
    return view('auth/register');
})->name('registerform');
Route::middleware(['auth:api', 'session'])->post('/add-to-cart', [CartController::class, 'addtoCart']);
Route::middleware(['auth:api', 'session'])->get('/cart', [CartController::class, 'getCart']);
Route::middleware(['auth:api', 'session'])->delete('/clear-cart/{id}', [CartController::class, 'clearCart']);
Route::post('/lectures', [LectureController::class, 'store'])->name('lectures.store');
Route::get('/lectureform', function () {
    return view('lectures/form');
})->name('lectureform');
Route::middleware(['auth:api', 'session'])->post('/save-cart', [CartController::class, 'saveCart']);