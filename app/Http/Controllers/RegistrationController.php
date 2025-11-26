<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    /**
     * Show the registration form.
     */
    public function show()
    {
        return view('student.register');
    }

    /**
     * Handle student registration.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|unique:students,email',
            'password' => 'required|string|min:8|confirmed',
            'contact' => 'required|string|max:20',
            'birthday' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip_code' => 'nullable|string|max:10',
            'program' => 'required|string|max:255',
            'year_level' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
            'parent_contact' => 'required|string|max:20',
        ]);

        try {
            DB::beginTransaction();

            // Generate unique student ID
            $studentId = $this->generateStudentId();

            // Create user account
            $user = User::create([
                'name' => $validated['first_name'] . ' ' . $validated['last_name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'student',
            ]);

            // Create student record
            $student = Student::create([
                'user_id' => $user->id,
                'student_id' => $studentId,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'gender' => $validated['gender'],
                'birthday' => $validated['birthday'],
                'contact' => $validated['contact'],
                'email' => $validated['email'],
                'address' => $validated['street'] . ', ' . $validated['city'] . ($validated['zip_code'] ? ', ' . $validated['zip_code'] : ''),
                'grade_level' => $validated['year_level'] . ' - ' . $validated['program'],
                'parent_name' => $validated['parent_name'],
                'parent_contact' => $validated['parent_contact'],
                'status' => 'Enrolled',
            ]);

            DB::commit();

            // Redirect to login with success message
            return redirect()->route('login')->with('success', 'Registration successful! Your Student ID is: ' . $studentId . '. Please login with your email and password.');

        } catch (\Exception $e) {
            DB::rollBack();
            
            return back()->withInput()->withErrors([
                'error' => 'Registration failed. Please try again. Error: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Generate a unique numeric student ID (maximum 6 digits).
     * Format: YY#### (last 2 digits of year + 4 digit sequence)
     * Example: 250001, 250002, 250003 (for year 2025)
     */
    private function generateStudentId(): int
    {
        $year = (int) date('Y');
        $yearShort = $year % 100; // Last 2 digits of year (e.g., 25 for 2025)
        
        // Calculate the range for this year (e.g., 250000 to 259999)
        $yearStart = $yearShort * 10000;
        $yearEnd = ($yearShort + 1) * 10000;
        
        // Get the highest student ID for this year
        $lastStudent = Student::where('student_id', '>=', $yearStart)
            ->where('student_id', '<', $yearEnd)
            ->orderBy('student_id', 'desc')
            ->first();
        
        if ($lastStudent) {
            // Increment from last student ID
            $studentId = $lastStudent->student_id + 1;
            
            // Ensure we don't exceed 6 digits (max: 999999)
            if ($studentId > 999999) {
                throw new \Exception('Maximum student ID limit reached for this year.');
            }
        } else {
            // First student of the year: YY0001 (e.g., 250001)
            $studentId = $yearStart + 1;
        }
        
        // Ensure it's unique (in case of race conditions)
        while (Student::where('student_id', $studentId)->exists()) {
            $studentId++;
            // Safety check to prevent infinite loop
            if ($studentId > 999999) {
                throw new \Exception('Maximum student ID limit reached.');
            }
        }
        
        return $studentId;
    }

    /**
     * Show the teacher registration form.
     */
    public function showTeacherRegister()
    {
        return view('teacher.teacher-register');
    }

    /**
     * Handle teacher registration.
     */
    public function storeTeacher(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|unique:teachers,email',
            'password' => 'required|string|min:8|confirmed',
            'mobile_number' => 'required|string|max:20',
            'gender' => 'required|in:Male,Female',
            'street' => 'nullable|string|max:255',
            'barangay' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            // Create user account
            $user = User::create([
                'name' => $validated['first_name'] . ' ' . $validated['last_name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'teacher',
            ]);

            // Create teacher record
            $teacher = Teacher::create([
                'user_id' => $user->id,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'gender' => $validated['gender'],
                'mobile_number' => $validated['mobile_number'],
                'street' => $validated['street'] ?? null,
                'barangay' => $validated['barangay'] ?? null,
                'city' => $validated['city'] ?? null,
                'province' => $validated['province'] ?? null,
            ]);

            DB::commit();

            // Redirect to teacher login with success message
            return redirect()->route('teacher.login')->with('success', 'Registration successful! Please login with your email and password.');

        } catch (\Exception $e) {
            DB::rollBack();
            
            return back()->withInput()->withErrors([
                'error' => 'Registration failed. Please try again. Error: ' . $e->getMessage()
            ]);
        }
    }
}
