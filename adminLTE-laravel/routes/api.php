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

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::get('oauth/register', [UserController::class, 'redirectGoogle']);
Route::get('oauth/register/call-back', [UserController::class, 'callbackGoogle']);

Route::get('/lessons/{id}', [lessonsController::class, 'show']);
Route::post('/lessons', [lessonsController::class, 'store']);
Route::put('/lessons/{id}', [lessonsController::class, 'update']);
Route::delete('/lessons/{id}', [lessonsController::class, 'destroy']);