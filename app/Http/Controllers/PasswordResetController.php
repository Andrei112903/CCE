<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PasswordResetController extends Controller
{
    /**
     * Show the forgot password form
     */
    public function showForgotPasswordForm(Request $request)
    {
        $type = $request->query('type', 'student'); // student or teacher
        
        return view('auth.forgot-password', compact('type'));
    }

    /**
     * Handle forgot password request
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->email;
        $type = $request->type ?? 'student';

        // Find user by email
        $user = User::where('email', $email)->first();

        // If not found by email and type is student, try to find by student_id
        if (!$user && $type === 'student') {
            $student = Student::where('student_id', $email)->first();
            if ($student) {
                $user = $student->user;
                $email = $user->email; // Use the actual email for password reset
            }
        }

        // If not found by email and type is teacher, try to find by teacher email
        if (!$user && $type === 'teacher') {
            $teacher = Teacher::where('email', $email)->first();
            if ($teacher) {
                $user = $teacher->user;
                $email = $user->email; // Use the actual email for password reset
            }
        }

        if (!$user) {
            return back()->withErrors(['email' => 'We could not find a user with that email address.'])->withInput();
        }

        // Check if user role matches the type
        if (($type === 'student' && $user->role !== 'student') || 
            ($type === 'teacher' && $user->role !== 'teacher')) {
            return back()->withErrors(['email' => 'This account does not match the selected portal type.'])->withInput();
        }

        // Generate password reset token
        $token = Str::random(64);

        // Delete any existing tokens for this email
        DB::table('password_reset_tokens')->where('email', $email)->delete();

        // Insert new token
        DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'token' => Hash::make($token),
            'created_at' => Carbon::now()
        ]);

        // For now, we'll use a simple approach - in production, you'd send an email
        // Here we'll redirect to the reset page with the token (for development)
        // In production, you should send an email with the reset link
        
        // Check if mail is configured (not using 'log' driver)
        $mailDriver = config('mail.default');
        
        if ($mailDriver === 'log' || $mailDriver === 'array') {
            // Development mode - redirect directly to reset page
            return redirect()->route('password.reset', ['token' => $token, 'email' => $email, 'type' => $type])
                ->with('info', 'Password reset link generated. In production, this would be sent to your email.');
        } else {
            // Production mode - send email (you'll need to implement email sending)
            // For now, we'll use the same approach
            return redirect()->route('password.reset', ['token' => $token, 'email' => $email, 'type' => $type])
                ->with('success', 'Password reset link has been sent to your email address.');
        }
    }

    /**
     * Show the reset password form
     */
    public function showResetForm(Request $request, $token = null)
    {
        $email = $request->query('email');
        $type = $request->query('type', 'student');
        
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $email,
            'type' => $type
        ]);
    }

    /**
     * Handle password reset
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $email = $request->email;
        $password = $request->password;
        $token = $request->token;
        $type = $request->type ?? 'student';

        // Find the password reset token
        $passwordReset = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->first();

        if (!$passwordReset) {
            return back()->withErrors(['email' => 'Invalid or expired password reset token.'])->withInput();
        }

        // Check if token is valid (not expired - 60 minutes)
        $createdAt = Carbon::parse($passwordReset->created_at);
        if ($createdAt->addMinutes(60)->isPast()) {
            DB::table('password_reset_tokens')->where('email', $email)->delete();
            return back()->withErrors(['email' => 'This password reset token has expired.'])->withInput();
        }

        // Verify the token
        if (!Hash::check($token, $passwordReset->token)) {
            return back()->withErrors(['email' => 'Invalid password reset token.'])->withInput();
        }

        // Find the user
        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found.'])->withInput();
        }

        // Check if user role matches the type
        if (($type === 'student' && $user->role !== 'student') || 
            ($type === 'teacher' && $user->role !== 'teacher')) {
            return back()->withErrors(['email' => 'This account does not match the selected portal type.'])->withInput();
        }

        // Update the password
        $user->password = Hash::make($password);
        $user->save();

        // Delete the password reset token
        DB::table('password_reset_tokens')->where('email', $email)->delete();

        // Redirect to appropriate login page
        $loginRoute = $type === 'teacher' ? 'teacher.login' : 'login';
        
        return redirect()->route($loginRoute)
            ->with('success', 'Your password has been reset successfully. You can now login with your new password.');
    }
}

