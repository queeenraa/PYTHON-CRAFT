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

    public function edit($user_id)
    {
        // return view('layouts.profile');

        // $profiles = User::all();  // Mengambil semua data courses dari model Course
        // $user = User::findOrFail($user_id);

        // return view('layouts.profile.editProfile', [
        //     'profiles' => $profiles, // Mengirimkan data courses ke view
        // ]);
            // Mengambil data pengguna berdasarkan ID
        $user = User::findOrFail($user_id);
        // $profiles = User::where('id', $id)->get();
        // $profiles = User::all();


        // Mengirim data pengguna ke view
        return view('layouts.profile.editProfile', compact('user'));
    }

    // public function edit($id)
    // {
    //     $user = User::findOrFail($id);

    //     return view('layouts.profile.editProfile', compact('user'));
    // }

    public function update(Request $request, $user_id)
    {

        $user = User::findOrFail($user_id);

    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'role' => 'required|string|max:255',
    ]);

    // Temukan pengguna berdasarkan ID dan perbarui data
    $user = User::findOrFail($user_id);
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->role = $request->input('role');
    $user->save();

    return redirect()->route('edit-profile')->with('success', 'Profile updated successfully');
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
