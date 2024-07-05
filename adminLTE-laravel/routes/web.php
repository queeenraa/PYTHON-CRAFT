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
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;

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

Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

Route::get('/', [dashboardController::class, 'index']);

Route::get('/profile', [profileController::class, 'index']);

Route::get('/courses', [CoursesController::class, 'index']);

Route::get('/lessons', [lessonsController::class, 'index']);

Route::get('/quiz', [quizController::class, 'index']);

Route::get('/payments', [PaymentController::class, 'index']);

Route::put('/quizzes/{id}', [quizController::class, 'update'])->name('quizzes.update');

// nampilin page quiz
Route::get('/tambahQuiz', function () {
    return view('layouts.quiz.tambahQuiz');
});
Route::post('/quizzes', [QuizController::class, 'store']);

Route::get('/editQuiz/{id}', function () {
    return view('layouts.quiz.editQuiz');
});
// ngeroute function quiz
Route::get('/quizzes/{id}', [quizController::class, 'update'])->name('quizzes.update'); 
Route::delete('/delete-quiz/{id}', [quizController::class, 'destroy'])->name('quizzes.destroy');
Route::get('/tambahQuiz', [QuizController::class, 'create']);

Route::get('/edit-quiz/{id}', [quizController::class, 'edit'])->name('quizzes.edit');
Route::post('/update-quiz/{id}', [quizController::class, 'update'])->name('quizzes.update');


// nampilin page lessons lesson
Route::get('/tambahLessons', function () {
    return view('layouts.lessons.tambahLessons');
});

Route::get('/tambahLessons', [LessonsController::class, 'create'])->name('lessons.create');

Route::post('/lessons', [lessonsController::class, 'store'])->name('lessons.store');

Route::get('/editLessons/{id}', function () {
    return view('layouts.lessons.editLessons');
});
// ngeroute function lessons
Route::get('/edit-lessons/{id}', [lessonsController::class, 'edit'])->name('lessons.edit');
Route::post('/update-lessons/{id}', [lessonsController::class, 'update'])->name('lessons.update');
Route::delete('/delete-lessons/{id}', [lessonsController::class, 'destroy'])->name('lessons.destroy');

// nampilin page courses
Route::get('/tambahCourses', function () {
    return view('layouts.courses.tambahCourses');
});
// Route untuk menyimpan course baru
Route::post('/courses', [CoursesController::class, 'store']);

Route::get('/editCourses/{id}', function () {
    return view('layouts.quiz.editLessons');
});
// ngeroute function courses
Route::get('/edit-courses/{id}', [CoursesController::class, 'edit'])->name('courses.edit');
Route::post('/update-courses/{id}', [CoursesController::class, 'update'])->name('courses.update');
Route::delete('/delete-user/{id}', [CoursesController::class, 'destroy'])->name('users.destroy');
Route::delete('/delete-courses/{id}', [CoursesController::class, 'destroy']);


// PAYMENT
Route::get('/payments', [TransactionController::class, 'index']);


// // PROFILE
// // Route::get('/edit-profile/{id}', [profileController::class, 'edit'])->name('profile.edit');
// Route::get('/edit-profile/{id}', [profileController::class, 'edit'])->name('edit-profile');

// // Route::get('/update-profile/{id}', [profileController::class, 'update'])->name('update.profile');
// Route::get('/update-profile/{id}', [profileController::class, 'update'])->name('update-profile');
// PROFILE
Route::get('/edit-profile/{id}', [profileController::class, 'edit'])->name('edit-profile');
Route::get('/profile/{id}', [profileController::class, 'index'])->name('profile');
Route::put('/update-profile/{id}', [profileController::class, 'update'])->name('update-profile');



Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth');

Route::get('/register', [registerController::class, 'index']);



// Route::get('/edit-lessons', [lessonsController::class, 'edit'])->name('edit.quiz.form');

// Route::get('/edit-courses', [CoursesController::class, 'edit'])->name('edit.bab.form');

// Route::get('/edit-quiz', [quizController::class, 'edit'])->name('edit.quiz.form');

// Route::get('/edit-profile', [profileController::class, 'edit'])->name('edit.profile.form');

// Route::get('/tambah-lessons', [lessonsController::class, 'tambah'])->name('tambah.lessons.form');

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