<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Enrolled Students: {{ $subject->code }}</title>
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
                <a href="/admin/teachers" class="nav-item">
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
                    <a href="/admin/add-subject" class="nav-item active">
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
                    <div class="nav-section-title">Communication</div>
                    <a href="/admin/announcements" class="nav-item">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                        Announcements
                    </a>
                </div>
            </nav>
        </aside>

       
        <main class="main-content">
            
            <header class="content-header">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <a href="{{ route('admin.add-subject') }}" style="display: inline-flex; align-items: center; padding: 8px; border-radius: 50%; background-color: #f3f4f6; color: #374151; text-decoration: none; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#e5e7eb'" onmouseout="this.style.backgroundColor='#f3f4f6'" title="Back to Subjects">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 20px; height: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </a>
                    <h1 class="page-title">Enrolled Students: {{ $subject->code }} - {{ $subject->title }}</h1>
                </div>
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

            <div style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <h2 style="margin: 0 0 12px 0; font-size: 18px; font-weight: 600; color: #212529; font-family: 'Inter', sans-serif;">Subject Information</h2>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px;">
                    <div>
                        <span style="font-size: 12px; color: #6c757d; font-weight: 500; font-family: 'Inter', sans-serif;">Subject Code:</span>
                        <p style="margin: 4px 0 0 0; font-size: 14px; color: #212529; font-family: 'Inter', sans-serif;">{{ $subject->code }}</p>
                    </div>
                    <div>
                        <span style="font-size: 12px; color: #6c757d; font-weight: 500; font-family: 'Inter', sans-serif;">Subject Title:</span>
                        <p style="margin: 4px 0 0 0; font-size: 14px; color: #212529; font-family: 'Inter', sans-serif;">{{ $subject->title }}</p>
                    </div>
                    <div>
                        <span style="font-size: 12px; color: #6c757d; font-weight: 500; font-family: 'Inter', sans-serif;">Units:</span>
                        <p style="margin: 4px 0 0 0; font-size: 14px; color: #212529; font-family: 'Inter', sans-serif;">{{ number_format($subject->units, 1) }}</p>
                    </div>
                    <div>
                        <span style="font-size: 12px; color: #6c757d; font-weight: 500; font-family: 'Inter', sans-serif;">Total Enrolled:</span>
                        <p style="margin: 4px 0 0 0; font-size: 14px; color: #212529; font-family: 'Inter', sans-serif; font-weight: 600;">{{ $students->count() }} student(s)</p>
                    </div>
                </div>
            </div>

            
            <div class="course-table-container">
                <table class="teacher-table" style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <thead>
                        <tr style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef;">
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Student ID</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Student Name</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Year Level</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Email</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Schedule</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $item)
                        @php
                            $student = $item['student'];
                            $enrollment = $item['enrollment'];
                        @endphp
                        <tr style="border-bottom: 1px solid #e9ecef;">
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">{{ $student->student_id ?? '-' }}</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">{{ $student->first_name ?? '' }} {{ $student->last_name ?? '' }}</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">{{ $student->grade_level ?? '-' }}</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">{{ $student->email ?? '-' }}</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">{{ $enrollment->schedule ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="padding: 40px 16px; text-align: center; color: #6c757d; font-size: 14px;">
                                No students enrolled in this subject yet.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
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
    </script>
</body>
</html>

