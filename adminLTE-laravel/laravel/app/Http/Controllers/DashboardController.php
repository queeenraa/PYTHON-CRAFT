<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('layouts.dashboard');
    }

    public function __construct()
    {
        $this->middleware('role-admin');
    }

    public function showDashboard() {
        $courses = Course::all();
        $lessons = Lesson::all();
        $quizzes = Quiz::all();

        $totalCourses = Course::count();
        $totalLessons = Lesson::count();
        $totalQuizzes = Quiz::count();
        $totalUsers = User::count();
    
        return view('layouts.dashboard', compact('courses', 'lessons', 'quizzes', 'totalCourses', 'totalLessons', 'totalQuizzes', 'totalUsers'));
    }
    

}
