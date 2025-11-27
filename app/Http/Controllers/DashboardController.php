<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;
use App\Models\DropRequest;
use App\Models\StudentEnrollment;
use App\Models\Grade;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $student = $user ? $user->student : null;
        
        // Prevent caching of dashboard
        $response = response()->view('student.dashboard', [
            'student' => $student,
            'user' => $user,
        ]);
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');
        
        return $response;
    }

    public function enrollCourse()
    {
        $user = Auth::user();
        $student = $user ? $user->student : null;
        
        // Get enrolled subject codes, titles, and schedules for this student (excluding approved drop requests)
        $enrolledSubjectCodes = [];
        $enrolledSubjectTitles = [];
        $enrolledSchedules = []; // Store enrolled schedules for conflict detection
        $studentYearLevel = null;
        $studentProgram = null;
        
        if ($student) {
            $gradeLevel = $student->grade_level; // e.g., "3rd Year - BSIT"
            
            // Extract year level and program from grade_level
            if (strpos($gradeLevel, ' - ') !== false) {
                $parts = explode(' - ', $gradeLevel);
                $studentYearLevel = trim($parts[0]); // e.g., "3rd Year"
                $studentProgram = trim($parts[1]); // e.g., "BSIT"
            } else {
                $studentYearLevel = $gradeLevel;
            }
            
            $enrollments = StudentEnrollment::where('student_id', $student->id)->get();
            
            // Get approved drop request subject codes (these can be re-enrolled)
            $approvedDropCodes = DropRequest::where('student_id', $student->id)
                ->where('status', 'Approved')
                ->pluck('subject_code')
                ->toArray();
            
            // Only include enrollments that haven't been approved for dropping
            foreach ($enrollments as $enrollment) {
                if (!in_array($enrollment->subject_code, $approvedDropCodes)) {
                    $enrolledSubjectCodes[] = $enrollment->subject_code;
                    $enrolledSubjectTitles[] = $enrollment->subject_title;
                    // Store schedule for conflict detection (normalize empty/null to empty string)
                    if (!empty($enrollment->schedule)) {
                        $enrolledSchedules[] = trim($enrollment->schedule);
                    }
                }
            }
            
            // Get unique titles (in case same title has multiple codes enrolled)
            $enrolledSubjectTitles = array_unique($enrolledSubjectTitles);
            // Get unique schedules (remove duplicates)
            $enrolledSchedules = array_unique(array_filter($enrolledSchedules));
        }
        
        // Filter subjects by student's year level AND program
        $allSubjects = Subject::orderBy('code')->get();
        
        if ($studentYearLevel) {
            // Normalize year level for comparison (handle variations like "3rd Year", "3rd", "3", etc.)
            $normalizedStudentYear = $this->normalizeYearLevel($studentYearLevel);
            
            // Filter subjects to only show those matching the student's year level AND program
            $allSubjects = $allSubjects->filter(function ($subject) use ($normalizedStudentYear, $studentProgram) {
                // Check year level
                if (empty($subject->year_level)) {
                    return false; // Don't show subjects without year level
                }
                $normalizedSubjectYear = $this->normalizeYearLevel($subject->year_level);
                if ($normalizedSubjectYear !== $normalizedStudentYear) {
                    return false; // Year level doesn't match
                }
                
                // Check program (if student has a program)
                if ($studentProgram) {
                    if (empty($subject->program)) {
                        return false; // Don't show subjects without program if student has one
                    }
                    // Compare programs (case-insensitive)
                    if (strtoupper(trim($subject->program)) !== strtoupper(trim($studentProgram))) {
                        return false; // Program doesn't match
                    }
                }
                
                return true; // Both year level and program match
            });
        }
        
        // Group subjects by title (to show only unique titles in main table)
        $groupedSubjects = $allSubjects->groupBy('title');
        $uniqueSubjects = $groupedSubjects->map(function ($group) {
            // Return the first subject from each group for display
            return $group->first();
        })->values();
        
        // Convert allSubjects collection to array with proper structure for JSON
        $allSubjectsArray = $allSubjects->map(function ($subject) {
            return [
                'id' => $subject->id,
                'code' => $subject->code,
                'title' => $subject->title,
                'description' => $subject->description,
                'units' => $subject->units,
                'schedule' => $subject->schedule,
                'program' => $subject->program,
                'year_level' => $subject->year_level,
                'term' => $subject->term,
            ];
        })->values()->toArray();
        
        return view('student.enroll-course', [
            'student' => $student,
            'user' => $user,
            'subjects' => $uniqueSubjects,
            'allSubjects' => $allSubjectsArray, // Convert to array for JSON encoding
            'enrolledSubjectCodes' => $enrolledSubjectCodes, // Subject codes the student is already enrolled in
            'enrolledSubjectTitles' => $enrolledSubjectTitles, // Subject titles the student is already enrolled in
            'enrolledSchedules' => $enrolledSchedules, // Schedules the student is already enrolled in (for conflict detection)
        ]);
    }
    
    /**
     * Normalize year level string for comparison.
     * Handles variations like "1st Year", "1st", "1", "First Year", "1st Year - BSIT", etc.
     */
    private function normalizeYearLevel($yearLevel)
    {
        if (empty($yearLevel)) {
            return '';
        }
        
        $yearLevel = trim($yearLevel);
        
        // If format is "year_level - program", extract just the year level part
        if (strpos($yearLevel, ' - ') !== false) {
            $parts = explode(' - ', $yearLevel);
            $yearLevel = trim($parts[0]);
        }
        
        // Extract number from year level (e.g., "3rd Year" -> "3", "1st" -> "1")
        if (preg_match('/(\d+)/', $yearLevel, $matches)) {
            return $matches[1];
        }
        
        // Handle text variations
        $yearLevelLower = strtolower($yearLevel);
        if (strpos($yearLevelLower, 'first') !== false || strpos($yearLevelLower, '1st') !== false) {
            return '1';
        }
        if (strpos($yearLevelLower, 'second') !== false || strpos($yearLevelLower, '2nd') !== false) {
            return '2';
        }
        if (strpos($yearLevelLower, 'third') !== false || strpos($yearLevelLower, '3rd') !== false) {
            return '3';
        }
        if (strpos($yearLevelLower, 'fourth') !== false || strpos($yearLevelLower, '4th') !== false) {
            return '4';
        }
        
        return $yearLevel; // Return as-is if no pattern matches
    }

    /**
     * Enroll in a subject.
     */
    public function enrollSubject(Request $request)
    {
        try {
            $user = Auth::user();
            $student = $user ? $user->student : null;

            if (!$student) {
                return response()->json(['success' => false, 'error' => 'Student not found'], 404);
            }

            $validated = $request->validate([
                'subject_code' => 'required|string',
                'subject_title' => 'required|string',
                'units' => 'required|numeric',
                'schedule' => 'nullable|string',
            ]);

            // Check if already enrolled
            $existing = StudentEnrollment::where('student_id', $student->id)
                ->where('subject_code', $validated['subject_code'])
                ->first();

            if ($existing) {
                return response()->json([
                    'success' => false,
                    'error' => 'You are already enrolled in this subject.'
                ], 400);
            }

            // Check for schedule conflict (if schedule is provided and not empty)
            $schedule = $validated['schedule'] ?? null;
            if ($schedule && $schedule !== '' && $schedule !== '-' && trim($schedule) !== '') {
                $newSchedule = trim($schedule);
                
                // Get all current enrollments with schedules (excluding approved drop requests)
                $approvedDropCodes = DropRequest::where('student_id', $student->id)
                    ->where('status', 'Approved')
                    ->pluck('subject_code')
                    ->toArray();
                
                $conflictingEnrollment = StudentEnrollment::where('student_id', $student->id)
                    ->whereNotNull('schedule')
                    ->where('schedule', '!=', '')
                    ->where('schedule', '!=', '-')
                    ->whereNotIn('subject_code', $approvedDropCodes)
                    ->where('schedule', $newSchedule)
                    ->first();
                
                if ($conflictingEnrollment) {
                    return response()->json([
                        'success' => false,
                        'error' => 'Schedule conflict! You are already enrolled in another subject with the same schedule: ' . $newSchedule
                    ], 400);
                }
            }

            // Create enrollment
            // Convert empty string or "-" to null for schedule
            $schedule = $validated['schedule'] ?? null;
            if ($schedule === '' || $schedule === '-' || trim($schedule) === '') {
                $schedule = null;
            }
            
            $enrollment = StudentEnrollment::create([
                'student_id' => $student->id,
                'subject_code' => $validated['subject_code'],
                'subject_title' => $validated['subject_title'],
                'units' => $validated['units'],
                'schedule' => $schedule,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Subject enrolled successfully!',
                'enrollment' => $enrollment,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'error' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

    public function classSchedule()
    {
        $user = Auth::user();
        $student = $user ? $user->student : null;
        $allSubjects = Subject::orderBy('code')->get();
        
        // Get enrolled subjects from database (excluding those with approved drop requests)
        $enrolledSubjects = [];
        if ($student) {
            $enrollments = StudentEnrollment::where('student_id', $student->id)->get();
            
            // Get approved drop request subject codes
            $approvedDropCodes = DropRequest::where('student_id', $student->id)
                ->where('status', 'Approved')
                ->pluck('subject_code')
                ->toArray();
            
            // Filter out subjects with approved drop requests
            foreach ($enrollments as $enrollment) {
                if (!in_array($enrollment->subject_code, $approvedDropCodes)) {
                    $enrolledSubjects[] = [
                        'code' => $enrollment->subject_code,
                        'title' => $enrollment->subject_title,
                        'units' => $enrollment->units,
                        'schedule' => $enrollment->schedule,
                    ];
                }
            }
        }
        
        return view('student.class-schedule', [
            'student' => $student,
            'user' => $user,
            'allSubjects' => $allSubjects,
            'enrolledSubjects' => $enrolledSubjects, // Pass enrolled subjects from database
        ]);
    }

    public function assessment()
    {
        $user = Auth::user();
        $student = $user ? $user->student : null;
        
        return view('student.assessment', [
            'student' => $student,
            'user' => $user,
        ]);
    }

    public function grades()
    {
        $user = Auth::user();
        $student = $user ? $user->student : null;
        
        // Get all enrollments for this student with their grades
        $enrollmentsWithGrades = [];
        if ($student) {
            $enrollments = StudentEnrollment::where('student_id', $student->id)
                ->with('grades')
                ->get();
            
            // Get approved drop request subject codes (exclude dropped subjects)
            $approvedDropCodes = DropRequest::where('student_id', $student->id)
                ->where('status', 'Approved')
                ->pluck('subject_code')
                ->toArray();
            
            foreach ($enrollments as $enrollment) {
                // Skip subjects with approved drop requests
                if (!in_array($enrollment->subject_code, $approvedDropCodes)) {
                    // Get subject details including description
                    $subject = Subject::where('code', $enrollment->subject_code)->first();
                    
                    $enrollmentsWithGrades[] = [
                        'enrollment' => $enrollment,
                        'grades' => $enrollment->grades,
                        'subject' => $subject,
                    ];
                }
            }
        }
        
        return view('student.grades', [
            'student' => $student,
            'user' => $user,
            'enrollmentsWithGrades' => $enrollmentsWithGrades,
        ]);
    }

    /**
     * Submit a drop request.
     */
    public function submitDropRequest(Request $request)
    {
        try {
            $user = Auth::user();
            $student = $user ? $user->student : null;

            if (!$student) {
                return response()->json(['success' => false, 'error' => 'Student not found'], 404);
            }

            $validated = $request->validate([
                'subject_code' => 'required|string',
                'reason' => 'required|string|min:10',
            ]);

            // Check if enrollment exists
            $enrollment = StudentEnrollment::where('student_id', $student->id)
                ->where('subject_code', $validated['subject_code'])
                ->first();

            if (!$enrollment) {
                return response()->json([
                    'success' => false,
                    'error' => 'You are not enrolled in this subject.'
                ], 400);
            }

            // Check if there's already a pending drop request
            $existingRequest = DropRequest::where('student_id', $student->id)
                ->where('subject_code', $validated['subject_code'])
                ->where('status', 'Pending')
                ->first();

            if ($existingRequest) {
                return response()->json([
                    'success' => false,
                    'error' => 'You already have a pending drop request for this subject.'
                ], 400);
            }

            // Create drop request (DO NOT remove enrollment yet - wait for admin approval)
            $dropRequest = DropRequest::create([
                'student_id' => $student->id,
                'subject_code' => $validated['subject_code'],
                'reason' => $validated['reason'],
                'status' => 'Pending',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Drop request submitted successfully! The admin will review your request.',
                'drop_request' => $dropRequest,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'error' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }
}
