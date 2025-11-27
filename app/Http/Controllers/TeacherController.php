<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;
use App\Models\StudentEnrollment;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Announcement;

class TeacherController extends Controller
{
    /**
     * Display the teacher dashboard with statistics.
     */
    public function dashboard()
    {
        $user = Auth::user();
        
        if (!$user || $user->role !== 'teacher') {
            return redirect('/')->with('error', 'Access denied.');
        }

        $teacher = $user->teacher;
        
        if (!$teacher) {
            return redirect('/teacher/dashboard')->with('error', 'Teacher profile not found.');
        }

        // Get all subjects assigned to this teacher
        $subjects = Subject::where('teacher_id', $teacher->id)->get();
        
        // Count total classes (subjects)
        $totalClasses = $subjects->count();
        
        // Get all subject codes for this teacher
        $subjectCodes = $subjects->pluck('code')->toArray();
        
        // Count total distinct students enrolled in any of these subjects
        $totalStudents = StudentEnrollment::whereIn('subject_code', $subjectCodes)
            ->distinct('student_id')
            ->count('student_id');

        return view('teacher.teacher-dashboard', [
            'user' => $user,
            'teacher' => $teacher,
            'totalClasses' => $totalClasses,
            'totalStudents' => $totalStudents,
        ]);
    }

    /**
     * Display the class list for the logged-in teacher.
     */
    public function classList(Request $request)
    {
        $user = Auth::user();
        
        if (!$user || $user->role !== 'teacher') {
            return redirect('/')->with('error', 'Access denied.');
        }

        $teacher = $user->teacher;
        
        if (!$teacher) {
            return redirect('/teacher/dashboard')->with('error', 'Teacher profile not found.');
        }

        // Get filter parameter
        $filterCode = $request->input('filter_code', '');

        // Get all subjects assigned to this teacher
        $subjectsQuery = Subject::where('teacher_id', $teacher->id);
        
        // Apply filter if provided
        if (!empty($filterCode)) {
            $subjectsQuery->where('code', 'like', '%' . $filterCode . '%');
        }
        
        $subjects = $subjectsQuery->orderBy('code')->get();

        // For each subject, count the number of enrolled students by EXACT subject code match only
        $subjectsWithCounts = $subjects->map(function ($subject) {
            // Only count students enrolled with the EXACT subject code
            $studentCount = StudentEnrollment::where('subject_code', $subject->code)
                ->distinct('student_id')
                ->count('student_id');
            
            return [
                'subject' => $subject,
                'student_count' => $studentCount,
            ];
        });

        return view('teacher.teacher-class-list', [
            'user' => $user,
            'teacher' => $teacher,
            'subjectsWithCounts' => $subjectsWithCounts,
            'filterCode' => $filterCode,
        ]);
    }

    /**
     * Display the class details (students and grades) for a specific subject.
     */
    public function viewClassDetails($subjectId)
    {
        $user = Auth::user();
        
        if (!$user || $user->role !== 'teacher') {
            return redirect('/')->with('error', 'Access denied.');
        }

        $teacher = $user->teacher;
        
        if (!$teacher) {
            return redirect('/teacher/dashboard')->with('error', 'Teacher profile not found.');
        }

        // Get the subject and verify it belongs to this teacher
        $subject = Subject::where('id', $subjectId)
            ->where('teacher_id', $teacher->id)
            ->firstOrFail();

        // Get all enrollments for this subject code
        $enrollments = StudentEnrollment::where('subject_code', $subject->code)
            ->with(['student', 'grades'])
            ->get();

        // Prepare student data with grades
        $studentsWithGrades = $enrollments->map(function ($enrollment) {
            $student = $enrollment->student;
            $grades = $enrollment->grades;
            
            // Calculate average grade if grades exist
            $averageGrade = null;
            if ($grades->count() > 0) {
                $averageGrade = $grades->avg('grade');
            }

            return [
                'student' => $student,
                'enrollment' => $enrollment,
                'grades' => $grades,
                'average_grade' => $averageGrade,
            ];
        })->sortBy(function ($item) {
            // Sort by student last name
            return $item['student']->last_name ?? '';
        })->values();

        return view('teacher.teacher-class-details', [
            'user' => $user,
            'teacher' => $teacher,
            'subject' => $subject,
            'studentsWithGrades' => $studentsWithGrades,
        ]);
    }

