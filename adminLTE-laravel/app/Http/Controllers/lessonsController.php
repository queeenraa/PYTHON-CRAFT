<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Lesson;

class LessonsController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all(); // Ambil semua data lessons dari database

        return view('layouts.lessons.lessons', [
            'lessons' => $lessons, // Kirimkan data lessons ke view
        ]);
    }

    public function edit()
    {
        $lessons = Lesson::all(); // Ambil semua data lessons dari database

        return view('layouts.lessons.editLessons', [
            'lessons' => $lessons, // Kirimkan data lessons ke view
        ]);
    }

    public function tambah()
    {
        $lessons = Lesson::all(); // Ambil semua data lessons dari database

        return view('layouts.lessons.tambahLessons', [
            'lessons' => $lessons, // Kirimkan data lessons ke view
        ]);
    }

    // Menampilkan detail sebuah lesson berdasarkan lesson_id
    public function show($id)
    {
        $lesson = Lesson::find($id);

        if (!$lesson) {
            return response()->json([
                'success' => false,
                'message' => 'Lesson not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Lesson details',
            'data' => $lesson
        ], 200);
    }

    // Menyimpan lesson baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,course_id',
            'lesson_name' => 'required',
            'content' => 'required',
            'created_by' => 'required|exists:users,user_id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $lesson = Lesson::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Lesson created successfully',
            'data' => $lesson
        ], 201);
    }

    // Mengupdate lesson
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,course_id',
            'lesson_name' => 'required',
            'content' => 'required',
            'created_by' => 'required|exists:users,user_id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Use the correct primary key
        try {
            $lesson = Lesson::findOrFail($id); // This uses 'lesson_id' as primary key if specified in the model

            $lesson->update($validator->validated());

            return response()->json([
                'success' => true,
                'message' => 'Lesson updated successfully',
                'data' => $lesson
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lesson not found'
            ], 404);
        } catch (\Exception $e) {
            // Log unexpected errors
            error_log("Unexpected error during update: " . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Unexpected error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Menghapus lesson
    public function destroy($id)
    {
        try {
            $lesson = Lesson::findOrFail($id); // This uses 'lesson_id' as primary key if specified in the model

            $lesson->delete();

            return response()->json([
                'success' => true,
                'message' => 'Lesson deleted successfully'
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lesson not found'
            ], 404);
        } catch (\Exception $e) {
            // Log unexpected errors
            error_log("Unexpected error during delete: " . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Unexpected error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
