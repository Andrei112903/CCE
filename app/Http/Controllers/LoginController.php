<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin(Request $request){
        // If already logged in, redirect based on role
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'student') {
                return redirect('/dashboard');
            } elseif ($user->role === 'teacher') {
                return redirect('/teacher/dashboard');
            } elseif ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            }
            return redirect('/dashboard');
        }
        
        // Prevent caching of login page
        $response = response()->view('student.login');
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');
        
        return $response;
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
                
                // Redirect and replace login page in history
                return redirect('/dashboard')
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

    public function showTeacherLogin(Request $request){
        // If already logged in, redirect based on role
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'teacher') {
                return redirect('/teacher/dashboard');
            } elseif ($user->role === 'student') {
                return redirect('/dashboard');
            } elseif ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            }
        }
        
        // Prevent caching of login page
        $response = response()->view('teacher.teacher-login');
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');
        
        return $response;
    }

    public function teacherLogin(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $email = $request->email;
        $password = $request->password;

        // Try to find user by email first
        $user = User::where('email', $email)->first();
        
        // If not found by email, try to find by teacher email
        if (!$user) {
            $teacher = Teacher::where('email', $email)->first();
            if ($teacher) {
                $user = $teacher->user;
            }
        }

        if ($user && Hash::check($password, $user->password)) {
            // Check if user is a teacher
            if ($user->role === 'teacher') {
                Auth::login($user);
                $request->session()->regenerate();
                
                // Double-check role after login to ensure it's still teacher
                $loggedInUser = Auth::user();
                if ($loggedInUser->role !== 'teacher') {
                    Auth::logout();
                    return back()->withErrors([
                        'email' => 'Account role mismatch. Please contact administrator.',
                    ])->withInput();
                }
                
                // Explicitly redirect to teacher dashboard URL
                return redirect('/teacher/dashboard')
                    ->with('success', 'Welcome back, ' . $user->name . '!');
            } else {
                // If user exists but is not a teacher, show specific error
                $roleMessage = $user->role ? "This account is a {$user->role} account, not a teacher account." : "This account does not have a valid role.";
                return back()->withErrors([
                    'email' => $roleMessage . ' Please use the correct login portal.',
                ])->withInput();
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $role = $user ? $user->role : null;
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect based on role
        if ($role === 'teacher') {
            return redirect('/teacher/login')->with('success', 'You have been logged out successfully.');
        }
        
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
}
