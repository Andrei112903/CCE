<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Portal - Class List</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/teacher-dashboard.css">
    <style>
        .class-list-panel {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .class-list-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid #e5e7eb;
        }

        .class-list-icon {
            width: 24px;
            height: 24px;
            color: var(--um-red);
        }

        .class-list-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--um-dark-text);
        }

        .class-list-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .class-list-table thead {
            background-color: #f3f4f6;
        }

        .class-list-table th,
        .class-list-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        .class-list-table th {
            font-weight: 600;
            color: #4b5563;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .class-list-table tbody tr:last-child td {
            border-bottom: none;
        }

        .class-list-table tbody tr:hover {
            background-color: #f9fafb;
        }

        .view-btn {
            background-color: #22c55e;
            color: white;
            border: none;
            padding: 6px 16px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            transition: background-color 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }

        .view-btn:hover {
            background-color: #15803d;
        }

        @media (max-width: 768px) {
            .class-list-panel {
                padding: 16px;
            }

            .class-list-header {
                margin-bottom: 16px;
                padding-bottom: 12px;
            }

            .class-list-title {
                font-size: 16px;
            }

            .class-list-table {
                font-size: 12px;
                display: block;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .class-list-table thead,
            .class-list-table tbody {
                display: block;
            }

            .class-list-table th,
            .class-list-table td {
                padding: 8px 12px;
                min-width: 100px;
            }

            .view-btn {
                padding: 5px 12px;
                font-size: 11px;
            }
        }

        @media (max-width: 480px) {
            .class-list-panel {
                padding: 12px;
            }

            .class-list-table th,
            .class-list-table td {
                padding: 6px 8px;
                font-size: 11px;
            }

            .view-btn {
                padding: 4px 10px;
                font-size: 10px;
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
                <img src="/image/um-seal.png" alt="UM Tagum College Logo" class="sidebar-logo">
            </div>

            
            <nav class="nav-menu">
                <a href="/teacher/dashboard" class="nav-item">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Dashboard
                </a>

                <div class="nav-section">
                    <a href="/teacher/class-list" class="nav-item active">
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
            
            <header class="content-header">
                <h1 class="page-title">Teacher Portal</h1>
                <div class="user-info">
                    <div class="user-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <span class="user-name">{{ $user->name ?? ($teacher->first_name ?? 'Teacher') }}</span>
                </div>
            </header>

            
            <div class="class-list-panel">
                <div class="class-list-header">
                    <svg class="class-list-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <h2 class="class-list-title">Class List</h2>
                </div>

                <!-- Filter Section -->
                <div style="margin-bottom: 20px; display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
                    <form method="GET" action="{{ route('teacher.class-list') }}" style="display: flex; gap: 8px; align-items: center; flex: 1; min-width: 250px;">
                        <input 
                            type="text" 
                            name="filter_code" 
                            placeholder="Filter by Subject Code (e.g., 1297)" 
                            value="{{ $filterCode ?? '' }}"
                            style="flex: 1; padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; font-size: 14px; font-family: 'Inter', sans-serif;"
                        >
                        <button 
                            type="submit" 
                            style="padding: 8px 16px; background-color: #BC0000; color: white; border: none; border-radius: 6px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;"
                        >
                            Search
                        </button>
                        @if(!empty($filterCode))
                        <a 
                            href="{{ route('teacher.class-list') }}" 
                            style="padding: 8px 16px; background-color: #6c757d; color: white; border: none; border-radius: 6px; font-size: 14px; font-weight: 500; cursor: pointer; text-decoration: none; font-family: 'Inter', sans-serif;"
                        >
                            Clear
                        </a>
                        @endif
                    </form>
                </div>

                <table class="class-list-table">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Code</th>
                            <th>Description</th>
                            <th>No. of Student</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subjectsWithCounts as $item)
                        <tr>
                            <td>{{ $item['subject']->title }}</td>
                            <td>{{ $item['subject']->code }}</td>
                            <td style="color: #6c757d; max-width: 300px;">
                                {{ $item['subject']->description ?? 'No description' }}
                            </td>
                            <td>{{ $item['student_count'] }}</td>
                            <td>
                                <a href="{{ route('teacher.class-details', $item['subject']->id) }}" class="view-btn" style="text-decoration: none; display: inline-block;">View</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 24px; color: #6c757d;">
                                No subjects assigned yet.
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


