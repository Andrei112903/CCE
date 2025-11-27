<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Teachers</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/dashboard.css">
</head>
<body>
    <!-- Mobile Menu Toggle Button -->
    <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle menu">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
    
    <div class="dashboard-container">
        
        <aside class="sidebar" id="sidebar">
            
            <div class="logo-container">
                <img src="/image/um-seal.png" alt="UM Logo" class="sidebar-logo">
            </div>

           
            <nav class="nav-menu">
                <a href="/admin/dashboard" class="nav-item">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="/admin/teachers" class="nav-item active">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h-2a4 4 0 00-8 0H5a3 3 0 01-3-3v-1a3 3 0 013-3h1.5M19 20h0a3 3 0 003-3v-1a3 3 0 00-3-3H17.5M12 12a4 4 0 100-8 4 4 0 000 8zm6 0a3 3 0 10-3-3 3 3 0 003 3z"></path>
                    </svg>
                    Teachers
                </a>
                <a href="/admin/student-management" class="nav-item">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    Student Management
                </a>

                <div class="nav-section">
                    <div class="nav-section-title">Online Enrollment</div>
                    <a href="/admin/add-subject" class="nav-item">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Subjects
                    </a>
                    <a href="/admin/drop-request-list" class="nav-item">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v6m0 4v4m-4-4v4m8-4v4m-9-8h10"></path>
                        </svg>
                        Drop Request List
                    </a>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Records</div>
                    <a href="/admin/grades" class="nav-item">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        Grades
                    </a>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Student Account</div>
                    <a href="#" class="nav-item">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        Assessment
                    </a>
                </div>
            </nav>
        </aside>

       
        <main class="main-content">
            
            <header class="content-header">
                <h1 class="page-title">Teachers Management</h1>
                <div class="user-info">
                    <div class="user-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <span class="user-name">Ninfuy</span>
                    <form method="POST" action="/logout" style="display: inline; margin-left: 12px;">
                        @csrf
                        <button type="submit" style="padding: 6px 12px; border-radius: 999px; border: none; background-color: rgba(217, 0, 0, 0.77); color: #ffffff; font-size: 12px; font-weight: 600; cursor: pointer">Logout</button>
                    </form>
                </div>
            </header>

            
            @if (session('success'))
                <div style="background-color: #d4edda; color: #155724; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb; font-size: 14px; font-family: 'Inter', sans-serif;">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div style="background-color: #f8d7da; color: #721c24; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #f5c6cb; font-size: 14px; font-family: 'Inter', sans-serif;">
                    {{ session('error') }}
                </div>
            @endif

            <div class="admin-teacher-stats">
                <div class="summary-card admin-summary-card">
                    <div class="admin-summary-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h-2a4 4 0 00-8 0H5a3 3 0 01-3-3v-1a3 3 0 013-3h1.5M19 20h0a3 3 0 003-3v-1a3 3 0 00-3-3H17.5M12 12a4 4 0 100-8 4 4 0 000 8zm6 0a3 3 0 10-3-3 3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    <div class="admin-summary-text">
                        <div class="admin-summary-label">Total Teachers</div>
                        <div class="admin-summary-value">{{ $totalTeachers }}</div>
                    </div>
                </div>

                <div class="summary-card admin-summary-card">
                    <div class="admin-summary-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h-2a4 4 0 00-8 0H5a3 3 0 01-3-3v-1a3 3 0 013-3h1.5M19 20h0a3 3 0 003-3v-1a3 3 0 00-3-3H17.5M12 12a4 4 0 100-8 4 4 0 000 8zm6 0a3 3 0 10-3-3 3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    <div class="admin-summary-text">
                        <div class="admin-summary-label">Unassigned Teachers</div>
                        <div class="admin-summary-value">{{ $unassignedTeachers }}</div>
                    </div>
                </div>
            </div>

            
            <div class="course-table-container">
                <table class="teacher-table">
                    <thead>
                        <tr>
                            <th>Subject Code</th>
                            <th>Subject Title</th>
                            <th>Units</th>
                            <th>Assigned Teacher</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subjects as $subject)
                        <tr>
                            <td>{{ $subject->code }}</td>
                            <td>{{ $subject->title }}</td>
                            <td>{{ $subject->units }}</td>
                            <td>
                                @if($subject->teacher)
                                    {{ $subject->teacher->first_name }} {{ $subject->teacher->last_name }}
                                @else
                                    <span style="color: #6c757d;">Not Assigned</span>
                                @endif
                            </td>
                            <td>
                                @if($subject->teacher)
                                    <button class="change-button" onclick="assignTeacher({{ $subject->id }}, '{{ $subject->code }}', '{{ $subject->title }}', {{ $subject->teacher_id }})">Change</button>
                                @else
                                    <button class="assign-button" onclick="assignTeacher({{ $subject->id }}, '{{ $subject->code }}', '{{ $subject->title }}', null)">Assign</button>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="padding: 40px 16px; text-align: center; color: #6c757d; font-size: 14px;">
                                No subjects found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Assign Teacher Modal -->
    <div id="assignTeacherModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div style="background: white; border-radius: 8px; width: 90%; max-width: 500px; padding: 24px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <h2 style="margin: 0 0 20px 0; font-size: 20px; font-weight: 600; color: #212529; font-family: 'Inter', sans-serif;">Assign Teacher</h2>
            <p style="margin: 0 0 20px 0; font-size: 14px; color: #6c757d; font-family: 'Inter', sans-serif;">
                Subject: <strong id="modalSubjectCode"></strong> - <strong id="modalSubjectTitle"></strong>
            </p>
            <form id="assignTeacherForm" method="POST">
                @csrf
                <input type="hidden" name="subject_id" id="modalSubjectId">
                <select name="teacher_id" id="modalTeacherId" style="width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; margin-bottom: 20px;" required>
                    <option value="">Select a teacher...</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->first_name }} {{ $teacher->last_name }} ({{ $teacher->email }})</option>
                    @endforeach
                </select>
                <div style="display: flex; justify-content: flex-end; gap: 12px;">
                    <button type="button" onclick="closeAssignModal()" style="background-color: white; color: #212529; border: 1px solid #ced4da; padding: 10px 20px; border-radius: 4px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">Cancel</button>
                    <button type="submit" style="background-color: #dc3545; color: white; border: none; padding: 10px 20px; border-radius: 4px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">Assign</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const sidebar = document.getElementById('sidebar');
        
        if (mobileMenuToggle && sidebar) {
            mobileMenuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('open');
            });
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                if (window.innerWidth <= 768) {
                    if (!sidebar.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
                        sidebar.classList.remove('open');
                    }
                }
            });
        }
        
        // Assign Teacher functionality
        function assignTeacher(subjectId, subjectCode, subjectTitle, currentTeacherId) {
            const modal = document.getElementById('assignTeacherModal');
            const form = document.getElementById('assignTeacherForm');
            const subjectIdInput = document.getElementById('modalSubjectId');
            const teacherSelect = document.getElementById('modalTeacherId');
            const subjectCodeSpan = document.getElementById('modalSubjectCode');
            const subjectTitleSpan = document.getElementById('modalSubjectTitle');
            
            subjectIdInput.value = subjectId;
            subjectCodeSpan.textContent = subjectCode;
            subjectTitleSpan.textContent = subjectTitle;
            teacherSelect.value = currentTeacherId || '';
            form.action = '/admin/subjects/' + subjectId + '/assign-teacher';
            
            modal.style.display = 'flex';
        }
        
        function closeAssignModal() {
            document.getElementById('assignTeacherModal').style.display = 'none';
        }
        
        // Close modal when clicking outside
        document.getElementById('assignTeacherModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeAssignModal();
            }
        });
        
        // Remove arrows/steppers from admin summary cards
        document.addEventListener('DOMContentLoaded', function() {
            const adminCards = document.querySelectorAll('.admin-summary-card');
            adminCards.forEach(function(card) {
                // Hide any buttons after the value
                const valueElements = card.querySelectorAll('.admin-summary-value');
                valueElements.forEach(function(value) {
                    let next = value.nextElementSibling;
                    while (next) {
                        if (next.tagName === 'BUTTON' || next.tagName === 'SVG' || 
                            next.classList.contains('stepper') || 
                            next.classList.contains('arrow') ||
                            next.getAttribute('role') === 'button') {
                            next.style.display = 'none';
                            next.style.visibility = 'hidden';
                        }
                        next = next.nextElementSibling;
                    }
                });
                
                // Hide any pseudo-elements (via style injection)
                const style = document.createElement('style');
                style.textContent = '.admin-summary-card .admin-summary-value::after, .admin-summary-card .admin-summary-value::before { display: none !important; content: none !important; }';
                document.head.appendChild(style);
                
                // Hide any input steppers
                const inputs = card.querySelectorAll('input[type="number"]');
                inputs.forEach(function(input) {
                    input.style.webkitAppearance = 'textfield';
                    input.style.mozAppearance = 'textfield';
                    input.style.appearance = 'textfield';
                });
            });
        });
    </script>
</body>
</html>


