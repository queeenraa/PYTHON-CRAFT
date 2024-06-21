<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\lessonsController;
use App\Http\Controllers\quizController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('template.master');
// });

Route::get('/dashboard', [dashboardController::class, 'index']);

Route::get('/', [dashboardController::class, 'index']);

Route::get('/profile', [profileController::class, 'index']);

Route::get('/lessons', [lessonsController::class, 'index']);

Route::get('/quiz', [quizController::class, 'index']);