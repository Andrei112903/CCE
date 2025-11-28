<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Teacher Portal - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/teacher-dashboard.css">
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
                <a href="/teacher/dashboard" class="nav-item active">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Dashboard
                </a>

                <div class="nav-section">
                    <a href="/teacher/class-list" class="nav-item">
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
            
            <header class="content-header">
                <h1 class="page-title">Teacher Portal</h1>
                <div class="user-info">
                    <div class="user-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <span class="user-name">{{ isset($teacher) && $teacher ? ($teacher->first_name . ' ' . $teacher->last_name) : (isset($user) ? $user->name : 'Teacher') }}</span>
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

            
            <div class="top-section">
                <div class="teacher-summary-cards">
                    <div class="teacher-summary-card">
                        <div class="teacher-summary-number">{{ $totalClasses ?? 0 }}</div>
                        <div class="teacher-summary-label">Total Classes Today</div>
                    </div>
                    <div class="teacher-summary-card">
                        <div class="teacher-summary-number">{{ $totalStudents ?? 0 }}</div>
                        <div class="teacher-summary-label">Total Students</div>
                    </div>
                </div>

                
                <div class="dashboard-panel schedule-panel">
                    <div class="panel-header">
                        <svg class="panel-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <h2 class="panel-title">Schedule for Today</h2>
                    </div>
                    <table class="schedule-table">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Subject Title</th>
                                <th>Subject Code</th>
                                <th>Room</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>8:00 AM - 9:00 AM</td>
                                <td>IT 13</td>
                                <td>2098</td>
                                <td>Avr</td>
                            </tr>
                            <tr>
                                <td>9:00 AM - 10:00 AM</td>
                                <td>CCE 104</td>
                                <td>1021</td>
                                <td>301</td>
                            </tr>
                            <tr>
                                <td>11:00 AM - 12:00 AM</td>
                                <td>CCE 103</td>
                                <td>2089</td>
                                <td>303</td>
                            </tr>
                            <tr>
                                <td>1:00 PM - 2:00 PM</td>
                                <td>PHYSICS 1</td>
                                <td>2054</td>
                                <td>V1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            
            <div class="dashboard-grid">
                
                <div class="dashboard-panel">
                    <div class="panel-header">
                        <svg class="panel-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <h2 class="panel-title">Attendance Summary</h2>
                    </div>
                    <table class="attendance-table">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Present</th>
                                <th>Absent</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>IT 13</td>
                                <td>29</td>
                                <td>1</td>
                                <td>30</td>
                            </tr>
                            <tr>
                                <td>CCE 104</td>
                                <td>45</td>
                                <td>1</td>
                                <td>46</td>
                            </tr>
                            <tr>
                                <td>CCE 103</td>
                                <td>24</td>
                                <td>2</td>
                                <td>26</td>
                            </tr>
                            <tr>
                                <td>Physics</td>
                                <td>29</td>
                                <td>1</td>
                                <td>30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                
                <div class="dashboard-panel">
                    <div class="panel-header">
                        <svg class="panel-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                        <h2 class="panel-title">Announcements</h2>
                    </div>
                    <ul class="announcements-list">
                        @forelse($announcements ?? [] as $announcement)
                            <li class="announcement-item">
                                <div class="announcement-text">
                                    <strong>{{ $announcement->title }}</strong>
                                    @if(strlen($announcement->content) > 100)
                                        <p style="margin-top: 4px; font-size: 13px; color: #6b7280; font-weight: normal;">{{ substr(strip_tags($announcement->content), 0, 100) }}...</p>
                                    @else
                                        <p style="margin-top: 4px; font-size: 13px; color: #6b7280; font-weight: normal;">{{ strip_tags($announcement->content) }}</p>
                                    @endif
                                </div>
                                <div class="announcement-date">{{ \Carbon\Carbon::parse($announcement->date)->format('M d, Y') }}</div>
                            </li>
                        @empty
                            <li class="announcement-item">
                                <div class="announcement-text" style="color: #6b7280; font-style: italic;">No announcements available.</div>
                                <div class="announcement-date"></div>
                            </li>
                        @endforelse
                    </ul>
                    @if(isset($announcements) && $announcements->count() > 0)
                    <div style="text-align: center; margin-top: 16px; padding-top: 16px; border-top: 1px solid #e5e7eb;">
                        <a href="/teacher/announcements" style="color: var(--um-red); text-decoration: none; font-size: 14px; font-weight: 600;">View All Announcements →</a>
                    </div>
                    @endif
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
                if (window.location.pathname === '/teacher/login' || window.location.pathname === '/login') {
                    window.history.pushState(null, null, '/teacher/dashboard');
                    window.location.href = '/teacher/dashboard';
                }
            });
            
            // Push state to prevent back navigation to login
            if (window.history && window.history.pushState) {
                window.history.pushState(null, null, window.location.href);
            }
        })();

        // Cross-tab logout detection
        (function() {
            let lastLogoutCheck = localStorage.getItem('lastLogoutCheck') || 0;
            let checkInterval;

            function checkAuthStatus() {
                fetch('/teacher/dashboard', {
                    method: 'HEAD',
                    credentials: 'same-origin',
                    headers: {'X-Requested-With': 'XMLHttpRequest'}
                })
                .then(response => {
                    if (response.status === 401 || response.status === 403 || (response.redirected && response.url.includes('/teacher/login'))) {
                        handleLogout();
                    }
                })
                .catch(() => {
                    const logoutTime = sessionStorage.getItem('logoutTime');
                    if (logoutTime && parseInt(logoutTime) > parseInt(lastLogoutCheck)) {
                        handleLogout();
                    }
                });
            }

            function handleLogout() {
                clearInterval(checkInterval);
                localStorage.removeItem('lastLogoutCheck');
                sessionStorage.removeItem('logoutTime');
                alert('You have been logged out. Redirecting to login page...');
                window.location.href = '/teacher/login';
            }

            window.addEventListener('storage', function(e) {
                if (e.key === 'logoutTime' || e.key === 'teacherLogout') {
                    handleLogout();
                }
            });

            document.addEventListener('DOMContentLoaded', function() {
                const logoutForms = document.querySelectorAll('form[action="/logout"]');
                logoutForms.forEach(function(form) {
                    form.addEventListener('submit', function() {
                        sessionStorage.setItem('logoutTime', Date.now().toString());
                        localStorage.setItem('teacherLogout', Date.now().toString());
                    });
                });
            });

            checkInterval = setInterval(function() {
                lastLogoutCheck = Date.now();
                localStorage.setItem('lastLogoutCheck', lastLogoutCheck.toString());
                checkAuthStatus();
            }, 2000);

            document.addEventListener('visibilitychange', function() {
                if (!document.hidden) checkAuthStatus();
            });
            window.addEventListener('focus', checkAuthStatus);
        })();
    </script>
</body>
</html>

