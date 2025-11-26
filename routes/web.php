<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;

Route::get('/', [RegistrationController::class, 'show'])->name('register.show');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected student routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/enroll-course', [DashboardController::class, 'enrollCourse'])->name('enroll-course');
    Route::post('/enroll-subject', [DashboardController::class, 'enrollSubject'])->name('enroll-subject');
    Route::get('/class-schedule', [DashboardController::class, 'classSchedule'])->name('class-schedule');
    Route::get('/grades', [DashboardController::class, 'grades'])->name('grades');
    Route::get('/assessment', [DashboardController::class, 'assessment'])->name('assessment');
    Route::post('/drop-request', [DashboardController::class, 'submitDropRequest'])->name('drop-request.submit');
});

// Admin dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
   
// Admin teachers page
Route::get('/admin/teachers', function () {
    return view('admin.admin-teachers');
});

// Admin add subject page
Route::get('/admin/add-subject', [AdminController::class, 'addSubject'])->name('admin.add-subject');
Route::post('/admin/subjects', [AdminController::class, 'storeSubject'])->name('admin.subjects.store');
Route::get('/admin/subjects/{id}/edit', [AdminController::class, 'editSubject'])->name('admin.subjects.edit');
Route::put('/admin/subjects/{id}', [AdminController::class, 'updateSubject'])->name('admin.subjects.update');
Route::delete('/admin/subjects/{id}', [AdminController::class, 'deleteSubject'])->name('admin.subjects.delete');

// Admin student management page
Route::get('/admin/student-management', [AdminController::class, 'studentManagement'])->name('admin.student-management');

// Admin drop request list page
Route::get('/admin/drop-request-list', [AdminController::class, 'dropRequestList'])->name('admin.drop-request-list');
Route::post('/admin/drop-request/{id}/approve', [AdminController::class, 'approveDropRequest'])->name('admin.drop-request.approve');
Route::post('/admin/drop-request/{id}/reject', [AdminController::class, 'rejectDropRequest'])->name('admin.drop-request.reject');

// Admin grades page
Route::get('/admin/grades', function () {
    return view('admin.admin-grades');
});

// Teacher dashboard page
Route::get('/teacher/dashboard', function () {
    return view('teacher.teacher-dashboard');
});

// Teacher class list page
Route::get('/teacher/class-list', function () {
    return view('teacher.teacher-class-list');
});

// Teacher profile settings page
Route::get('/teacher/profile', function () {
    return view('teacher.teacher-profile');
});