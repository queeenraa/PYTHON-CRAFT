<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

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
    
        $throttleKey = 'login-attempt:' . $request->ip();
        if (RateLimiter::tooManyAttempts($throttleKey, 3)) {
            throw ValidationException::withMessages([
                'email' => ['Terlalu banyak percobaan login. Silakan coba lagi dalam 1 menit.'],
            ]);
        }
    
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
    
            $user = Auth::user();
    
            if ($user->role === 'admin') {
                RateLimiter::clear($throttleKey);
                return redirect()->route('dashboard');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'message' => 'Hanya admin yang bisa mengakses halaman ini.',
                ])->onlyInput('email');
            }
        }
    
        RateLimiter::hit($throttleKey, 60);
    
        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak sesuai dengan catatan kami.',
        ])->onlyInput('email');
    }
    
    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        // dd('Logged out successfully'); 
    
        return redirect('/');
    }
    
}
