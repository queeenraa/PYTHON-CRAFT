<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard'); // Redirect to dashboard after successful login
        }

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak sesuai dengan catatan kami.',
        ])->onlyInput('email');
    }
}

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class loginController extends Controller
// {
//     public function index()
//     {
//         return view('login');
//     }
//     public function authenticate(Request $request)
//     {
//         $request->validate([
//             'email' => 'required|email:dns',
//             'password' => 'required'
//         ]);

//         dd('berhasil login!');
//     }
// }
