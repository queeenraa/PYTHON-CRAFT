<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('role-admin');
    }

    public function index()
    {
        $courses = Course::all(); // Mengambil semua data courses dari model Course

        return view('layouts.courses.courses', [
            'courses' => $courses, // Mengirimkan data courses ke view
        ]);

    }

    public function edit($id)
    {
        $course = Course::findOrFail($id); 

        return view('layouts.courses.editCourses', compact('course'));
    }

    // Menampilkan detail course berdasarkan course_id
    public function show($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Course details',
            'data' => $course
        ], 200);
    }

    // Menyimpan course baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_name' => 'required',
            'description' => 'nullable',
            'created_by' => 'required|exists:users,user_id', // Pastikan user_id yang ada di tabel users
        ], [
            'created_by.exists' => 'Invalid user ID.', // Pesan kustom untuk validasi exists
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }
    
        // Sanitasi input sebelum disimpan
        $validatedData = $validator->validated();
    
        try {
            $course = Course::create($validatedData);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create course',
                'error' => $e->getMessage()
            ], 500);
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Course created successfully',
            'data' => $course
        ], 201);
    }

    // Mengupdate course
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'course_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'created_by' => 'required|exists:users,user_id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $course = Course::find($id);

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found'
            ], 404);
        }

        $course->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Course updated successfully',
            'data' => $course
        ], 200);
    }

    // Menghapus course
    public function destroy($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found'
            ], 404);
        }

        $course->delete();

        return response()->json([
            'success' => true,
            'message' => 'Course deleted successfully'
        ], 200);
    }
}
