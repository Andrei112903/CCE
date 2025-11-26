<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Student Portal - Dashboard</title>
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
                <a href="/dashboard" class="nav-item active">
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
                    <a href="/grades" class="nav-item">
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
                <h1 class="page-title">Student Portal</h1>
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

           
            @if(isset($student) && $student)
            <div class="student-info-card">
                <div class="student-id-badge">{{ $student->student_id ?? '-' }}</div>
                <h2 class="student-name">{{ $student->first_name ?? '' }} {{ $student->last_name ?? '' }}</h2>
                <p class="student-email">{{ $student->email ?? '' }}</p>
                <p class="student-semester">First Semester 2025-26</p>
                <div class="student-year-badge">{{ $student->grade_level ?? 'Student' }}</div>
            </div>
            @else
            <div class="student-info-card">
                <div class="student-id-badge">-</div>
                <h2 class="student-name">{{ isset($user) ? $user->name : 'Student' }}</h2>
                <p class="student-email">{{ isset($user) ? $user->email : '' }}</p>
                <p class="student-semester">First Semester 2025-26</p>
                <div class="student-year-badge">Student</div>
            </div>
            @endif

          
            <div class="summary-grid">
                <div class="summary-row">
                    <div class="summary-card">
                        <div class="summary-value">19,200.00</div>
                        <div class="summary-label">Total Payment</div>
                    </div>
                    <div class="summary-card">
                        <div class="summary-value">4.0</div>
                        <div class="summary-label">Exam Paid</div>
                    </div>
                    <div class="summary-card">
                        <div class="summary-value">3,400.00</div>
                        <div class="summary-label">Per Exam</div>
                    </div>
                </div>
                <div class="summary-row summary-row-bottom">
                    <div class="summary-card">
                        <div class="summary-value">30,259.00</div>
                        <div class="summary-label">Total Assessment</div>
                    </div>
                    <div class="summary-card">
                        <div class="summary-value">10,000.00</div>
                        <div class="summary-label">Current Balance</div>
                    </div>
                </div>
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
        
        // Prevent back button from going to login page
        (function() {
            // Replace any login page in history
            if (window.history && window.history.replaceState) {
                // Replace current entry to prevent back navigation
                window.history.replaceState(null, null, window.location.href);
            }
            
            // Listen for back/forward button
            window.addEventListener('popstate', function(event) {
                // If trying to go back, push current page forward
                if (window.location.pathname === '/' || window.location.pathname === '/login') {
                    window.history.pushState(null, null, '/dashboard');
                    window.location.href = '/dashboard';
                }
            });
            
            // Push state to prevent back navigation to login
            if (window.history && window.history.pushState) {
                window.history.pushState(null, null, window.location.href);
            }
        })();
    </script>
</body>
</html>

