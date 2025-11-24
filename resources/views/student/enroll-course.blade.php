<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Student Portal - Enroll Course</title>
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
                <a href="/dashboard" class="nav-item">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Dashboard
                </a>

                <div class="nav-section">
                    <div class="nav-section-title">Online Enrollment</div>
                    <a href="/enroll-course" class="nav-item active">
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

           
            <div class="course-table-container">
                <table class="course-table">
                    <thead>
                        <tr>
                            <th>Offered</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Prerequisite</th>
                            <th>Units</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subjects as $subject)
                        @php
                            // Check if this subject title is already enrolled
                            $isEnrolled = isset($enrolledSubjectTitles) && in_array($subject->title, $enrolledSubjectTitles);
                        @endphp
                        <tr>
                            <td>
                                <span class="status-badge status-yes">Yes</span>
                            </td>
                            <td>{{ $subject->title }}</td>
                            <td>{{ $subject->description ?? '-' }}</td>
                            <td>-</td>
                            <td>{{ number_format($subject->units, 1) }}</td>
                            <td>
                                @php
                                    $levelParts = array_filter([
                                        $subject->program,
                                        $subject->year_level,
                                        $subject->term
                                    ]);
                                    $level = !empty($levelParts) ? implode(' / ', $levelParts) : '-';
                                @endphp
                                {{ $level }}
                            </td>
                            <td>
                                @if($isEnrolled)
                                    <button class="Enlist-button" disabled style="background-color: #6c757d; cursor: not-allowed; opacity: 0.6;">
                                        Enrolled
                                    </button>
                                @else
                                    <button class="Enlist-button" 
                                            data-title="{{ $subject->title }}">Enlist</button>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 40px; color: #6c757d;">
                                No subjects available. Please contact the administrator.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Schedule Selection Modal -->
    <div id="scheduleModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div style="background: white; border-radius: 12px; width: 90%; max-width: 900px; max-height: 90vh; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column;">
            <!-- Modal Header -->
            <div style="background-color: #dc3545; color: white; padding: 20px 24px; font-size: 18px; font-weight: 600; font-family: 'Inter', sans-serif;">
                Select Schedule for <span id="scheduleModalTitle"></span>
            </div>
            
            <!-- Modal Body -->
            <div style="padding: 24px; overflow-y: auto; flex: 1;">
                <div class="course-table-container">
                    <table class="course-table" style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden;">
                        <thead>
                            <tr style="background-color: #f3f4f6;">
                                <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Subject Code</th>
                                <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Subject Title</th>
                                <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Units</th>
                                <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Schedule</th>
                                <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="scheduleOptionsBody">
                            <!-- Schedule options will be added here dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Modal Footer -->
            <div style="padding: 16px 24px; border-top: 1px solid #e5e7eb; display: flex; justify-content: flex-end;">
                <button id="closeScheduleModal" style="background-color: #6c757d; color: white; border: none; padding: 10px 24px; border-radius: 6px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">
                    Cancel
                </button>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1001; justify-content: center; align-items: center;">
        <div style="background: white; border-radius: 12px; width: 90%; max-width: 600px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden;">
            <!-- Modal Header -->
            <div style="background-color: #dc3545; color: white; padding: 20px 24px; font-size: 18px; font-weight: 600; font-family: 'Inter', sans-serif;">
                Confirm Enrollment
            </div>
            
            <!-- Modal Body -->
            <div style="padding: 24px;">
                <p style="margin-bottom: 20px; font-size: 16px; color: #212529; font-family: 'Inter', sans-serif;">
                    Please confirm if you want to save this enrollment:
                </p>
                
                <div style="background-color: #f8f9fa; border-radius: 8px; padding: 16px; margin-bottom: 24px;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <td style="padding: 8px 0; font-weight: 600; color: #495057; font-size: 14px; width: 120px;">Subject Code:</td>
                            <td style="padding: 8px 0; color: #212529; font-size: 14px;" id="confirmCode">-</td>
                        </tr>
                        <tr>
                            <td style="padding: 8px 0; font-weight: 600; color: #495057; font-size: 14px;">Subject Title:</td>
                            <td style="padding: 8px 0; color: #212529; font-size: 14px;" id="confirmTitle">-</td>
                        </tr>
                        <tr>
                            <td style="padding: 8px 0; font-weight: 600; color: #495057; font-size: 14px;">Units:</td>
                            <td style="padding: 8px 0; color: #212529; font-size: 14px;" id="confirmUnits">-</td>
                        </tr>
                        <tr>
                            <td style="padding: 8px 0; font-weight: 600; color: #495057; font-size: 14px;">Schedule:</td>
                            <td style="padding: 8px 0; color: #212529; font-size: 14px;" id="confirmSchedule">-</td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <!-- Modal Footer -->
            <div style="padding: 16px 24px; border-top: 1px solid #e5e7eb; display: flex; justify-content: flex-end; gap: 12px;">
                <button id="removeEnrollmentBtn" style="background-color: #6c757d; color: white; border: none; padding: 10px 24px; border-radius: 6px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">
                    Remove
                </button>
                <button id="saveEnrollmentBtn" style="background-color: #28a745; color: white; border: none; padding: 10px 24px; border-radius: 6px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">
                    Save
                </button>
            </div>
        </div>
    </div>

    <script>
        // All subjects data from server
        const allSubjects = @json($allSubjects);
        
        // Enrolled subject codes (to prevent re-enrollment)
        const enrolledSubjectCodes = @json($enrolledSubjectCodes ?? []);
        
        // Enrolled schedules (to prevent schedule conflicts)
        const enrolledSchedules = @json($enrolledSchedules ?? []);
        
        // Function to check if a schedule conflicts with enrolled schedules
        function hasScheduleConflict(schedule) {
            if (!schedule || schedule.trim() === '' || schedule === '-') {
                return false; // No conflict if schedule is empty
            }
            const normalizedSchedule = schedule.trim();
            return enrolledSchedules.includes(normalizedSchedule);
        }

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

        // Modal elements
        const scheduleModal = document.getElementById('scheduleModal');
        const scheduleModalTitle = document.getElementById('scheduleModalTitle');
        const scheduleOptionsBody = document.getElementById('scheduleOptionsBody');
        const closeScheduleModal = document.getElementById('closeScheduleModal');
        const confirmModal = document.getElementById('confirmModal');
        const confirmCode = document.getElementById('confirmCode');
        const confirmTitle = document.getElementById('confirmTitle');
        const confirmUnits = document.getElementById('confirmUnits');
        const confirmSchedule = document.getElementById('confirmSchedule');
        const saveEnrollmentBtn = document.getElementById('saveEnrollmentBtn');
        const removeEnrollmentBtn = document.getElementById('removeEnrollmentBtn');
        const enlistButtons = document.querySelectorAll('.Enlist-button');
        
        // Store selected subject data for confirmation
        let selectedSubjectData = null;

        // Function to show schedule selection modal
        function showScheduleModal(subjectTitle) {
            // Find all subjects with the same title that are NOT already enrolled
            const subjectsWithSameTitle = allSubjects.filter(s => {
                return s.title === subjectTitle && !enrolledSubjectCodes.includes(s.code);
            });
            
            if (subjectsWithSameTitle.length === 0) {
                alert('No available schedules found for this subject. You may already be enrolled in all available schedules.');
                return;
            }

            // Update modal title
            scheduleModalTitle.textContent = subjectTitle;

            // Render schedule options (filter out conflicting schedules)
            const availableSubjects = subjectsWithSameTitle.filter(s => {
                const schedule = (s.schedule || '').trim();
                return !hasScheduleConflict(schedule);
            });
            
            const conflictingSubjects = subjectsWithSameTitle.filter(s => {
                const schedule = (s.schedule || '').trim();
                return hasScheduleConflict(schedule);
            });

            let tableHTML = '';
            
            // Show available (non-conflicting) schedules
            if (availableSubjects.length > 0) {
                tableHTML += availableSubjects.map((subject) => {
                    const escapedCode = (subject.code || '').replace(/'/g, "\\'");
                    const escapedTitle = (subject.title || '').replace(/'/g, "\\'");
                    const escapedSchedule = (subject.schedule || '-').replace(/'/g, "\\'");
                    return `
                    <tr style="border-bottom: 1px solid #e5e7eb;">
                        <td style="padding: 12px 16px; color: #212529; font-size: 14px;">${subject.code || '-'}</td>
                        <td style="padding: 12px 16px; color: #212529; font-size: 14px;">${subject.title || '-'}</td>
                        <td style="padding: 12px 16px; color: #212529; font-size: 14px;">${parseFloat(subject.units || 0).toFixed(1)}</td>
                        <td style="padding: 12px 16px; color: #212529; font-size: 14px;">${subject.schedule || '-'}</td>
                        <td style="padding: 12px 16px;">
                            <button class="Enlist-button" onclick="selectSchedule('${escapedCode}', '${escapedTitle}', ${subject.units || 0}, '${escapedSchedule}')" style="background-color: #22c55e;">Enlist</button>
                        </td>
                    </tr>
                `;
                }).join('');
            }
            
            // Show conflicting schedules (disabled)
            if (conflictingSubjects.length > 0) {
                tableHTML += conflictingSubjects.map((subject) => {
                    const schedule = (subject.schedule || '-').trim();
                    return `
                    <tr style="border-bottom: 1px solid #e5e7eb; background-color: #fff3cd;">
                        <td style="padding: 12px 16px; color: #856404; font-size: 14px;">${subject.code || '-'}</td>
                        <td style="padding: 12px 16px; color: #856404; font-size: 14px;">${subject.title || '-'}</td>
                        <td style="padding: 12px 16px; color: #856404; font-size: 14px;">${parseFloat(subject.units || 0).toFixed(1)}</td>
                        <td style="padding: 12px 16px; color: #856404; font-size: 14px;">${schedule || '-'}</td>
                        <td style="padding: 12px 16px;">
                            <button disabled style="background-color: #dc3545; color: white; border: none; padding: 8px 16px; border-radius: 6px; font-size: 14px; cursor: not-allowed; opacity: 0.6;">
                                Schedule Conflict
                            </button>
                        </td>
                    </tr>
                `;
                }).join('');
            }
            
            if (tableHTML === '') {
                tableHTML = '<tr><td colspan="5" style="text-align: center; padding: 40px; color: #6c757d;">All available schedules conflict with your current enrollments.</td></tr>';
            }
            
            scheduleOptionsBody.innerHTML = tableHTML;

            // Show modal
            scheduleModal.style.display = 'flex';
        }

        // Function to select a schedule and show confirmation
        window.selectSchedule = function(code, title, units, schedule) {
            // Store selected subject data
            selectedSubjectData = {
                code: code,
                title: title,
                units: parseFloat(units).toFixed(1),
                schedule: schedule || '-'
            };
            
            // Populate confirmation modal
            confirmCode.textContent = code;
            confirmTitle.textContent = title;
            confirmUnits.textContent = selectedSubjectData.units;
            confirmSchedule.textContent = schedule || '-';
            
            // Close schedule modal
            scheduleModal.style.display = 'none';
            
            // Show confirmation modal
            confirmModal.style.display = 'flex';
        };

        // Function to save enrollment to database
        function saveEnrollment() {
            if (!selectedSubjectData) return;
            
            // Get CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

            // Submit to server to save enrollment
            const formData = new FormData();
            formData.append('subject_code', selectedSubjectData.code);
            formData.append('subject_title', selectedSubjectData.title);
            formData.append('units', selectedSubjectData.units);
            formData.append('schedule', selectedSubjectData.schedule);
            if (csrfToken) {
                formData.append('_token', csrfToken);
            }

            // Disable button during submission
            saveEnrollmentBtn.disabled = true;
            saveEnrollmentBtn.textContent = 'Saving...';

            fetch('/enroll-subject', {
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
                    // Close confirmation modal
                    confirmModal.style.display = 'none';
                    
                    // Show success message
                    alert('Subject enrolled successfully! It has been saved to the database and will appear in your class schedule.');
                    
                    // Redirect to class schedule to see the enrolled subject
                    window.location.href = '/class-schedule';
                } else {
                    alert('Error: ' + (data.error || 'Failed to enroll'));
                    saveEnrollmentBtn.disabled = false;
                    saveEnrollmentBtn.textContent = 'Save';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred: ' + error.message);
                saveEnrollmentBtn.disabled = false;
                saveEnrollmentBtn.textContent = 'Save';
            });
        }

        // Function to remove/cancel enrollment
        function removeEnrollment() {
            // Clear selected subject data
            selectedSubjectData = null;
            
            // Close confirmation modal
            confirmModal.style.display = 'none';
            
            // Optionally show schedule modal again or just close
            // scheduleModal.style.display = 'flex';
        }

        // Event listeners for confirmation modal buttons
        if (saveEnrollmentBtn) {
            saveEnrollmentBtn.addEventListener('click', saveEnrollment);
        }

        if (removeEnrollmentBtn) {
            removeEnrollmentBtn.addEventListener('click', removeEnrollment);
        }

        // Close confirmation modal when clicking outside
        confirmModal.addEventListener('click', function(e) {
            if (e.target === confirmModal) {
                removeEnrollment();
            }
        });


        // Add click handlers to Enlist buttons
        enlistButtons.forEach((button) => {
            button.addEventListener('click', function() {
                const subjectTitle = this.getAttribute('data-title');
                showScheduleModal(subjectTitle);
            });
        });

        // Close schedule modal
        closeScheduleModal.addEventListener('click', function() {
            scheduleModal.style.display = 'none';
        });

        // Close schedule modal when clicking outside
        scheduleModal.addEventListener('click', function(e) {
            if (e.target === scheduleModal) {
                scheduleModal.style.display = 'none';
            }
        });

    </script>
</body>
</html>

