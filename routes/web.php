<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;

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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/enroll-course', [DashboardController::class, 'enrollCourse'])->name('enroll-course');
    Route::post('/enroll-subject', [DashboardController::class, 'enrollSubject'])->name('enroll-subject');
    Route::get('/class-schedule', [DashboardController::class, 'classSchedule'])->name('class-schedule');
    Route::get('/grades', [DashboardController::class, 'grades'])->name('grades');
    Route::get('/assessment', [DashboardController::class, 'assessment'])->name('assessment');
    Route::post('/drop-request', [DashboardController::class, 'submitDropRequest'])->name('drop-request.submit');
});


Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);


Route::get('/admin/teachers', function () {
    return view('admin.admin-teachers');
});


Route::get('/admin/add-subject', [AdminController::class, 'addSubject'])->name('admin.add-subject');
Route::post('/admin/subjects', [AdminController::class, 'storeSubject'])->name('admin.subjects.store');
Route::get('/admin/subjects/{id}/edit', [AdminController::class, 'editSubject'])->name('admin.subjects.edit');
Route::put('/admin/subjects/{id}', [AdminController::class, 'updateSubject'])->name('admin.subjects.update');
Route::delete('/admin/subjects/{id}', [AdminController::class, 'deleteSubject'])->name('admin.subjects.delete');


Route::get('/admin/student-management', [AdminController::class, 'studentManagement'])->name('admin.student-management');


Route::get('/admin/drop-request-list', [AdminController::class, 'dropRequestList'])->name('admin.drop-request-list');
Route::post('/admin/drop-request/{id}/approve', [AdminController::class, 'approveDropRequest'])->name('admin.drop-request.approve');
Route::post('/admin/drop-request/{id}/reject', [AdminController::class, 'rejectDropRequest'])->name('admin.drop-request.reject');


Route::get('/admin/grades', function () {
    return view('admin.admin-grades');
});


Route::get('/teacher/dashboard', function () {
    return view('teacher.teacher-dashboard');
});


Route::get('/teacher/class-list', function () {
    return view('teacher.teacher-class-list');
});


Route::get('/teacher/profile', function () {
    return view('teacher.teacher-profile');
});