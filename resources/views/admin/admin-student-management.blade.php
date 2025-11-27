<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Students Management</title>
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
                <a href="/admin/student-management" class="nav-item active">
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
                <h1 class="page-title">Students Management</h1>
                <div class="user-info">
                    <div class="user-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <span class="user-name">Ninfuy</span>
                </div>
            </header>

            
            <form method="GET" action="{{ route('admin.student-management') }}" style="margin-bottom: 20px; position: relative; display: inline-block; width: 100%; max-width: 500px;">
                <input type="text" name="search" value="{{ $search }}" placeholder="Search students..." style="width: 100%; padding: 12px 40px 12px 16px; border: 1px solid #ced4da; border-radius: 8px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box;">
                <button type="submit" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; padding: 0;">
                    <svg style="width: 18px; height: 18px; color: #6c757d;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                </button>
            </form>

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

            
            <div class="course-table-container">
                <table class="teacher-table" style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <thead>
                        <tr style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef;">
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Student ID</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Student Name</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Year Level</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Email</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Status</th>
                            
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                        <tr style="border-bottom: 1px solid #e9ecef;">
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">{{ $student->student_id }}</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">{{ $student->grade_level }}</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">{{ $student->email }}</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">
                                <span style="padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 500; 
                                    {{ $student->status === 'Enrolled' ? 'background-color: #d4edda; color: #155724;' : 'background-color: #f8d7da; color: #721c24;' }}">
                                    {{ $student->status }}
                                </span>
                            </td>
                            
                            <td style="padding: 12px 16px;">
                                <div style="display: flex; gap: 8px;">
                                    <button class="view-btn" 
                                        data-student='{"id":"{{ $student->student_id }}","name":"{{ $student->first_name }} {{ $student->last_name }}","gender":"{{ $student->gender }}","birthday":"{{ $student->birthday->format('F d, Y') }}","contact":"{{ $student->contact }}","email":"{{ $student->email }}","address":"{{ $student->address }}","grade":"{{ $student->grade_level }}","parent":"{{ $student->parent_name }}","parentContact":"{{ $student->parent_contact }}"}'
                                        style="background-color: #28a745; color: white; border: none; padding: 6px 16px; border-radius: 4px; font-size: 12px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">
                                        View
                                    </button>
                                    <button class="remove-btn" 
                                        data-student-id="{{ $student->id }}"
                                        data-student-name="{{ $student->first_name }} {{ $student->last_name }}"
                                        style="background-color: #dc3545; color: white; border: none; padding: 6px 16px; border-radius: 4px; font-size: 12px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">
                                        Remove
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="padding: 40px 16px; text-align: center; color: #6c757d; font-size: 14px;">
                                @if($search)
                                    No students found matching "{{ $search }}"
                                @else
                                    No students registered yet.
                                @endif
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    
    <div id="studentProfileModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div style="background: white; border-radius: 8px; width: 90%; max-width: 600px; max-height: 90vh; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            
            <div style="background-color: #dc3545; color: white; padding: 16px 20px; font-size: 18px; font-weight: 600; font-family: 'Inter', sans-serif;">
                Student Profile
            </div>
            
            
            <div style="padding: 24px;">
                
                <div style="margin-bottom: 24px;">
                    <h3 style="margin: 0 0 16px 0; font-size: 16px; font-weight: 600; color: #212529; font-family: 'Inter', sans-serif;">Personal Info</h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div>
                            <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Full Name</label>
                            <div id="modal-fullname" style="padding: 10px; background-color: #f8f9fa; border-radius: 4px; font-size: 14px; color: #212529; font-family: 'Inter', sans-serif;">-</div>
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Gender</label>
                            <div id="modal-gender" style="padding: 10px; background-color: #f8f9fa; border-radius: 4px; font-size: 14px; color: #212529; font-family: 'Inter', sans-serif;">-</div>
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Birthday</label>
                            <div id="modal-birthday" style="padding: 10px; background-color: #f8f9fa; border-radius: 4px; font-size: 14px; color: #212529; font-family: 'Inter', sans-serif;">-</div>
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Contact Number</label>
                            <div id="modal-contact" style="padding: 10px; background-color: #f8f9fa; border-radius: 4px; font-size: 14px; color: #212529; font-family: 'Inter', sans-serif;">-</div>
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Email</label>
                            <div id="modal-email" style="padding: 10px; background-color: #f8f9fa; border-radius: 4px; font-size: 14px; color: #212529; font-family: 'Inter', sans-serif;">
                                <a href="#" id="modal-email-link" style="color: #007bff; text-decoration: none;">-</a>
                            </div>
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Address</label>
                            <div id="modal-address" style="padding: 10px; background-color: #f8f9fa; border-radius: 4px; font-size: 14px; color: #212529; font-family: 'Inter', sans-serif;">-</div>
                        </div>
                    </div>
                </div>

                
                <div style="margin-bottom: 24px;">
                    <h3 style="margin: 0 0 16px 0; font-size: 16px; font-weight: 600; color: #212529; font-family: 'Inter', sans-serif;">Academic Info</h3>
                    <div>
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Grade Level</label>
                        <div id="modal-grade" style="padding: 10px; background-color: #f8f9fa; border-radius: 4px; font-size: 14px; color: #212529; font-family: 'Inter', sans-serif; max-width: 300px;">-</div>
                    </div>
                </div>

               
                <div style="margin-bottom: 24px;">
                    <h3 style="margin: 0 0 16px 0; font-size: 16px; font-weight: 600; color: #212529; font-family: 'Inter', sans-serif;">Guardian Info</h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div>
                            <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Parent Name</label>
                            <div id="modal-parent" style="padding: 10px; background-color: #f8f9fa; border-radius: 4px; font-size: 14px; color: #212529; font-family: 'Inter', sans-serif;">-</div>
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Contact Number</label>
                            <div id="modal-parent-contact" style="padding: 10px; background-color: #f8f9fa; border-radius: 4px; font-size: 14px; color: #212529; font-family: 'Inter', sans-serif;">-</div>
                        </div>
                    </div>
                </div>

                
                <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 24px;">
                    <button type="button" id="cancelModalBtn" style="background-color: white; color: #212529; border: 1px solid #ced4da; padding: 10px 20px; border-radius: 4px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">
                        Cancel
                    </button>
                    <button type="button" id="saveAssignmentBtn" style="background-color: #dc3545; color: white; border: none; padding: 10px 20px; border-radius: 4px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">
                        Save Assignment
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        
        const modal = document.getElementById('studentProfileModal');
        const viewButtons = document.querySelectorAll('.view-btn');
        const cancelBtn = document.getElementById('cancelModalBtn');
        const saveBtn = document.getElementById('saveAssignmentBtn');

        
        function populateModal(studentData) {
            document.getElementById('modal-fullname').textContent = studentData.name || '-';
            document.getElementById('modal-gender').textContent = studentData.gender || '-';
            document.getElementById('modal-birthday').textContent = studentData.birthday || '-';
            document.getElementById('modal-contact').textContent = studentData.contact || '-';
            document.getElementById('modal-email-link').textContent = studentData.email || '-';
            document.getElementById('modal-email-link').href = 'mailto:' + (studentData.email || '');
            document.getElementById('modal-address').textContent = studentData.address || '-';
            document.getElementById('modal-grade').textContent = studentData.grade || '-';
            document.getElementById('modal-parent').textContent = studentData.parent || '-';
            document.getElementById('modal-parent-contact').textContent = studentData.parentContact || '-';
        }

       
        viewButtons.forEach(button => {
            button.addEventListener('click', function() {
                const studentData = JSON.parse(this.getAttribute('data-student'));
                populateModal(studentData);
                modal.style.display = 'flex';
            });
        });

      
        cancelBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });

       
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });

       
        saveBtn.addEventListener('click', function() {
           
            alert('Assignment saved successfully!');
            modal.style.display = 'none';
        });

        // Remove student functionality
        const removeButtons = document.querySelectorAll('.remove-btn');
        removeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const studentId = this.getAttribute('data-student-id');
                const studentName = this.getAttribute('data-student-name');
                
                if (confirm(`Are you sure you want to remove ${studentName}? This action cannot be undone and will delete all associated records (enrollments, drop requests, and user account).`)) {
                    // Create a form to submit DELETE request
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/admin/students/${studentId}`;
                    
                    // Add CSRF token
                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = '{{ csrf_token() }}';
                    form.appendChild(csrfInput);
                    
                    // Add method spoofing for DELETE
                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'DELETE';
                    form.appendChild(methodInput);
                    
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
        
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

