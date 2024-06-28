<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Facades\Validator;

class quizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        
        return view('layouts.quiz.quiz', [
            'quizzes' =>$quizzes, // Kirimkan data lessons ke view
        ]);
    }

    public function edit()
    {
        $quizzes = Quiz::all();
        
        return view('layouts.quiz.editQuiz', [
            'quizzes' =>$quizzes, // Kirimkan data lessons ke view
        ]);
    }

    // Menampilkan detail quiz berdasarkan quiz_id
    public function show($id)
    {
        $quiz = Quiz::find($id);

        if (!$quiz) {
            return response()->json([
                'success' => false,
                'message' => 'Quiz not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Quiz details',
            'data' => $quiz
        ], 200);
    }

    // Menyimpan quiz baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,course_id',
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_answer' => 'required|string|size:1|in:a,b,c,d',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $quiz = Quiz::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Quiz created successfully',
            'data' => $quiz
        ], 201);
    }

    // Mengupdate quiz
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,course_id',
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_answer' => 'required|string|size:1|in:a,b,c,d',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $quiz = Quiz::find($id);

        if (!$quiz) {
            return response()->json([
                'success' => false,
                'message' => 'Quiz not found'
            ], 404);
        }

        $quiz->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Quiz updated successfully',
            'data' => $quiz
        ], 200);

        //return view('layouts.quiz.editQuiz', ['id' => $id, 'quiz' => $quiz]);

    }

    // Menghapus quiz
    public function destroy($id)
    {
        $quiz = Quiz::find($id);

        if (!$quiz) {
            return response()->json([
                'success' => false,
                'message' => 'Quiz not found'
            ], 404);
        }

        $quiz->delete();

        return response()->json([
            'success' => true,
            'message' => 'Quiz deleted successfully'
        ], 200);
    }

    public function editQuiz($id)
    {
        $quiz = Quiz::find($id);
    
        if (!$quiz) {
            return response()->json([
                'success' => false,
                'message' => 'Quiz not found'
            ], 404);
        }
    
        return view('layouts.quiz.editQuiz', ['quiz' => $quiz]);
    }
}


