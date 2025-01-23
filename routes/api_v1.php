<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GetAllCoursesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/courses', GetAllCoursesController::class);
