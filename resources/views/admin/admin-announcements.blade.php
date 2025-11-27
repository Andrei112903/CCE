<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - Announcements</title>
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

                <div class="nav-section">
                    <div class="nav-section-title">Communication</div>
                    <a href="/admin/announcements" class="nav-item active">
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
                <h1 class="page-title">Announcements Management</h1>
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

            <div style="margin-bottom: 20px;">
                <button onclick="openAddModal()" style="background-color: #dc3545; color: white; border: none; padding: 12px 24px; border-radius: 4px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">
                    + Add Announcement
                </button>
            </div>

            
            <div class="course-table-container">
                <table class="teacher-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Date</th>
                            <th>Target Audience</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($announcements as $announcement)
                        <tr>
                            <td style="font-weight: 500;">{{ $announcement->title }}</td>
                            <td style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $announcement->content }}</td>
                            <td>{{ $announcement->date->format('M d, Y') }}</td>
                            <td>
                                <span style="padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 500; background-color: #e9ecef; color: #495057;">
                                    {{ $announcement->target_audience }}
                                </span>
                            </td>
                            <td>
                                <button class="change-button" onclick="editAnnouncement({{ $announcement->id }}, '{{ addslashes($announcement->title) }}', '{{ addslashes($announcement->content) }}', '{{ $announcement->date->format('Y-m-d') }}', '{{ $announcement->target_audience }}')" style="margin-right: 8px;">Edit</button>
                                <form method="POST" action="{{ route('admin.announcements.delete', $announcement->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this announcement?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="assign-button" style="background-color: #dc3545;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="padding: 40px 16px; text-align: center; color: #6c757d; font-size: 14px;">
                                No announcements found. Click "Add Announcement" to create one.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Add/Edit Announcement Modal -->
    <div id="announcementModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div style="background: white; border-radius: 8px; width: 90%; max-width: 600px; padding: 24px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-height: 90vh; overflow-y: auto;">
            <h2 id="modalTitle" style="margin: 0 0 20px 0; font-size: 20px; font-weight: 600; color: #212529; font-family: 'Inter', sans-serif;">Add Announcement</h2>
            <form id="announcementForm" method="POST" action="{{ route('admin.announcements.store') }}">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <input type="hidden" name="announcement_id" id="announcementId">
                
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #212529; font-family: 'Inter', sans-serif;">Title *</label>
                    <input type="text" name="title" id="modalTitleInput" required style="width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box;">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #212529; font-family: 'Inter', sans-serif;">Content *</label>
                    <textarea name="content" id="modalContentInput" required rows="5" style="width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box; resize: vertical;"></textarea>
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #212529; font-family: 'Inter', sans-serif;">Date *</label>
                    <input type="date" name="date" id="modalDateInput" required style="width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #212529; font-family: 'Inter', sans-serif;">Target Audience *</label>
                    <select name="target_audience" id="modalTargetInput" required style="width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box;">
                        <option value="All">All</option>
                        <option value="Students">Students</option>
                        <option value="Teachers">Teachers</option>
                        <option value="Admins">Admins</option>
                    </select>
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 12px;">
                    <button type="button" onclick="closeModal()" style="background-color: white; color: #212529; border: 1px solid #ced4da; padding: 10px 20px; border-radius: 4px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">Cancel</button>
                    <button type="submit" style="background-color: #dc3545; color: white; border: none; padding: 10px 20px; border-radius: 4px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">Save</button>
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
        
        // Modal functionality
        function refreshCSRFToken() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (csrfToken) {
                const token = csrfToken.getAttribute('content');
                const form = document.getElementById('announcementForm');
                const csrfInput = form.querySelector('input[name="_token"]');
                if (csrfInput) {
                    csrfInput.value = token;
                }
            }
        }
        
        function openAddModal() {
            const modal = document.getElementById('announcementModal');
            const form = document.getElementById('announcementForm');
            const modalTitle = document.getElementById('modalTitle');
            
            modalTitle.textContent = 'Add Announcement';
            form.action = '{{ route("admin.announcements.store") }}';
            form.method = 'POST';
            document.getElementById('formMethod').value = 'POST';
            document.getElementById('announcementId').value = '';
            document.getElementById('modalTitleInput').value = '';
            document.getElementById('modalContentInput').value = '';
            document.getElementById('modalDateInput').value = '';
            document.getElementById('modalTargetInput').value = 'All';
            
            // Refresh CSRF token
            refreshCSRFToken();
            
            modal.style.display = 'flex';
        }
        
        function editAnnouncement(id, title, content, date, targetAudience) {
            const modal = document.getElementById('announcementModal');
            const form = document.getElementById('announcementForm');
            const modalTitle = document.getElementById('modalTitle');
            
            modalTitle.textContent = 'Edit Announcement';
            form.action = '/admin/announcements/' + id;
            form.method = 'POST';
            document.getElementById('formMethod').value = 'PUT';
            document.getElementById('announcementId').value = id;
            document.getElementById('modalTitleInput').value = title;
            document.getElementById('modalContentInput').value = content;
            document.getElementById('modalDateInput').value = date;
            document.getElementById('modalTargetInput').value = targetAudience;
            
            // Refresh CSRF token
            refreshCSRFToken();
            
            modal.style.display = 'flex';
        }
        
        function closeModal() {
            document.getElementById('announcementModal').style.display = 'none';
        }
        
        // Close modal when clicking outside
        document.getElementById('announcementModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
        
        // Handle form submission with proper CSRF token handling
        document.getElementById('announcementForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const formData = new FormData(form);
            const method = formData.get('_method') || form.method;
            const action = form.action;
            
            // Get fresh CSRF token from meta tag
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            formData.set('_token', csrfToken);
            
            // Show loading state
            const submitButton = form.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.textContent = 'Saving...';
            
            // Determine the correct URL and method
            let url = action;
            if (method === 'PUT') {
                const announcementId = formData.get('announcement_id');
                url = '/admin/announcements/' + announcementId;
                formData.set('_method', 'PUT');
            }
            
            // Submit via fetch
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    return response.json().catch(() => {
                        // If response is not JSON, it's likely a redirect
                        window.location.reload();
                    });
                } else if (response.status === 419) {
                    // CSRF token expired, reload page
                    alert('Your session has expired. Please refresh the page and try again.');
                    window.location.reload();
                    return;
                } else {
                    return response.json().then(data => {
                        throw new Error(data.message || 'An error occurred');
                    });
                }
            })
            .then(data => {
                if (data) {
                    // Success - reload page to show updated announcements
                    window.location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error: ' + error.message);
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            });
        });
    </script>
</body>
</html>

