<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\TeacherController;

// Teacher Login Routes
Route::get('/teacher/login', [LoginController::class, 'showTeacherLogin'])->name('teacher.login');
Route::post('/teacher/login', [LoginController::class, 'teacherLogin']);

// Teacher Registration Routes
Route::get('/teacher/register', [RegistrationController::class, 'showTeacherRegister'])->name('teacher.register.show');
Route::post('/teacher/register', [RegistrationController::class, 'storeTeacher'])->name('teacher.register.store');

// Student Login Routes (Default/Home Page)
Route::get('/', [LoginController::class, 'showLogin'])->name('home');
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Student Registration Routes
Route::get('/register', [RegistrationController::class, 'show'])->name('register.show');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Password Reset Routes
Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');

// Student Routes (Protected - requires authentication and student role)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function (Request $request) {
        $user = Auth::user();
        
        // Check if user exists
        if (!$user) {
            Auth::logout();
            return redirect('/')->with('error', 'Please log in to access this page.');
        }
        
        // Ensure only students can access student dashboard
        if ($user->role !== 'student') {
            if ($user->role === 'teacher') {
                return redirect('/teacher/dashboard')->with('error', 'Teachers cannot access student portal.');
            } elseif ($user->role === 'admin') {
                return redirect('/admin/dashboard')->with('error', 'Admins cannot access student portal.');
            }
            // If role is null or invalid, logout and redirect to login
            Auth::logout();
            return redirect('/')->with('error', 'Invalid account role. Please contact administrator.');
        }
        
        return app(DashboardController::class)->index($request);
    })->name('dashboard');
    
    Route::get('/enroll-course', function (Request $request) {
        $user = Auth::user();
        
        if (!$user || $user->role !== 'student') {
            if ($user && $user->role === 'teacher') {
                return redirect('/teacher/dashboard');
            }
            Auth::logout();
            return redirect('/')->with('error', 'Access denied. Student account required.');
        }
        
        return app(DashboardController::class)->enrollCourse();
    })->name('enroll-course');
    
    Route::post('/enroll-subject', function (Request $request) {
        $user = Auth::user();
        
        if (!$user || $user->role !== 'student') {
            return redirect('/')->with('error', 'Access denied. Student account required.');
        }
        
        return app(DashboardController::class)->enrollSubject($request);
    })->name('enroll-subject');
    
    Route::get('/class-schedule', function (Request $request) {
        $user = Auth::user();
        
        if (!$user || $user->role !== 'student') {
            return redirect('/')->with('error', 'Access denied. Student account required.');
        }
        
        return app(DashboardController::class)->classSchedule();
    })->name('class-schedule');
    
    Route::get('/grades', function (Request $request) {
        $user = Auth::user();
        
        if (!$user || $user->role !== 'student') {
            return redirect('/')->with('error', 'Access denied. Student account required.');
        }
        
        return app(DashboardController::class)->grades();
    })->name('grades');
    
    Route::get('/assessment', function (Request $request) {
        $user = Auth::user();
        
        if (!$user || $user->role !== 'student') {
            return redirect('/')->with('error', 'Access denied. Student account required.');
        }
        
        return app(DashboardController::class)->assessment();
    })->name('assessment');
    
    Route::post('/drop-request', function (Request $request) {
        $user = Auth::user();
        
        if (!$user || $user->role !== 'student') {
            return redirect('/')->with('error', 'Access denied. Student account required.');
        }
        
        return app(DashboardController::class)->submitDropRequest($request);
    })->name('drop-request.submit');
    
    Route::get('/announcements', function (Request $request) {
        $user = Auth::user();
        
        if (!$user || $user->role !== 'student') {
            return redirect('/')->with('error', 'Access denied. Student account required.');
        }
        
        return app(DashboardController::class)->announcements();
    })->name('student.announcements');
});


Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);


Route::get('/admin/teachers', [AdminController::class, 'teachers'])->name('admin.teachers');
Route::post('/admin/subjects/{id}/assign-teacher', [AdminController::class, 'assignTeacherToSubject'])->name('admin.subjects.assign-teacher');


Route::get('/admin/add-subject', [AdminController::class, 'addSubject'])->name('admin.add-subject');
Route::post('/admin/subjects', [AdminController::class, 'storeSubject'])->name('admin.subjects.store');
Route::get('/admin/subjects/{id}/edit', [AdminController::class, 'editSubject'])->name('admin.subjects.edit');
Route::put('/admin/subjects/{id}', [AdminController::class, 'updateSubject'])->name('admin.subjects.update');
Route::delete('/admin/subjects/{id}', [AdminController::class, 'deleteSubject'])->name('admin.subjects.delete');
Route::get('/admin/subjects/{id}/students', [AdminController::class, 'viewSubjectStudents'])->name('admin.subjects.view-students');


Route::get('/admin/student-management', [AdminController::class, 'studentManagement'])->name('admin.student-management');
Route::delete('/admin/students/{id}', [AdminController::class, 'deleteStudent'])->name('admin.students.delete');


Route::get('/admin/drop-request-list', [AdminController::class, 'dropRequestList'])->name('admin.drop-request-list');
Route::post('/admin/drop-request/{id}/approve', [AdminController::class, 'approveDropRequest'])->name('admin.drop-request.approve');
Route::post('/admin/drop-request/{id}/reject', [AdminController::class, 'rejectDropRequest'])->name('admin.drop-request.reject');


Route::get('/admin/grades', [AdminController::class, 'grades'])->name('admin.grades');
Route::get('/admin/grades/{studentId}', [AdminController::class, 'viewStudentGrades'])->name('admin.view-student-grades');


Route::get('/admin/announcements', [AdminController::class, 'announcements'])->name('admin.announcements');
Route::post('/admin/announcements', [AdminController::class, 'storeAnnouncement'])->name('admin.announcements.store');
Route::put('/admin/announcements/{id}', [AdminController::class, 'updateAnnouncement'])->name('admin.announcements.update');
Route::delete('/admin/announcements/{id}', [AdminController::class, 'deleteAnnouncement'])->name('admin.announcements.delete');


// Teacher Routes (Protected - requires authentication and teacher role)
Route::middleware('auth')->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');

    Route::get('/teacher/class-list', [TeacherController::class, 'classList'])->name('teacher.class-list');
    Route::get('/teacher/class-list/{subjectId}', [TeacherController::class, 'viewClassDetails'])->name('teacher.class-details');
    Route::post('/teacher/class-list/{subjectId}/grade', [TeacherController::class, 'storeGrade'])->name('teacher.store-grade');
    Route::delete('/teacher/class-list/{subjectId}/grade/{gradeId}', [TeacherController::class, 'deleteGrade'])->name('teacher.delete-grade');

    Route::get('/teacher/profile', function () {
        $user = Auth::user();
        if ($user->role !== 'teacher') {
            return redirect('/')->with('error', 'Access denied.');
        }
        return view('teacher.teacher-profile');
    });
    
    Route::get('/teacher/announcements', [TeacherController::class, 'announcements'])->name('teacher.announcements');
});

