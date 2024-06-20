<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('template.master');
});

<<<<<<< HEAD
Route::middleware(['admin'])->group(function () {
    //Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Tambahkan rute admin lainnya di sini
});
=======
Route::get('/dashboard', [dashboardController::class, 'index']);
>>>>>>> 6da4ad5873d832bd1f5bfafe0560c454c6bd81e2
