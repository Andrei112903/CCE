<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use App\Models\DropRequest;
use App\Models\StudentEnrollment;
use Illuminate\Http\Request;

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
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('grade_level', 'like', "%{$search}%");
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
        $subjects = Subject::orderBy('created_at', 'desc')->get();
        
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
        $subjects = Subject::orderBy('created_at', 'desc')->get();
        
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
}
