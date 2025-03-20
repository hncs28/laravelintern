<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Cache;
use App\Jobs\CacheLectureCount;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\UserController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/get/usercourses', [CourseController::class, 'getUserCourses'])->name('get.user.courses');
    Route::get('/get/allcourses', [CourseController::class, 'getCoursesJson']);
    Route::get('/lectures/count', [LectureController::class, 'getCountLecture']);
    Route::get('/courses/category/{id}', [CourseController::class, 'getCoursesByCategory']);
    Route::get('/get/category', [CategoryController::class, 'getAll']);
    Route::get('/get/courses',[CourseController::class,'getUserandCourses']);
    Route::get('/user/detail', [UserController::class, 'getdetail']);
});

