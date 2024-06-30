<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class profileController extends Controller
{
    public function index()
    {
        // return view('layouts.profile');

        $profiles = User::all(); // Mengambil semua data courses dari model Course

        return view('layouts.profile.profile', [
            'profiles' => $profiles, // Mengirimkan data courses ke view
        ]);
        
    }

    public function edit()
    {
        // return view('layouts.profile');

        $profiles = User::all(); // Mengambil semua data courses dari model Course

        return view('layouts.profile.editProfile', [
            'profiles' => $profiles, // Mengirimkan data courses ke view
        ]);
    }
    
    public function destroy($id)
    {
        // Find the user by ID and delete
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'User deleted successfully']);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

}
