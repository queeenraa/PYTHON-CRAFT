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

        return view('layouts.profile', [
            'profiles' => $profiles, // Mengirimkan data courses ke view
        ]);
    }
}
