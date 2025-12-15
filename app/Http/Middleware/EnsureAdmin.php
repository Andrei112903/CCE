<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'admin') {
            if ($user && $user->role === 'student') {
                return redirect('/dashboard')->with('error', 'Students cannot access admin area.');
            } elseif ($user && $user->role === 'teacher') {
                return redirect('/teacher/dashboard')->with('error', 'Teachers cannot access admin area.');
            }
            Auth::logout();
            return redirect('/admin/login')->with('error', 'Access denied. Admin account required.');
        }

        return $next($request);
    }
}
