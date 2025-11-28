<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use App\Models\DropRequest;
use App\Models\StudentEnrollment;
use App\Models\Grade;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        // Get accurate counts from database
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalUsers = User::count();
        
        // Get recent registrations (last 7 days)
        $recentStudents = Student::where('created_at', '>=', now()->subDays(7))->count();
        
        return view('admin.admin-dashboard', [
            'totalStudents' => $totalStudents,
            'totalTeachers' => $totalTeachers,
            'totalUsers' => $totalUsers,
            'recentStudents' => $recentStudents,
        ]);
    }

    /**
     * Display the student management page.
     */
    public function studentManagement(Request $request)
    {
        // Get search query if any
        $search = $request->get('search', '');
        
        // Query students with search functionality
        $query = Student::query();
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('student_id', 'like', "%{$search}%")
                  ->orWhere('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$search}%"]);
            });
        }
        
        // Get all students ordered by created date (newest first)
        $students = $query->orderBy('created_at', 'desc')->get();
        
        return view('admin.admin-student-management', [
            'students' => $students,
            'search' => $search,
        ]);
    }

    /**
     * Display the add subject page.
     */
    public function addSubject()
    {
        $subjects = Subject::orderBy('title', 'asc')->get();
        
        return view('admin.admin-add-subject', [
            'subjects' => $subjects,
            'editingSubject' => null,
        ]);
    }

    /**
     * Store a new subject.
     */
    public function storeSubject(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:subjects,code',
            'title' => 'required|string|max:255',
            'units' => 'required|numeric|min:0|max:10',
            'description' => 'nullable|string',
            'program' => 'nullable|string|max:255',
            'year_level' => 'nullable|string|max:255',
            'term' => 'nullable|string|max:255',
            'schedule' => 'nullable|string|max:255',
            'room' => 'nullable|string|max:255',
        ]);

        Subject::create($validated);

        return redirect()->route('admin.add-subject')
            ->with('success', 'Subject added successfully!');
    }

    /**
     * Show edit form for a subject.
     */
    public function editSubject($id)
    {
        $subject = Subject::findOrFail($id);
        $subjects = Subject::orderBy('title', 'asc')->get();
        
        return view('admin.admin-add-subject', [
            'subjects' => $subjects,
            'editingSubject' => $subject,
        ]);
    }

    /**
     * Update a subject.
     */
    public function updateSubject(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        
        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:subjects,code,' . $id,
            'title' => 'required|string|max:255',
            'units' => 'required|numeric|min:0|max:10',
            'description' => 'nullable|string',
            'program' => 'nullable|string|max:255',
            'year_level' => 'nullable|string|max:255',
            'term' => 'nullable|string|max:255',
            'schedule' => 'nullable|string|max:255',
            'room' => 'nullable|string|max:255',
        ]);

        $subject->update($validated);

        return redirect()->route('admin.add-subject')
            ->with('success', 'Subject updated successfully!');
    }

    /**
     * Delete a subject.
     */
    public function deleteSubject($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('admin.add-subject')
            ->with('success', 'Subject deleted successfully!');
    }

    /**
     * Display the drop request list page.
     */
    public function dropRequestList()
    {
        $dropRequests = DropRequest::with('student')
            ->orderBy('created_at', 'desc')
            ->get();

        $totalPending = DropRequest::where('status', 'Pending')->count();

        return view('admin.admin-drop-request-list', [
            'dropRequests' => $dropRequests,
            'totalPending' => $totalPending,
        ]);
    }

    /**
     * Approve a drop request.
     */
    public function approveDropRequest($id)
    {
        $dropRequest = DropRequest::findOrFail($id);
        
        // Update status to Approved
        $dropRequest->update(['status' => 'Approved']);
        
        // Remove the enrollment from student_enrollments table
        StudentEnrollment::where('student_id', $dropRequest->student_id)
            ->where('subject_code', $dropRequest->subject_code)
            ->delete();

        return redirect()->route('admin.drop-request-list')
            ->with('success', 'Drop request approved successfully! The subject has been removed from the student\'s schedule.');
    }

    /**
     * Reject a drop request.
     */
    public function rejectDropRequest($id)
    {
        $dropRequest = DropRequest::findOrFail($id);
        $dropRequest->update(['status' => 'Rejected']);

        return redirect()->route('admin.drop-request-list')
            ->with('success', 'Drop request rejected successfully!');
    }

    /**
     * Delete a student and their associated user account.
     * This method completely removes the student and all related data from the database.
     */
    public function deleteStudent($id)
    {
        $student = Student::findOrFail($id);
        
        // Get the user ID and email before deleting the student
        $userId = $student->user_id;
        $userEmail = $student->email;
        
        // Start database transaction to ensure all deletions succeed or none do
        DB::beginTransaction();
        
        try {
            // Delete related records first
            // Get enrollments to delete associated grades
            $enrollments = StudentEnrollment::where('student_id', $student->student_id)->get();
            
            // Delete grades associated with enrollments
            foreach ($enrollments as $enrollment) {
                Grade::where('student_enrollment_id', $enrollment->id)->delete();
            }
            
            // Delete student enrollments
            StudentEnrollment::where('student_id', $student->student_id)->delete();
            
            // Delete drop requests
            DropRequest::where('student_id', $student->student_id)->delete();
            
            // Delete the student record
            $student->delete();
            
            // Delete the associated user account and all related authentication data
            if ($userId) {
                // Delete user sessions
                DB::table('sessions')->where('user_id', $userId)->delete();
                
                // Delete password reset tokens for this user's email
                if ($userEmail) {
                    DB::table('password_reset_tokens')->where('email', $userEmail)->delete();
                }
                
                // Delete the user account from users table
                User::where('id', $userId)->delete();
            }
            
            // Commit all deletions
            DB::commit();
            
            return redirect()->route('admin.student-management')
                ->with('success', 'Student account and all related data have been completely removed from the database.');
                
        } catch (\Exception $e) {
            // Rollback if any error occurs
            DB::rollBack();
            
            return redirect()->route('admin.student-management')
                ->with('error', 'Failed to delete student. Please try again.');
        }
    }

    /**
     * Display the teachers management page.
     */
    public function teachers()
    {
        // Get all teachers from database
        $teachers = Teacher::with('user')->orderBy('created_at', 'desc')->get();
        
        // Get all subjects with their assigned teachers
        $subjects = Subject::with('teacher')->orderBy('code')->get();
        
        // Count total teachers
        $totalTeachers = Teacher::count();
        
        // Count unassigned teachers (teachers not assigned to any subject)
        $assignedTeacherIds = Subject::whereNotNull('teacher_id')
            ->distinct()
            ->pluck('teacher_id')
            ->toArray();
        
        $unassignedTeachers = Teacher::whereNotIn('id', $assignedTeacherIds)->count();
        
        return view('admin.admin-teachers', [
            'teachers' => $teachers,
            'subjects' => $subjects,
            'totalTeachers' => $totalTeachers,
            'unassignedTeachers' => $unassignedTeachers,
        ]);
    }

    /**
     * Assign a teacher to a subject.
     */
    public function assignTeacherToSubject(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        
        $validated = $request->validate([
            'teacher_id' => 'nullable|exists:teachers,id',
        ]);
        
        $subject->update([
            'teacher_id' => $validated['teacher_id'] ?? null,
        ]);
        
        return redirect()->route('admin.teachers')
            ->with('success', 'Teacher assignment updated successfully!');
    }

    /**
     * Display the announcements management page.
     */
    public function announcements()
    {
        $announcements = Announcement::orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.admin-announcements', [
            'announcements' => $announcements,
        ]);
    }

    /**
     * Store a new announcement.
     */
    public function storeAnnouncement(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'target_audience' => 'required|in:All,Students,Teachers,Admins',
        ]);

        Announcement::create($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Announcement created successfully!']);
        }

        return redirect()->route('admin.announcements')
            ->with('success', 'Announcement created successfully!');
    }

    /**
     * Update an announcement.
     */
    public function updateAnnouncement(Request $request, $id)
    {
        $announcement = Announcement::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'target_audience' => 'required|in:All,Students,Teachers,Admins',
        ]);

        $announcement->update($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Announcement updated successfully!']);
        }

        return redirect()->route('admin.announcements')
            ->with('success', 'Announcement updated successfully!');
    }

    /**
     * Delete an announcement.
     */
    public function deleteAnnouncement($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->route('admin.announcements')
            ->with('success', 'Announcement deleted successfully!');
    }

    /**
     * Display the student grades page.
     */
    public function grades(Request $request)
    {
        $search = $request->get('search', '');
        
        $query = Student::query();
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('student_id', 'like', "%{$search}%")
                  ->orWhere('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$search}%"]);
            });
        }
        
        $students = $query->orderBy('student_id')->get();
        
        return view('admin.admin-grades', [
            'students' => $students,
            'search' => $search,
        ]);
    }

    /**
     * View grades for a specific student.
     */
    public function viewStudentGrades($studentId)
    {
        $student = Student::where('student_id', $studentId)->orWhere('id', $studentId)->firstOrFail();
        
        // Get all enrollments for this student with their grades
        $enrollments = StudentEnrollment::where('student_id', $student->id)
            ->with(['grades' => function($query) {
                $query->where('type', 'Final Grade')->orderBy('created_at', 'desc');
            }])
            ->get()
            ->map(function($enrollment) {
                $subject = $enrollment->subject();
                // Get the most recent final grade
                $finalGrade = $enrollment->grades()->where('type', 'Final Grade')->orderBy('created_at', 'desc')->first();
                
                return [
                    'enrollment' => $enrollment,
                    'subject' => $subject,
                    'final_grade' => $finalGrade ? number_format((float)$finalGrade->grade, 1, '.', '') : null,
                ];
            });
        
        return view('admin.admin-student-grades', [
            'student' => $student,
            'enrollments' => $enrollments,
        ]);
    }

    /**
     * View students enrolled in a specific subject.
     */
    public function viewSubjectStudents($id)
    {
        $subject = Subject::findOrFail($id);
        
        // Get all enrollments for this subject with student relationship
        $enrollments = StudentEnrollment::where('subject_code', $subject->code)
            ->with('student')
            ->get();
        
        // Get student details, filtering out any enrollments without students
        $students = $enrollments->filter(function($enrollment) {
            return $enrollment->student !== null;
        })->map(function($enrollment) {
            return [
                'enrollment' => $enrollment,
                'student' => $enrollment->student,
            ];
        });
        
        return view('admin.admin-subject-students', [
            'subject' => $subject,
            'students' => $students,
        ]);
    }
}
