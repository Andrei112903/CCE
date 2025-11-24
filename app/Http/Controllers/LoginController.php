<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin(){
        // If already logged in, redirect to dashboard
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('student.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $email = $request->email;
        $password = $request->password;

        // Try to find user by email first
        $user = User::where('email', $email)->first();
        
        // If not found by email, try to find by student_id
        if (!$user) {
            $student = Student::where('student_id', $email)->first();
            if ($student) {
                $user = $student->user;
            }
        }

        if ($user && Hash::check($password, $user->password)) {
            // Check if user is a student
            if ($user->role === 'student') {
                Auth::login($user);
                $request->session()->regenerate();
                
                return redirect()->intended('/dashboard')
                    ->with('success', 'Welcome back, ' . $user->name . '!');
            } else {
                return back()->withErrors([
                    'email' => 'This account is not a student account.',
                ])->withInput();
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
}
