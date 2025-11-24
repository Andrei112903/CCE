<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Student Grades</title>
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
                    <a href="/admin/grades" class="nav-item active">
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
                <h1 class="page-title">Student Grades</h1>
                <div class="user-info">
                    <div class="user-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <span class="user-name">Ninfuy</span>
                </div>
            </header>

            
            <div style="margin-bottom: 24px; position: relative; max-width: 500px;">
                <input type="text" id="searchInput" placeholder="Search students..." style="width: 100%; padding: 12px 45px 12px 16px; border: 1px solid #ced4da; border-radius: 8px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box; background-color: white;">
                <svg style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px; color: #6c757d; pointer-events: none;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            
            <div class="course-table-container">
                <table class="teacher-table" style="width: 100%; border-collapse: collapse; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);">
                    <thead>
                        <tr style="background-color: #f3f4f6;">
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #4b5563; font-size: 12px; text-transform: uppercase; letter-spacing: 0.03em;">Student ID</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #4b5563; font-size: 12px; text-transform: uppercase; letter-spacing: 0.03em;">Student Name</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #4b5563; font-size: 12px; text-transform: uppercase; letter-spacing: 0.03em;">Year Level</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #4b5563; font-size: 12px; text-transform: uppercase; letter-spacing: 0.03em;">Email</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #4b5563; font-size: 12px; text-transform: uppercase; letter-spacing: 0.03em;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid #e5e7eb;" class="student-row">
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">144432</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">James Paul Silayan</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">Grade 11</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">ambot@gmail.com</td>
                            <td style="padding: 12px 16px;">
                                <button class="view-grades-btn" style="background-color: #22c55e; color: white; border: none; padding: 6px 16px; border-radius: 4px; font-size: 12px; font-weight: 600; cursor: pointer; font-family: 'Inter', sans-serif; transition: background-color 0.2s;">View</button>
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid #e5e7eb;" class="student-row">
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">144434</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">Nino Malavar</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">3rd Year</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">ambot@gmail.com</td>
                            <td style="padding: 12px 16px;">
                                <button class="view-grades-btn" style="background-color: #22c55e; color: white; border: none; padding: 6px 16px; border-radius: 4px; font-size: 12px; font-weight: 600; cursor: pointer; font-family: 'Inter', sans-serif; transition: background-color 0.2s;">View</button>
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid #e5e7eb;" class="student-row">
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">144412</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">Ninong Castador</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">2nd Year</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">ambot@gmail.com</td>
                            <td style="padding: 12px 16px;">
                                <button class="view-grades-btn" style="background-color: #22c55e; color: white; border: none; padding: 6px 16px; border-radius: 4px; font-size: 12px; font-weight: 600; cursor: pointer; font-family: 'Inter', sans-serif; transition: background-color 0.2s;">View</button>
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid #e5e7eb;" class="student-row">
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">144121</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">Niiro Ladesma</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">3rd Year</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">ambot@gmail.com</td>
                            <td style="padding: 12px 16px;">
                                <button class="view-grades-btn" style="background-color: #22c55e; color: white; border: none; padding: 6px 16px; border-radius: 4px; font-size: 12px; font-weight: 600; cursor: pointer; font-family: 'Inter', sans-serif; transition: background-color 0.2s;">View</button>
                            </td>
                        </tr>
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

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const studentRows = document.querySelectorAll('.student-row');

        if (searchInput) {
            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase().trim();
                
                studentRows.forEach(function(row) {
                    const text = row.textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }

        // View button hover effect
        const viewButtons = document.querySelectorAll('.view-grades-btn');
        viewButtons.forEach(function(btn) {
            btn.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#16a34a';
            });
            btn.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '#22c55e';
            });
            btn.addEventListener('click', function() {
                // Add functionality to view student grades
                alert('View grades functionality will be implemented here');
            });
        });
    </script>
</body>
</html>

