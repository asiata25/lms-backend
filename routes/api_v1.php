<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GetAllCoursesController;
use App\Http\Controllers\GetCourseDetailController;
use App\Http\Controllers\MaterialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/courses', GetAllCoursesController::class);
Route::get('/courses/{idCourse}', GetCourseDetailController::class);

Route::prefix('instructor')->middleware(['auth:sanctum'])->group(function () {
    Route::resource('courses', CourseController::class);

    Route::post('courses/{idCourse}/materials', [MaterialController::class, 'store']);
});
