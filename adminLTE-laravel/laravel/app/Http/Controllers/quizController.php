<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class quizController extends Controller
{
    public function __construct()
    {
        $this->middleware('role-admin');
    }

    public function create()
    {
        $courses = Course::all();
        return view('layouts.quiz.tambahQuiz', compact('courses'));
    }
    
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $quiz = Quiz::create($validator->validated());

        
        $validatedData = $validator->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('D:/PYTHON CRAFT/adminLTE-laravel/public/storage/images', $fileName);
            $validatedData['image'] = 'storage/images/' . $fileName;
        }
        
        
        

        return response()->json([
            'success' => true,
            'message' => 'Quiz created successfully',
            'data' => $quiz
        ], 201);
    }

    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        $courses = Course::all(); // Retrieve all courses
        
        return view('layouts.quiz.editQuiz', compact('quiz', 'courses'));
    }


    // Mengupdate quiz
    public function update(Request $request, $id)
    {
        try {
            // Validasi data yang diterima dari request
            $validator = Validator::make($request->all(), [
                'course_id' => 'required|exists:courses,course_id',
                'question' => 'required',
                'option_a' => 'required',
                'option_b' => 'required',
                'option_c' => 'required',
                'option_d' => 'required',
                'correct_answer' => 'required|string|size:1|in:a,b,c,d',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors()
                ], 422);
            }
    
            // Temukan quiz berdasarkan ID
            $quiz = Quiz::findOrFail($id);
    
            // Pastikan hanya data yang valid yang diupdate
            $data = $validator->validated();
    
            // Upload gambar jika ada
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('quiz_images', 'public');
    
                // Hapus gambar lama jika ada
                if ($quiz->image && Storage::exists('public/' . $quiz->image)) {
                    Storage::delete('public/' . $quiz->image);
                }
    
                $data['image'] = $imagePath;
            }
    
            // Update quiz dengan data yang valid
            $quiz->update($data);
    
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


