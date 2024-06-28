<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\lessonsController;
use App\Http\Controllers\quizController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\editLessonsController;

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

Route::get('/courses', [CoursesController::class, 'index']);

Route::get('/lessons', [lessonsController::class, 'index']);

Route::get('/quiz', [quizController::class, 'index']);
Route::post('/quizzes', [QuizController::class, 'store']);
Route::put('/quizzes/{id}', [quizController::class, 'update'])->name('quizzes.update');
Route::get('/tambahQuiz', function () {
    return view('layouts.quiz.tambahQuiz');
});
Route::get('/editQuiz/{id}', function () {
    return view('layouts.quiz.editQuiz');
});
Route::get('/editQuiz/{id}', [quizController::class, 'editQuiz'])->name('editQuiz'); // Rute untuk halaman edit


Route::get('/login', [loginController::class, 'index']);

Route::get('/register', [registerController::class, 'index']);

Route::get('/edit-lessons', [lessonsController::class, 'edit'])->name('edit.quiz.form');

Route::get('/edit-courses', [CoursesController::class, 'edit'])->name('edit.bab.form');

Route::get('/edit-quiz', [quizController::class, 'edit'])->name('edit.quiz.form');

Route::get('/edit-profile', [profileController::class, 'edit'])->name('edit.profile.form');

Route::get('/tambah-lessons', [lessonsController::class, 'tambah'])->name('tambah.lessons.form');

// Route::middleware(['auth', 'admin'])->group(function () {
//     // courses
//     Route::post('/courses', [CoursesController::class, 'store']);
//     Route::put('/courses/{id}', [CoursesController::class, 'update']);
//     Route::delete('/courses/{id}', [CoursesController::class, 'destroy']);

//     // lesson
//     Route::post('/lessons', [lessonsController::class, 'store']);
//     Route::put('/lessons/{id}', [lessonsController::class, 'update']);
//     Route::delete('/lessons/{id}', [lessonsController::class, 'destroy']);

//     // quiz
//     Route::post('/quizzes', [quizController::class, 'store']);
//     Route::put('/quizzes/{id}', [quizController::class, 'update']);
//     Route::delete('/quizzes/{id}', [quizController::class, 'destroy']);
// });