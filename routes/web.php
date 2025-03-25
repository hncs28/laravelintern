<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\TestController;
Route::get('/', function () {
    return view('auth/login');
})->name('loginform');
Route::get('/dashboard', function () {
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
Route::get('/CMS/lectures', [LectureController::class, 'getalllectures'])->name('lectures.index');
Route::get('/lectures/{id}/edit', [LectureController::class, 'edit'])->name('lectures.edit');
Route::put('/lectures/{id}', [LectureController::class, 'update'])->name('lectures.update');
Route::delete('/lectures/{id}', [LectureController::class, 'destroy'])->name('lectures.destroy');
