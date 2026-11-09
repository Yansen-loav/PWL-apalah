<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function LoginView()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('students.index');
        }

        return back()->withErrors([
            'email' => "Email or password doesn't match",
        ]);
    
    
        
    }

    public function RegisterView()
    {
        return view('auth.register');
    }

    public function RegisterPost(Request $request)
    {
        $validatedRequest = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $validatedRequest['name'],
            'email' => $validatedRequest['email'],
            'password' => bcrypt($validatedRequest['password']),
            'role' => 'student',
        ]);

        return redirect()->route('login-view');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login-view');
    }
}