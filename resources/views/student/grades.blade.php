<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Student Portal - Grades</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2 class="sidebar-title">Student Portal</h2>
                <button class="mobile-menu-close" id="mobileMenuClose" style="display: none;">×</button>
            </div>
            
            <nav class="nav-menu">
                <a href="/dashboard" class="nav-item">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Dashboard
                </a>

                <div class="nav-section">
                    <div class="nav-section-title">Online Enrollment</div>
                    <a href="/enroll-course" class="nav-item">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Enroll Course
                    </a>
                    <a href="/class-schedule" class="nav-item">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Class Schedule
                    </a>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Records</div>
                    <a href="/grades" class="nav-item active">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        Grades
                    </a>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Student Account</div>
                    <a href="/assessment" class="nav-item">
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
                <h1 class="page-title">Grades</h1>
                <div class="user-info">
                    <div class="user-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <span class="user-name">{{ isset($student) && $student ? $student->first_name : (isset($user) ? $user->name : 'Student') }}</span>
                    <form method="POST" action="/logout" style="display: inline; margin-left: 12px;">
                        @csrf
                        <button type="submit" style="padding: 6px 12px; border-radius: 999px; border: none; background-color:rgba(217, 0, 0, 0.77); color: #ffffff; font-size: 12px; font-weight: 600; cursor: pointer">Logout</button>
                    </form>
                </div>
            </header>

            <div class="content-card">
                <div class="card-header">
                    <h2 class="card-title">My Grades</h2>
                    <p class="card-subtitle">View your grades for enrolled subjects</p>
                </div>

                <div class="table-container">
                    @if(count($enrollmentsWithGrades) > 0)
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Subject Code</th>
                                    <th>Subject Title</th>
                                    <th>Units</th>
                                    <th>Midterm Grade</th>
                                    <th>Final Grade</th>
                                    <th>Overall Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enrollmentsWithGrades as $item)
                                    @php
                                        $enrollment = $item['enrollment'];
                                        $grades = $item['grades'];
                                        
                                        // Get specific grade types
                                        $midtermGrade = $grades->where('type', 'Midterm')->first();
                                        $finalGrade = $grades->where('type', 'Final')->first();
                                        
                                        // Calculate overall grade (average of midterm and final if both exist)
                                        $overallGrade = null;
                                        if ($midtermGrade && $finalGrade && $midtermGrade->grade !== null && $finalGrade->grade !== null) {
                                            $overallGrade = ($midtermGrade->grade + $finalGrade->grade) / 2;
                                        } elseif ($finalGrade && $finalGrade->grade !== null) {
                                            $overallGrade = $finalGrade->grade;
                                        } elseif ($midtermGrade && $midtermGrade->grade !== null) {
                                            $overallGrade = $midtermGrade->grade;
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $enrollment->subject_code }}</td>
                                        <td>{{ $enrollment->subject_title }}</td>
                                        <td>{{ number_format($enrollment->units, 1) }}</td>
                                        <td>
                                            @if($midtermGrade && $midtermGrade->grade !== null)
                                                {{ number_format($midtermGrade->grade, 2) }}
                                            @else
                                                <span style="color: #6c757d;">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($finalGrade && $finalGrade->grade !== null)
                                                {{ number_format($finalGrade->grade, 2) }}
                                            @else
                                                <span style="color: #6c757d;">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($overallGrade !== null)
                                                <strong>{{ number_format($overallGrade, 2) }}</strong>
                                            @else
                                                <span style="color: #6c757d;">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div style="text-align: center; padding: 60px 20px; color: #6c757d;">
                            <svg style="width: 64px; height: 64px; margin: 0 auto 16px; opacity: 0.5;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p style="font-size: 16px; margin: 0;">No grades available yet.</p>
                            <p style="font-size: 14px; margin: 8px 0 0 0; opacity: 0.7;">Grades will appear here once they are posted by your instructors.</p>
                        </div>
                    @endif
                </div>
            </div>
        </main>
    </div>

    <button class="mobile-menu-toggle" id="mobileMenuToggle">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <script>
        // Mobile menu toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileMenuClose = document.getElementById('mobileMenuClose');
        const sidebar = document.getElementById('sidebar');
        
        if (mobileMenuToggle && sidebar) {
            mobileMenuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('open');
            });
            
            if (mobileMenuClose) {
                mobileMenuClose.addEventListener('click', function() {
                    sidebar.classList.remove('open');
                });
            }
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                if (window.innerWidth <= 768) {
                    if (!sidebar.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
                        sidebar.classList.remove('open');
                    }
                }
            });
        }
    </script>
</body>
</html>


