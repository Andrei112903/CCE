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
                    <a href="/admin/change-password" class="user-icon" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background-color: #f3f4f6; color: #374151; text-decoration: none; transition: background-color 0.2s; cursor: pointer;" onmouseover="this.style.backgroundColor='#e5e7eb'" onmouseout="this.style.backgroundColor='#f3f4f6'" title="Change Password">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 20px; height: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </a>
                    <span class="user-name">{{ Auth::user()->name ?? 'Admin' }}</span>
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
                <h2 style="font-size: 20px; font-weight: 600; margin-bottom: 20px; color: #111827; font-family: 'Inter', sans-serif;">Registered Teachers</h2>
                <table class="teacher-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($teachers as $teacher)
                        <tr>
                            <td style="font-weight: 500;">{{ $teacher->first_name }} {{ $teacher->last_name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>
                                <button class="assign-button" onclick="assignSubjects({{ $teacher->id }}, '{{ $teacher->first_name }} {{ $teacher->last_name }}')" style="padding: 6px 12px; background-color: #cc2128; color: white; border: none; border-radius: 4px; font-size: 13px; font-weight: 500; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#a31a1f'" onmouseout="this.style.backgroundColor='#cc2128'">Assign Subjects</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" style="padding: 40px 16px; text-align: center; color: #6c757d; font-size: 14px;">
                                No registered teachers found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Assign Subjects Modal -->
    <div id="assignSubjectsModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div style="background: white; border-radius: 8px; width: 90%; max-width: 600px; padding: 24px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-height: 80vh; overflow-y: auto;">
            <h2 style="margin: 0 0 20px 0; font-size: 20px; font-weight: 600; color: #212529; font-family: 'Inter', sans-serif;">Assign Subjects</h2>
            <p style="margin: 0 0 20px 0; font-size: 14px; color: #6c757d; font-family: 'Inter', sans-serif;">
                Teacher: <strong id="modalTeacherName"></strong>
            </p>
            <form id="assignSubjectsForm" method="POST">
                @csrf
                <input type="hidden" name="teacher_id" id="modalTeacherId">
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 14px; font-weight: 500; margin-bottom: 8px; color: #374151;">Select Subjects:</label>
                    <div style="max-height: 300px; overflow-y: auto; border: 1px solid #d1d5db; border-radius: 4px; padding: 12px;">
                        @forelse($subjects as $subject)
                        <label style="display: block; padding: 8px; margin-bottom: 4px; cursor: pointer; border-radius: 4px; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='transparent'">
                            <input type="checkbox" name="subject_ids[]" value="{{ $subject->id }}" 
                                   class="subject-checkbox" 
                                   data-teacher-id="{{ $subject->teacher_id }}"
                                   style="margin-right: 8px;">
                            <span style="font-size: 14px;">{{ $subject->code }} - {{ $subject->title }} ({{ $subject->units }} units)</span>
                            @if($subject->teacher_id && $subject->teacher)
                                <span style="color: #6c757d; font-size: 12px; margin-left: 8px;">
                                    (Currently: {{ $subject->teacher->first_name }} {{ $subject->teacher->last_name }})
                                </span>
                            @endif
                        </label>
                        @empty
                        <p style="color: #6c757d; font-size: 14px; text-align: center; padding: 20px;">No subjects available.</p>
                        @endforelse
                    </div>
                </div>
                <div style="display: flex; justify-content: flex-end; gap: 12px;">
                    <button type="button" onclick="closeAssignSubjectsModal()" style="background-color: white; color: #212529; border: 1px solid #ced4da; padding: 10px 20px; border-radius: 4px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">Cancel</button>
                    <button type="submit" style="background-color: #cc2128; color: white; border: none; padding: 10px 20px; border-radius: 4px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">Assign</button>
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

        // Assign Subjects functionality
        function assignSubjects(teacherId, teacherName) {
            const modal = document.getElementById('assignSubjectsModal');
            const form = document.getElementById('assignSubjectsForm');
            const teacherIdInput = document.getElementById('modalTeacherId');
            const teacherNameSpan = document.getElementById('modalTeacherName');
            
            teacherIdInput.value = teacherId;
            teacherNameSpan.textContent = teacherName;
            form.action = '/admin/teachers/' + teacherId + '/assign-subjects';
            
            // Check subjects already assigned to this teacher
            const checkboxes = document.querySelectorAll('.subject-checkbox');
            checkboxes.forEach(function(checkbox) {
                const subjectTeacherId = checkbox.getAttribute('data-teacher-id');
                if (subjectTeacherId && parseInt(subjectTeacherId) === parseInt(teacherId)) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
            
            modal.style.display = 'flex';
        }
        
        function closeAssignSubjectsModal() {
            document.getElementById('assignSubjectsModal').style.display = 'none';
        }
        
        // Close modal when clicking outside
        document.getElementById('assignSubjectsModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeAssignSubjectsModal();
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

        // Cross-tab logout detection
        (function() {
            let lastLogoutCheck = localStorage.getItem('lastLogoutCheck') || 0;
            let checkInterval;

            function checkAuthStatus() {
                fetch('/admin/dashboard', {
                    method: 'HEAD',
                    credentials: 'same-origin',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => {
                    if (response.status === 401 || response.status === 403 || (response.redirected && response.url.includes('/admin/login'))) {
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
                window.location.href = '/admin/login';
            }

            window.addEventListener('storage', function(e) {
                if (e.key === 'logoutTime' || e.key === 'adminLogout') {
                    handleLogout();
                }
            });

            document.addEventListener('DOMContentLoaded', function() {
                const logoutForms = document.querySelectorAll('form[action="/logout"]');
                logoutForms.forEach(function(form) {
                    form.addEventListener('submit', function() {
                        sessionStorage.setItem('logoutTime', Date.now().toString());
                        localStorage.setItem('adminLogout', Date.now().toString());
                    });
                });
            });

            checkInterval = setInterval(function() {
                lastLogoutCheck = Date.now();
                localStorage.setItem('lastLogoutCheck', lastLogoutCheck.toString());
                checkAuthStatus();
            }, 2000);

            document.addEventListener('visibilitychange', function() {
                if (!document.hidden) {
                    checkAuthStatus();
                }
            });

            window.addEventListener('focus', checkAuthStatus);
        })();
    </script>
</body>
</html>


