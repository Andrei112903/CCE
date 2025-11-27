<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Portal - Class Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/teacher-dashboard.css">
    <style>
        .class-details-panel {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .class-details-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid #e5e7eb;
            flex-wrap: wrap;
            gap: 16px;
        }

        .class-details-title-section {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .class-details-icon {
            width: 24px;
            height: 24px;
            color: var(--um-red);
        }

        .class-details-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--um-dark-text);
        }

        .back-btn {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.2s ease;
        }

        .back-btn:hover {
            background-color: #5a6268;
        }

        .subject-info {
            background-color: #f8f9fa;
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 24px;
        }

        .subject-info-row {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
            margin-bottom: 8px;
        }

        .subject-info-item {
            display: flex;
            gap: 8px;
        }

        .subject-info-label {
            font-weight: 600;
            color: #495057;
            font-size: 14px;
        }

        .subject-info-value {
            color: #212529;
            font-size: 14px;
        }

        .class-details-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .class-details-table thead {
            background-color: #f3f4f6;
        }

        .class-details-table th,
        .class-details-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        .class-details-table th {
            font-weight: 600;
            color: #4b5563;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .class-details-table tbody tr:last-child td {
            border-bottom: none;
        }

        .class-details-table tbody tr:hover {
            background-color: #f9fafb;
        }

        .grade-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }

        .grade-excellent {
            background-color: #d4edda;
            color: #155724;
        }

        .grade-good {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        .grade-fair {
            background-color: #fff3cd;
            color: #856404;
        }

        .grade-poor {
            background-color: #f8d7da;
            color: #721c24;
        }

        .no-grade {
            color: #6c757d;
            font-style: italic;
        }

        .add-grade-btn {
            background-color: #22c55e;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            transition: background-color 0.2s ease;
        }

        .add-grade-btn:hover {
            background-color: #15803d;
        }

        .grade-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .grade-modal.active {
            display: flex;
        }

        .grade-modal-content {
            background: white;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .grade-modal-header {
            background-color: #BC0000;
            color: white;
            padding: 16px 20px;
            font-size: 18px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
        }

        .grade-modal-body {
            padding: 24px;
        }

        .grade-modal-form-group {
            margin-bottom: 16px;
        }

        .grade-modal-label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 500;
            color: #495057;
            font-family: 'Inter', sans-serif;
        }

        .grade-modal-input,
        .grade-modal-select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }

        .grade-modal-input:focus,
        .grade-modal-select:focus {
            outline: none;
            border-color: #BC0000;
        }

        .grade-modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .grade-modal-cancel-btn {
            background-color: white;
            color: #212529;
            border: 1px solid #ced4da;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
        }

        .grade-modal-cancel-btn:hover {
            background-color: #f3f4f6;
        }

        .grade-modal-submit-btn {
            background-color: #BC0000;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
        }

        .grade-modal-submit-btn:hover {
            background-color: #BC0000;
        }

        @media (max-width: 768px) {
            .class-details-panel {
                padding: 16px;
            }

            .class-details-header {
                margin-bottom: 16px;
                padding-bottom: 12px;
            }

            .class-details-title {
                font-size: 16px;
            }

            .class-details-table {
                font-size: 12px;
                display: block;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .class-details-table thead,
            .class-details-table tbody {
                display: block;
            }

            .class-details-table th,
            .class-details-table td {
                padding: 8px 12px;
                min-width: 100px;
            }
        }
    </style>
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
                <img src="/image/um-seal.png" alt="UM Tagum College Logo" class="sidebar-logo">
            </div>

            
            <nav class="nav-menu">
                <a href="/teacher/dashboard" class="nav-item">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Dashboard
                </a>

                <div class="nav-section">
                    <a href="/teacher/class-list" class="nav-item active">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Class List
                    </a>
                </div>

                <div class="nav-section">
                    <a href="/teacher/profile" class="nav-item">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profile Settings
                    </a>
                </div>
            </nav>
        </aside>

       
        <main class="main-content">
            
            <header class="content-header">
                <h1 class="page-title">Teacher Portal</h1>
                <div class="user-info">
                    <div class="user-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <span class="user-name">{{ $user->name ?? ($teacher->first_name ?? 'Teacher') }}</span>
                    <a href="/teacher/announcements" style="margin-left: 16px; display: inline-flex; align-items: center; padding: 8px; border-radius: 50%; background-color: #f3f4f6; color: #374151; text-decoration: none; transition: background-color 0.2s; position: relative;" onmouseover="this.style.backgroundColor='#e5e7eb'" onmouseout="this.style.backgroundColor='#f3f4f6'" title="Announcements">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 20px; height: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                        @if(isset($unseenAnnouncementsCount) && $unseenAnnouncementsCount > 0)
                        <span style="position: absolute; top: 0; right: 0; background-color: #dc3545; color: white; border-radius: 50%; width: 18px; height: 18px; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: 600; font-family: 'Inter', sans-serif; border: 2px solid white;">{{ $unseenAnnouncementsCount > 99 ? '99+' : $unseenAnnouncementsCount }}</span>
                        @endif
                    </a>
                    <form method="POST" action="/logout" style="display: inline; margin-left: 12px;">
                        @csrf
                        <button type="submit" style="padding: 6px 12px; border-radius: 999px; border: none; background-color: rgba(217, 0, 0, 0.77); color: #ffffff; font-size: 12px; font-weight: 600; cursor: pointer">Logout</button>
                    </form>
                </div>
            </header>

            @if (session('success'))
                <div style="background-color: #dfd; color: #3a3; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div style="background-color: #fee; color: #c33; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                    {{ session('error') }}
                </div>
            @endif

            
            <div class="class-details-panel">
                <div class="class-details-header">
                    <div class="class-details-title-section">
                        <svg class="class-details-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h2 class="class-details-title">Class Details</h2>
                    </div>
                    <a href="{{ route('teacher.class-list') }}" class="back-btn">← Back to Class List</a>
                </div>

                <!-- Subject Information -->
                <div class="subject-info">
                    <div class="subject-info-row">
                        <div class="subject-info-item">
                            <span class="subject-info-label">Subject Code:</span>
                            <span class="subject-info-value">{{ $subject->code }}</span>
                        </div>
                        <div class="subject-info-item">
                            <span class="subject-info-label">Subject Title:</span>
                            <span class="subject-info-value">{{ $subject->title }}</span>
                        </div>
                    </div>
                    <div class="subject-info-row">
                        <div class="subject-info-item">
                            <span class="subject-info-label">Units:</span>
                            <span class="subject-info-value">{{ number_format($subject->units, 1) }}</span>
                        </div>
                        <div class="subject-info-item">
                            <span class="subject-info-label">Schedule:</span>
                            <span class="subject-info-value">{{ $subject->schedule ?? 'Not set' }}</span>
                        </div>
                        @if($subject->room)
                        <div class="subject-info-item">
                            <span class="subject-info-label">Room:</span>
                            <span class="subject-info-value">{{ $subject->room }}</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Students and Grades Table -->
                <table class="class-details-table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Final Grade</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($studentsWithGrades as $item)
                        <tr>
                            <td>{{ $item['student']->student_id ?? '-' }}</td>
                            <td>{{ $item['student']->first_name ?? '' }} {{ $item['student']->last_name ?? '' }}</td>
                            <td>
                                <div style="display: flex; flex-wrap: wrap; gap: 6px; align-items: center;">
                                    @if($item['grades']->count() > 0)
                                        @foreach($item['grades'] as $grade)
                                            <span style="color: #212529; font-size: 14px;">
                                                {{ number_format((float)$grade->grade, 1, '.', '') }}
                                            </span>
                                        @endforeach
                                    @else
                                        <span class="no-grade">No grade yet</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <button class="add-grade-btn" 
                                    data-student-name="{{ $item['student']->first_name ?? '' }} {{ $item['student']->last_name ?? '' }}"
                                    data-enrollment-id="{{ $item['enrollment']->id }}"
                                    style="background-color: #BC0000; color: white; border: none; padding: 6px 12px; border-radius: 4px; font-size: 12px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">
                                    Add Grade
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 24px; color: #6c757d;">
                                No students enrolled in this subject yet.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Add Grade Modal -->
    <div id="gradeModal" class="grade-modal">
        <div class="grade-modal-content">
            <div class="grade-modal-header">
                Add Final Grade
            </div>
            <div class="grade-modal-body">
                <form id="gradeForm" method="POST" action="{{ route('teacher.store-grade', $subject->id) }}">
                    @csrf
                    <input type="hidden" id="grade-enrollment-id" name="student_enrollment_id" required>
                    
                    <div class="grade-modal-form-group">
                        <label class="grade-modal-label">Student</label>
                        <input type="text" id="grade-student-name" class="grade-modal-input" readonly style="background-color: #f8f9fa;">
                    </div>
                    
                    <div class="grade-modal-form-group">
                        <label class="grade-modal-label">Final Grade <span style="color: #dc3545;">*</span></label>
                        <select id="grade-value" name="grade" class="grade-modal-select" required>
                            <option value="">Select Grade</option>
                            <option value="1.0">1.0</option>
                            <option value="2.0">2.0</option>
                            <option value="2.5">2.5</option>
                            <option value="3.0">3.0</option>
                            <option value="3.5">3.5</option>
                            <option value="4.0">4.0</option>
                            <option value="7.5">7.5</option>
                        </select>
                    </div>
                    
                    <div class="grade-modal-footer">
                        <button type="button" id="cancelGradeBtn" class="grade-modal-cancel-btn">Cancel</button>
                        <button type="submit" class="grade-modal-submit-btn">Save Grade</button>
                    </div>
                </form>
            </div>
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

        // Grade modal functionality
        const gradeModal = document.getElementById('gradeModal');
        const addGradeButtons = document.querySelectorAll('.add-grade-btn');
        const cancelGradeBtn = document.getElementById('cancelGradeBtn');
        const gradeForm = document.getElementById('gradeForm');
        const gradeStudentName = document.getElementById('grade-student-name');
        const gradeEnrollmentId = document.getElementById('grade-enrollment-id');

        addGradeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const studentName = this.getAttribute('data-student-name');
                const enrollmentId = this.getAttribute('data-enrollment-id');
                
                gradeStudentName.value = studentName;
                gradeEnrollmentId.value = enrollmentId;
                
                gradeModal.classList.add('active');
            });
        });

        cancelGradeBtn.addEventListener('click', function() {
            gradeModal.classList.remove('active');
            gradeForm.reset();
        });

        gradeModal.addEventListener('click', function(e) {
            if (e.target === gradeModal) {
                gradeModal.classList.remove('active');
                gradeForm.reset();
            }
        });
    </script>
</body>
</html>

