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

    // public function edit($id)
    // {
    //     $quiz = Quiz::find($id);

    //     // if (!$quiz) {
    //     //     return redirect()->route('quizzes.index')->with('error', 'Quiz not found.');
    //     // }

    //     return view('layouts.quiz.editQuiz',compact('quiz'));
    // }

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
        // Validasi data yang diterima dari request
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,course_id',
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_answer' => 'required|string|size:1|in:a,b,c,d',
        ]);
    
        // Jika validasi gagal, kembalikan response dengan error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }
    
        try {
            // Temukan quiz berdasarkan ID atau tampilkan error jika tidak ditemukan
            $quiz = Quiz::findOrFail($id);
    
            // Update quiz dengan data yang valid
            $quiz->update($validator->validated());
    
            return response()->json([
                'success' => true,
                'message' => 'Quiz updated successfully',
                'data' => $quiz
            ], 200);
    
        } catch (\Exception $e) {
            // Tangani exception umum
            return response()->json([
                'success' => false,
                'message' => 'Failed to update quiz',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    


    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id); 

        return view('layouts.quiz.editQuiz', compact('quiz'));
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
    

}


