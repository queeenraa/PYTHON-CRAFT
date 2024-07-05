<?php

namespace App\Http\Controllers;

use App\Models\User;
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

            // Ambil user yang sedang login
            $user = Auth::user();

            // Cek role user setelah berhasil login
            if ($user->role === 'admin') {
                dd('Redirecting to dashboard');
                return redirect()->route('dashboard'); // Jika admin, arahkan ke dashboard
            } else {
                // Jika bukan admin, beri pesan error
                Auth::logout(); // Logout user untuk keamanan
                return back()->withErrors([
                    'message' => 'Hanya admin yang bisa mengakses halaman ini.',
                ])->onlyInput('email');
            }
        }

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak sesuai dengan catatan kami.',
        ])->onlyInput('email');
    }
}
