<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Subject</title>
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
                <h1 class="page-title">Admin</h1>
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
                <div style="background-color: #dfd; color: #3a3; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div style="background-color: #fee; color: #c33; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                    <strong>Please fix the following errors:</strong>
                    <ul style="margin: 8px 0 0 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

           
            <div style="margin-bottom: 20px;">
                <button id="addSubjectBtn" class="add-subject-button" style="background-color: #dc3545; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">
                    Add Subject
                </button>
            </div>

            
            <div class="course-table-container">
                <table class="teacher-table" style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <thead>
                        <tr style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef;">
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Subject Code</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Subject Title</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Description</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Program</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Year Level</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Units</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Term</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Schedule</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Room</th>
                            <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #495057; font-size: 14px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subjects as $subject)
                        <tr style="border-bottom: 1px solid #e9ecef;">
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">{{ $subject->code }}</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">{{ $subject->title }}</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px; max-width: 300px; word-wrap: break-word;">{{ $subject->description ?? '-' }}</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">{{ $subject->program ?? '-' }}</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">{{ $subject->year_level ?? '-' }}</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">{{ number_format($subject->units, 1) }}</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">{{ $subject->term ?? '-' }}</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">{{ $subject->schedule ?? '-' }}</td>
                            <td style="padding: 12px 16px; color: #212529; font-size: 14px;">{{ $subject->room ?? '-' }}</td>
                            <td style="padding: 12px 16px;">
                                <a href="{{ route('admin.subjects.view-students', $subject->id) }}" style="background-color: #007bff; color: white; border: none; padding: 6px 12px; border-radius: 4px; font-size: 12px; font-weight: 500; cursor: pointer; margin-right: 8px; font-family: 'Inter', sans-serif; text-decoration: none; display: inline-block;">View</a>
                                <button class="edit-subject-btn" 
                                    data-id="{{ $subject->id }}"
                                    data-code="{{ $subject->code }}"
                                    data-title="{{ $subject->title }}"
                                    data-units="{{ $subject->units }}"
                                    data-description="{{ $subject->description ?? '' }}"
                                    data-program="{{ $subject->program ?? '' }}"
                                    data-year-level="{{ $subject->year_level ?? '' }}"
                                    data-term="{{ $subject->term ?? '' }}"
                                    data-schedule="{{ $subject->schedule ?? '' }}"
                                    data-room="{{ $subject->room ?? '' }}"
                                    style="background-color: #28a745; color: white; border: none; padding: 6px 12px; border-radius: 4px; font-size: 12px; font-weight: 500; cursor: pointer; margin-right: 8px; font-family: 'Inter', sans-serif;">Edit</button>
                                <form method="POST" action="{{ route('admin.subjects.delete', $subject->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this subject?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background-color: #dc3545; color: white; border: none; padding: 6px 12px; border-radius: 4px; font-size: 12px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" style="padding: 40px 16px; text-align: center; color: #6c757d; font-size: 14px;">
                                No subjects added yet. Click "Add Subject" to create one.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    
    <div id="addSubjectModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div style="background: white; border-radius: 8px; width: 90%; max-width: 500px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden;">
           
            <div style="background-color: #dc3545; color: white; padding: 16px 20px; font-size: 18px; font-weight: 600; font-family: 'Inter', sans-serif;">
                Add New Subject
            </div>
            
            
            <div style="padding: 24px;">
                <h3 style="margin: 0 0 20px 0; font-size: 16px; font-weight: 600; color: #212529; font-family: 'Inter', sans-serif;">Subject Information</h3>
                
                @if ($errors->any())
                    <div style="background-color: #fee; color: #c33; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                        <strong>Please fix the following errors:</strong>
                        <ul style="margin: 8px 0 0 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div style="background-color: #dfd; color: #3a3; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                        {{ session('success') }}
                    </div>
                @endif
                
                <form id="addSubjectForm" method="POST" action="{{ route('admin.subjects.store') }}">
                    @csrf
                   
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Subject Code <span style="color: #dc3545;">*</span></label>
                        <input type="text" name="code" value="{{ old('code') }}" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box;">
                    </div>
                    
                    
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Subject Title <span style="color: #dc3545;">*</span></label>
                        <input type="text" name="title" value="{{ old('title') }}" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box;">
                    </div>
                    
                   
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Units <span style="color: #dc3545;">*</span></label>
                        <input type="number" name="units" value="{{ old('units') }}" step="0.1" min="0" max="10" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box;">
                    </div>
                    
                    
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Description</label>
                        <textarea name="description" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box; resize: vertical;">{{ old('description') }}</textarea>
                    </div>
                    
                    
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Course/Program</label>
                        <select name="program" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box; background-color: white;">
                            <option value="">Select Program</option>
                            <option value="BSIT" {{ old('program') == 'BSIT' ? 'selected' : '' }}>BS Information Technology</option>
                            <option value="BSCS" {{ old('program') == 'BSCS' ? 'selected' : '' }}>BS Computer Science</option>
                            <option value="BSEE" {{ old('program') == 'BSEE' ? 'selected' : '' }}>BS Electrical Engineering</option>
                            <option value="BSHRM" {{ old('program') == 'BSHRM' ? 'selected' : '' }}>BS Hotel and Restaurant Management</option>
                            <option value="BSED" {{ old('program') == 'BSED' ? 'selected' : '' }}>BSED - Secondary Education</option>
                            <option value="BSCRIM" {{ old('program') == 'BSCRIM' ? 'selected' : '' }}>BS in Criminology</option>
                            <option value="BSA" {{ old('program') == 'BSA' ? 'selected' : '' }}>BS in Accountancy</option>
                            <option value="BSBA" {{ old('program') == 'BSBA' ? 'selected' : '' }}>BS in Business Administration</option>
                        </select>
                    </div>
                    
                    
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Year Level</label>
                        <select name="year_level" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box; background-color: white;">
                            <option value="">Select Year Level</option>
                            <option value="1st Year" {{ old('year_level') == '1st Year' ? 'selected' : '' }}>1st Year</option>
                            <option value="2nd Year" {{ old('year_level') == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                            <option value="3rd Year" {{ old('year_level') == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                            <option value="4th Year" {{ old('year_level') == '4th Year' ? 'selected' : '' }}>4th Year</option>
                        </select>
                    </div>
                    
                   
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Term</label>
                        <select name="term" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box; background-color: white;">
                            <option value="">Select Term</option>
                            <option value="1st Term" {{ old('term') == '1st Term' ? 'selected' : '' }}>1st Term</option>
                            <option value="2nd Term" {{ old('term') == '2nd Term' ? 'selected' : '' }}>2nd Term</option>
                            <option value="Summer" {{ old('term') == 'Summer' ? 'selected' : '' }}>Summer</option>
                        </select>
                    </div>
                    
                    
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Schedule</label>
                        <input type="text" name="schedule" value="{{ old('schedule') }}" placeholder="e.g., M-SAT1, M-SAT" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box;">
                    </div>
                    
                    
                    <div style="margin-bottom: 24px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Room</label>
                        <input type="text" name="room" value="{{ old('room') }}" placeholder="e.g., Room 101, Lab 205" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box;">
                    </div>
                    
                    
                    <div style="display: flex; justify-content: flex-end; gap: 12px;">
                        <button type="button" id="cancelBtn" style="background-color: white; color: #212529; border: 1px solid #ced4da; padding: 10px 20px; border-radius: 4px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">
                            Cancel
                        </button>
                        <button type="submit" style="background-color: #dc3545; color: white; border: none; padding: 10px 20px; border-radius: 4px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Subject Modal -->
    <div id="editSubjectModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div style="background: white; border-radius: 8px; width: 90%; max-width: 500px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden;">
           
            <div style="background-color: #28a745; color: white; padding: 16px 20px; font-size: 18px; font-weight: 600; font-family: 'Inter', sans-serif;">
                Edit Subject
            </div>
            
            
            <div style="padding: 24px;">
                <h3 style="margin: 0 0 20px 0; font-size: 16px; font-weight: 600; color: #212529; font-family: 'Inter', sans-serif;">Subject Information</h3>
                
                <form id="editSubjectForm" method="POST">
                    @csrf
                    @method('PUT')
                   
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Subject Code <span style="color: #dc3545;">*</span></label>
                        <input type="text" id="edit-code" name="code" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box;">
                    </div>
                    
                    
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Subject Title <span style="color: #dc3545;">*</span></label>
                        <input type="text" id="edit-title" name="title" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box;">
                    </div>
                    
                   
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Units <span style="color: #dc3545;">*</span></label>
                        <input type="number" id="edit-units" name="units" step="0.1" min="0" max="10" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box;">
                    </div>
                    
                    
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Description</label>
                        <textarea id="edit-description" name="description" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box; resize: vertical;"></textarea>
                    </div>
                    
                    
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Course/Program</label>
                        <select id="edit-program" name="program" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box; background-color: white;">
                            <option value="">Select Program</option>
                            <option value="BSIT">BS Information Technology</option>
                            <option value="BSCS">BS Computer Science</option>
                            <option value="BSEE">BS Electrical Engineering</option>
                            <option value="BSHRM">BS Hotel and Restaurant Management</option>
                            <option value="BSED">BSED - Secondary Education</option>
                            <option value="BSCRIM">BS in Criminology</option>
                            <option value="BSA">BS in Accountancy</option>
                            <option value="BSBA">BS in Business Administration</option>
                        </select>
                    </div>
                    
                    
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Year Level</label>
                        <select id="edit-year-level" name="year_level" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box; background-color: white;">
                            <option value="">Select Year Level</option>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                        </select>
                    </div>
                    
                   
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Term</label>
                        <select id="edit-term" name="term" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box; background-color: white;">
                            <option value="">Select Term</option>
                            <option value="1st Term">1st Term</option>
                            <option value="2nd Term">2nd Term</option>
                            <option value="Summer">Summer</option>
                        </select>
                    </div>
                    
                    
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Schedule</label>
                        <input type="text" id="edit-schedule" name="schedule" placeholder="e.g., M-SAT1, M-SAT" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box;">
                    </div>
                    
                    
                    <div style="margin-bottom: 24px;">
                        <label style="display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; color: #495057; font-family: 'Inter', sans-serif;">Room</label>
                        <input type="text" id="edit-room" name="room" placeholder="e.g., Room 101, Lab 205" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: 'Inter', sans-serif; box-sizing: border-box;">
                    </div>
                    
                    
                    <div style="display: flex; justify-content: flex-end; gap: 12px;">
                        <button type="button" id="cancelEditBtn" style="background-color: white; color: #212529; border: 1px solid #ced4da; padding: 10px 20px; border-radius: 4px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">
                            Cancel
                        </button>
                        <button type="submit" style="background-color: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 4px; font-size: 14px; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif;">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        
        const modal = document.getElementById('addSubjectModal');
        const addSubjectBtn = document.getElementById('addSubjectBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const addSubjectForm = document.getElementById('addSubjectForm');
        
        const editModal = document.getElementById('editSubjectModal');
        const editSubjectForm = document.getElementById('editSubjectForm');
        const cancelEditBtn = document.getElementById('cancelEditBtn');
        const editButtons = document.querySelectorAll('.edit-subject-btn');

        
        addSubjectBtn.addEventListener('click', function() {
            modal.style.display = 'flex';
        });

        
        cancelBtn.addEventListener('click', function() {
            modal.style.display = 'none';
            addSubjectForm.reset();
        });

        
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.style.display = 'none';
                addSubjectForm.reset();
            }
        });

        
        addSubjectForm.addEventListener('submit', function(e) {
            // Let the form submit normally to the server
            // The modal will close after successful submission
        });
        
        // Edit button functionality
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const subjectId = this.getAttribute('data-id');
                
                // Set form action
                editSubjectForm.action = '/admin/subjects/' + subjectId;
                
                // Populate form fields
                document.getElementById('edit-code').value = this.getAttribute('data-code') || '';
                document.getElementById('edit-title').value = this.getAttribute('data-title') || '';
                document.getElementById('edit-units').value = this.getAttribute('data-units') || '';
                document.getElementById('edit-description').value = this.getAttribute('data-description') || '';
                document.getElementById('edit-program').value = this.getAttribute('data-program') || '';
                document.getElementById('edit-year-level').value = this.getAttribute('data-year-level') || '';
                document.getElementById('edit-term').value = this.getAttribute('data-term') || '';
                document.getElementById('edit-schedule').value = this.getAttribute('data-schedule') || '';
                document.getElementById('edit-room').value = this.getAttribute('data-room') || '';
                
                // Show edit modal
                editModal.style.display = 'flex';
            });
        });
        
        // Cancel edit button
        cancelEditBtn.addEventListener('click', function() {
            editModal.style.display = 'none';
            editSubjectForm.reset();
        });
        
        // Close edit modal when clicking outside
        editModal.addEventListener('click', function(e) {
            if (e.target === editModal) {
                editModal.style.display = 'none';
                editSubjectForm.reset();
            }
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

        // Cross-tab logout detection
        (function() {
            let lastLogoutCheck = localStorage.getItem('lastLogoutCheck') || 0;
            let checkInterval;

            function checkAuthStatus() {
                fetch('/admin/dashboard', {
                    method: 'HEAD',
                    credentials: 'same-origin',
                    headers: {'X-Requested-With': 'XMLHttpRequest'}
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
                if (!document.hidden) checkAuthStatus();
            });
            window.addEventListener('focus', checkAuthStatus);
        })();
    </script>
</body>
</html>

