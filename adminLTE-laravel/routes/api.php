<?php

use Illuminate\Http\Request;
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
use App\Http\Controllers\UserController;
use App\Http\Controllers\lessonsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\quizController;

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::get('oauth/register', [UserController::class, 'redirectGoogle']);
Route::get('oauth/register/call-back', [UserController::class, 'callbackGoogle']);

Route::get('/lessons/{id}', [lessonsController::class, 'show']);
Route::post('/lessons', [lessonsController::class, 'store']);
Route::put('/lessons/{id}', [lessonsController::class, 'update']);
Route::delete('/lessons/{id}', [lessonsController::class, 'destroy']);

Route::get('/courses/{id}', [CoursesController::class, 'show']);
Route::post('/courses', [CoursesController::class, 'store']);
Route::put('/courses/{id}', [CoursesController::class, 'update']);
Route::delete('/courses/{id}', [CoursesController::class, 'destroy']);

Route::get('/quizzes/{id}', [quizController::class, 'show']);
Route::post('/quizzes', [quizController::class, 'store']);
Route::put('/quizzes/{id}', [quizController::class, 'update']);
Route::delete('/quizzes/{id}', [quizController::class, 'destroy']);