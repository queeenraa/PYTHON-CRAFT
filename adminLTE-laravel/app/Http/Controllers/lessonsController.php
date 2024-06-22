<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Lesson;

class lessonsController extends Controller
{
    public function index()
    {
        return view('layouts.lessons');
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

        $lesson = Lesson::find($id);

        if (!$lesson) {
            return response()->json([
                'success' => false,
                'message' => 'Lesson not found'
            ], 404);
        }

        $lesson->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Lesson updated successfully',
            'data' => $lesson
        ], 200);
    }

    // Menghapus lesson
    public function destroy($id)
    {
        $lesson = Lesson::find($id);

        if (!$lesson) {
            return response()->json([
                'success' => false,
                'message' => 'Lesson not found'
            ], 404);
        }

        $lesson->delete();

        return response()->json([
            'success' => true,
            'message' => 'Lesson deleted successfully'
        ], 200);
    }
}