    /**
     * Store or update a grade for a student.
     */
    public function storeGrade(Request $request, $subjectId)
    {
        $user = Auth::user();
        
        if (!$user || $user->role !== 'teacher') {
            return redirect('/')->with('error', 'Access denied.');
        }

        $teacher = $user->teacher;
        
        if (!$teacher) {
            return redirect('/teacher/dashboard')->with('error', 'Teacher profile not found.');
        }

        // Verify the subject belongs to this teacher
        $subject = Subject::where('id', $subjectId)
            ->where('teacher_id', $teacher->id)
            ->firstOrFail();

        $validated = $request->validate([
            'student_enrollment_id' => 'required|exists:student_enrollments,id',
            'grade' => 'required|numeric|in:1.0,2.0,2.5,3.0,3.5,4.0,7.5',
        ]);

        // Verify the enrollment belongs to the subject
        $enrollment = StudentEnrollment::where('id', $validated['student_enrollment_id'])
            ->where('subject_code', $subject->code)
            ->firstOrFail();

        // Set type as "Final Grade" automatically
        $validated['type'] = 'Final Grade';

        // Check if final grade already exists for this enrollment
        $existingGrade = Grade::where('student_enrollment_id', $validated['student_enrollment_id'])
            ->where('type', 'Final Grade')
            ->first();

        if ($existingGrade) {
            // Update existing grade
            $existingGrade->update(['grade' => $validated['grade']]);
            $message = 'Final grade updated successfully!';
        } else {
            // Create new grade
            Grade::create($validated);
            $message = 'Final grade added successfully!';
        }

        return redirect()->route('teacher.class-details', $subjectId)
            ->with('success', $message);
    }

    /**
     * Delete a grade.
     */
    public function deleteGrade(Request $request, $subjectId, $gradeId)
    {
        $user = Auth::user();
        
        if (!$user || $user->role !== 'teacher') {
            return redirect('/')->with('error', 'Access denied.');
        }

        $teacher = $user->teacher;
        
        if (!$teacher) {
            return redirect('/teacher/dashboard')->with('error', 'Teacher profile not found.');
        }

        // Verify the subject belongs to this teacher
        $subject = Subject::where('id', $subjectId)
            ->where('teacher_id', $teacher->id)
            ->firstOrFail();

        // Get the grade and verify it belongs to an enrollment for this subject
        $grade = Grade::findOrFail($gradeId);
        $enrollment = $grade->studentEnrollment;
        
        if ($enrollment->subject_code !== $subject->code) {
            return redirect()->route('teacher.class-details', $subjectId)
                ->with('error', 'Invalid grade.');
        }

        $grade->delete();

        return redirect()->route('teacher.class-details', $subjectId)
            ->with('success', 'Grade deleted successfully!');
    }

    /**
     * Display announcements for teachers.
     */
    public function announcements()
    {
        $user = Auth::user();
        
        if (!$user || $user->role !== 'teacher') {
            return redirect('/')->with('error', 'Access denied.');
        }

        $teacher = $user->teacher;
        
        if (!$teacher) {
            return redirect('/teacher/dashboard')->with('error', 'Teacher profile not found.');
        }

        // Get announcements for teachers (All or Teachers)
        $announcements = Announcement::whereIn('target_audience', ['All', 'Teachers'])
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Mark all visible announcements as viewed
        if ($user && $announcements->isNotEmpty()) {
            try {
                if (\Illuminate\Support\Facades\Schema::hasTable('announcement_views')) {
                    $announcementIds = $announcements->pluck('id');
                    $user->viewedAnnouncements()->syncWithoutDetaching($announcementIds);
                }
            } catch (\Exception $e) {
                // Table doesn't exist or error occurred, continue without marking as viewed
            }
        }
        
        return view('teacher.teacher-announcements', [
            'user' => $user,
            'teacher' => $teacher,
            'announcements' => $announcements,
        ]);
    }
}
