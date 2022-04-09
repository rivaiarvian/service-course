<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\MentorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//mentor
Route::get('/mentors',[MentorController::class, 'index']);
Route::get('/mentors/{id}',[MentorController::class, 'show']);
Route::post('/mentors',[MentorController::class, 'create']);
Route::put('/mentors/{id}',[MentorController::class, 'update']);
Route::delete('/mentors/{id}',[MentorController::class, 'destroy']);


//course
Route::get('/courses',[CourseController::class, 'index']);
Route::post('/courses',[CourseController::class, 'create']);
Route::put('/courses/{id}',[CourseController::class, 'update']);
Route::delete('/courses/{id}',[CourseController::class, 'destroy']);