<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Student Portal - Class Schedule</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/dashboard.css">
    <style>
        .drop-modal {
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

        .drop-modal.active {
            display: flex;
        }

        .drop-modal-content {
            background: white;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .drop-modal-header {
            background-color: var(--um-red);
            color: white;
            padding: 16px 20px;
            font-size: 18px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            border-radius: 8px 8px 0 0;
        }

        .drop-modal-body {
            padding: 24px;
        }

        .modal-section {
            margin-bottom: 24px;
        }

        .modal-section-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--um-dark-text);
            margin-bottom: 16px;
            font-family: 'Inter', sans-serif;
        }

        .modal-field {
            margin-bottom: 16px;
        }

        .modal-label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 500;
            color: #495057;
            font-family: 'Inter', sans-serif;
        }

        .modal-input,
        .modal-select,
        .modal-textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            color: var(--um-dark-text);
            background-color: white;
            box-sizing: border-box;
        }

        .modal-input:focus,
        .modal-select:focus,
        .modal-textarea:focus {
            outline: none;
            border-color: var(--um-red);
        }

        .modal-textarea {
            min-height: 100px;
            resize: vertical;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .modal-cancel-btn {
            background-color: white;
            color: #212529;
            border: 1px solid #ced4da;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            transition: background-color 0.2s ease;
        }

        .modal-cancel-btn:hover {
            background-color: #f3f4f6;
        }

        .modal-submit-btn {
            background-color: var(--um-red);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            transition: background-color 0.2s ease;
        }

        .modal-submit-btn:hover {
            background-color: var(--um-dark-red);
        }

        @media (max-width: 768px) {
            .drop-modal-content {
                width: 95%;
                max-width: 95%;
                margin: 20px auto;
            }

            .drop-modal-body {
                padding: 16px;
            }

            .modal-section {
                margin-bottom: 20px;
            }

            .modal-footer {
                flex-direction: column-reverse;
                gap: 12px;
            }

            .modal-cancel-btn,
            .modal-submit-btn {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .drop-modal-header {
                padding: 12px 16px;
                font-size: 16px;
            }

            .drop-modal-body {
                padding: 12px;
            }

            .modal-section-title {
                font-size: 14px;
                margin-bottom: 12px;
            }

            .modal-label {
                font-size: 12px;
            }

            .modal-input,
            .modal-select,
            .modal-textarea {
                font-size: 14px;
                padding: 8px 10px;
            }

            .modal-textarea {
                min-height: 80px;
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
                <img src="/image/um-seal.png" alt="UM Logo" class="sidebar-logo">
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
                    <a href="/class-schedule" class="nav-item active">
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
                    <a href="/announcements" style="margin-left: 16px; display: inline-flex; align-items: center; padding: 8px; border-radius: 50%; background-color: #f3f4f6; color: #374151; text-decoration: none; transition: background-color 0.2s; position: relative;" onmouseover="this.style.backgroundColor='#e5e7eb'" onmouseout="this.style.backgroundColor='#f3f4f6'" title="Announcements">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 20px; height: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                        @if(isset($unseenAnnouncementsCount) && $unseenAnnouncementsCount > 0)
                        <span style="position: absolute; top: 0; right: 0; background-color: #dc3545; color: white; border-radius: 50%; width: 18px; height: 18px; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: 600; font-family: 'Inter', sans-serif; border: 2px solid white;">{{ $unseenAnnouncementsCount > 99 ? '99+' : $unseenAnnouncementsCount }}</span>
                        @endif
                    </a>
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

            
            <div class="course-table-container">
                <table class="schedule-table">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Time</th>
                            <th>Term</th>
                            <th>Room</th>
                            <th>Program</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="scheduleTableBody">
                        <!-- Enrolled subjects will be displayed here dynamically -->
                        <tr id="emptyScheduleRow">
                            <td colspan="10" style="text-align: center; padding: 40px; color: #6c757d;">
                                No enrolled subjects. Go to "Enroll Course" to add subjects.
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="total-units-label">Total Enrolled Units</td>
                            <td class="total-units-value" id="totalUnitsValue">0.00</td>
                            <td colspan="6"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </main>
    </div>

    <!-- Drop Subject Request Modal -->
    <div class="drop-modal" id="dropModal">
        <div class="drop-modal-content">
            <div class="drop-modal-header">
                Drop Subject Request
            </div>
            <div class="drop-modal-body">
                <form id="dropRequestForm">
                    @csrf
                    <div class="modal-section">
                        <h3 class="modal-section-title">Subject Information</h3>
                        <div class="modal-field">
                            <label class="modal-label">Subject Code:</label>
                            <select class="modal-select" id="subjectCode" name="subject_code">
                                <option value="">Select your current subject</option>
                                <!-- Options will be populated dynamically -->
                            </select>
                        </div>
                    </div>

                    <div class="modal-section">
                        <div class="modal-field">
                            <label class="modal-label">Reason:</label>
                            <textarea class="modal-textarea" id="dropReason" name="reason" placeholder="Enter your reason for dropping this subject..."></textarea>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="modal-cancel-btn" id="cancelDropBtn">Cancel</button>
                    <button type="button" class="modal-submit-btn" id="submitDropBtn">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get enrolled subjects from server (database)
        const enrolledSubjects = @json($enrolledSubjects ?? []);
        const scheduleTableBody = document.getElementById('scheduleTableBody');
        const totalUnitsValue = document.getElementById('totalUnitsValue');
        
        // Get all subjects data for additional info
        const allSubjects = @json($allSubjects ?? []);

        // Function to render enrolled subjects in schedule table
        function renderScheduleTable() {
            if (enrolledSubjects.length === 0) {
                scheduleTableBody.innerHTML = '<tr id="emptyScheduleRow"><td colspan="10" style="text-align: center; padding: 40px; color: #6c757d;">No enrolled subjects. Go to "Enroll Course" to add subjects.</td></tr>';
                totalUnitsValue.textContent = '0.00';
                return;
            }

            let totalUnits = 0;
            scheduleTableBody.innerHTML = enrolledSubjects.map((subject, index) => {
                totalUnits += parseFloat(subject.units || 0);
                
                // Find full subject details from allSubjects
                const fullSubject = allSubjects.find(s => s.code === subject.code) || {};
                
                // Parse schedule - format is usually like "800-1000M" or "M-SA2" or "1230A-130A"
                const schedule = subject.schedule || '-';
                let time = '-';
                let term = fullSubject.term || '-';
                let program = fullSubject.program || '-';
                
                if (schedule !== '-') {
                    // Try to extract time from schedule
                    // Format examples: "800-1000M", "M-SA2", "1230A-130A"
                    const timeMatch = schedule.match(/(\d+[A-Z]?-\d+[A-Z]?)/);
                    
                    if (timeMatch) {
                        time = timeMatch[1];
                    } else {
                        // If no time pattern found, use the whole schedule as time
                        time = schedule;
                    }
                }
                
                // Escape strings for safe HTML
                const safeCode = (subject.code || '-').replace(/'/g, "&#39;");
                const safeTitle = (subject.title || '-').replace(/'/g, "&#39;");
                
                return `
                    <tr>
                        <td>${subject.code || '-'}</td>
                        <td>${subject.title || '-'}</td>
                        <td>${fullSubject.description || '-'}</td>
                        <td>${subject.units || '0.0'}</td>
                        <td>${time}</td>
                        <td>${term}</td>
                        <td>-</td>
                        <td>${program}</td>
                        <td>
                            <span class="status-badge status-official">Official</span>
                        </td>
                        <td>
                            <button class="drop-button" onclick="openDropModal('${safeCode}', '${safeTitle}')" data-code="${subject.code}" data-title="${subject.title}">Drop</button>
                        </td>
                    </tr>
                `;
            }).join('');

            totalUnitsValue.textContent = totalUnits.toFixed(2);
        }

        // Function to populate subject code dropdown
        function populateSubjectCodeDropdown() {
            const subjectCodeSelect = document.getElementById('subjectCode');
            if (!subjectCodeSelect) return;
            
            // Clear existing options except the first one
            subjectCodeSelect.innerHTML = '<option value="">Select your current subject</option>';
            
            // Add enrolled subjects to dropdown
            enrolledSubjects.forEach((subject) => {
                const option = document.createElement('option');
                option.value = subject.code;
                option.textContent = `${subject.code} - ${subject.title}`;
                subjectCodeSelect.appendChild(option);
            });
        }

        // Function to open drop modal
        window.openDropModal = function(code, title, index) {
            const dropModal = document.getElementById('dropModal');
            const subjectCodeSelect = document.getElementById('subjectCode');
            
            // Populate dropdown with enrolled subjects
            populateSubjectCodeDropdown();
            
            // Store the index for removal after drop
            dropModal.setAttribute('data-subject-index', index);
            
            // Set the selected subject code
            if (subjectCodeSelect) {
                subjectCodeSelect.value = code || '';
            }
            
            // Show modal
            dropModal.classList.add('active');
        };

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

        // Drop modal functionality
        const dropModal = document.getElementById('dropModal');
        const cancelDropBtn = document.getElementById('cancelDropBtn');
        const submitDropBtn = document.getElementById('submitDropBtn');
        const subjectCodeSelect = document.getElementById('subjectCode');

        // Close modal when cancel is clicked
        if (cancelDropBtn) {
            cancelDropBtn.addEventListener('click', function() {
                dropModal.classList.remove('active');
                // Reset form
                if (subjectCodeSelect) subjectCodeSelect.value = '';
                const reasonTextarea = document.getElementById('dropReason');
                if (reasonTextarea) reasonTextarea.value = '';
            });
        }

        // Close modal when clicking outside
        dropModal.addEventListener('click', function(e) {
            if (e.target === dropModal) {
                dropModal.classList.remove('active');
                // Reset form
                if (subjectCodeSelect) subjectCodeSelect.value = '';
                const reasonTextarea = document.getElementById('dropReason');
                if (reasonTextarea) reasonTextarea.value = '';
            }
        });

        // Submit drop request
        if (submitDropBtn) {
            submitDropBtn.addEventListener('click', function() {
                const code = subjectCodeSelect.value;
                const reason = document.getElementById('dropReason').value;

                if (!code) {
                    alert('Please select a subject code.');
                    return;
                }

                if (!reason.trim()) {
                    alert('Please provide a reason for dropping the subject.');
                    return;
                }

                if (reason.trim().length < 10) {
                    alert('Reason must be at least 10 characters long.');
                    return;
                }

                // Disable button during submission
                submitDropBtn.disabled = true;
                submitDropBtn.textContent = 'Submitting...';

                // Get CSRF token from form or meta tag
                const form = document.getElementById('dropRequestForm');
                const csrfToken = form?.querySelector('input[name="_token"]')?.value || 
                                 document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

                // Submit to server using FormData for better CSRF handling
                const formData = new FormData();
                formData.append('subject_code', code);
                formData.append('reason', reason.trim());
                if (csrfToken) {
                    formData.append('_token', csrfToken);
                }

                // Submit to server
                fetch('/drop-request', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(data => {
                            throw new Error(data.error || 'Server error');
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // DO NOT remove subject from schedule - it stays until admin approves
                        alert('Drop request submitted successfully! The admin will review your request. The subject will remain in your schedule until approved.');
                        
                        // Close modal and reset form
                        dropModal.classList.remove('active');
                        subjectCodeSelect.value = '';
                        document.getElementById('dropReason').value = '';
                        
                        // Reload page to refresh the schedule (in case admin already approved)
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    } else {
                        const errorMsg = data.error || (data.errors ? Object.values(data.errors).flat().join(', ') : 'Failed to submit drop request');
                        alert('Error: ' + errorMsg);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while submitting the drop request: ' + error.message);
                })
                .finally(() => {
                    submitDropBtn.disabled = false;
                    submitDropBtn.textContent = 'Submit';
                });
            });
        }

        // Initialize schedule table on page load
        renderScheduleTable();

        // Cross-tab logout detection
        (function() {
            let lastLogoutCheck = localStorage.getItem('lastLogoutCheck') || 0;
            let checkInterval;

            function checkAuthStatus() {
                fetch('/dashboard', {
                    method: 'HEAD',
                    credentials: 'same-origin',
                    headers: {'X-Requested-With': 'XMLHttpRequest'}
                })
                .then(response => {
                    if (response.status === 401 || response.status === 403 || (response.redirected && response.url.includes('/login'))) {
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
                window.location.href = '/';
            }

            window.addEventListener('storage', function(e) {
                if (e.key === 'logoutTime' || e.key === 'studentLogout') {
                    handleLogout();
                }
            });

            document.addEventListener('DOMContentLoaded', function() {
                const logoutForms = document.querySelectorAll('form[action="/logout"]');
                logoutForms.forEach(function(form) {
                    form.addEventListener('submit', function() {
                        sessionStorage.setItem('logoutTime', Date.now().toString());
                        localStorage.setItem('studentLogout', Date.now().toString());
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

