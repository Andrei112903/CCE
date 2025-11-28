<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Teacher Portal - Profile Settings</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/teacher-dashboard.css">
    <style>
        .profile-container {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .profile-summary {
            background: white;
            border-radius: 12px;
            padding: 32px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            text-align: center;
            margin-bottom: 24px;
        }

        .profile-picture-section {
            margin-bottom: 24px;
            text-align: center;
        }

        .profile-picture-edit {
            display: inline-block;
        }

        .view-mode .view-mode-content {
            display: block;
        }

        .view-mode .edit-mode-content {
            display: none;
        }

        .edit-mode .view-mode-content {
            display: none;
        }

        .edit-mode .edit-mode-content {
            display: block;
        }

        .profile-picture {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            margin: 0 auto;
        }

        .profile-picture-edit {
            position: relative;
            display: inline-block;
            margin: 0 auto;
            width: 120px;
            height: 120px;
        }

        .camera-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 36px;
            height: 36px;
            background-color: #3b82f6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            border: 3px solid white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            transition: background-color 0.2s ease;
        }

        .camera-icon:hover {
            background-color: #2563eb;
        }

        .camera-icon input[type="file"] {
            display: none;
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .camera-icon svg {
            width: 24px;
            height: 24px;
            color: #3b82f6;
            stroke-width: 2;
        }

        .edit-mode .profile-picture-edit {
            display: block;
        }


        .profile-name {
            font-size: 24px;
            font-weight: 700;
            color: var(--um-dark-text);
            margin-bottom: 8px;
        }

        .profile-email-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .profile-email {
            font-size: 16px;
            color: var(--um-dark-text);
        }

        .edit-icon {
            width: 18px;
            height: 18px;
            color: var(--um-red);
            cursor: pointer;
        }

        .info-section {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--um-dark-text);
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .info-field {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .field-label {
            font-size: 12px;
            font-weight: 500;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .field-value {
            font-size: 14px;
            font-weight: 600;
            color: var(--um-dark-text);
        }

        .field-input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            color: var(--um-dark-text);
            background-color: white;
            transition: border-color 0.2s ease;
        }

        .field-input:focus {
            outline: none;
            border-color: var(--um-red);
        }

        .field-input select {
            cursor: pointer;
        }

        .save-button {
            background-color: var(--um-red);
            color: white;
            border: none;
            padding: 12px 32px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            transition: background-color 0.2s ease;
            margin-right: 12px;
        }

        .save-button:hover {
            background-color: var(--um-dark-red);
        }

        .cancel-button {
            background-color: white;
            color: var(--um-dark-text);
            border: 1px solid #d1d5db;
            padding: 12px 32px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            transition: background-color 0.2s ease;
        }

        .cancel-button:hover {
            background-color: #f3f4f6;
        }

        .button-group {
            display: flex;
            align-items: center;
            margin-top: 24px;
        }

        .profile-form {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .profile-summary {
                padding: 24px;
            }

            .info-section {
                padding: 20px;
            }

            .profile-form {
                padding: 20px;
            }

            .button-group {
                flex-direction: column;
                gap: 12px;
            }

            .save-button,
            .cancel-button {
                width: 100%;
                margin-right: 0;
            }

            .profile-picture {
                width: 100px;
                height: 100px;
            }

            .camera-icon {
                width: 28px;
                height: 28px;
            }

            .camera-icon svg {
                width: 20px;
                height: 20px;
            }
        }

        @media (max-width: 480px) {
            .profile-summary {
                padding: 16px;
            }

            .profile-name {
                font-size: 20px;
            }

            .profile-email {
                font-size: 14px;
            }

            .info-section {
                padding: 16px;
            }

            .profile-form {
                padding: 16px;
            }

            .section-title {
                font-size: 16px;
            }

            .field-label {
                font-size: 11px;
            }

            .field-input {
                font-size: 13px;
                padding: 8px 10px;
            }

            .save-button,
            .cancel-button {
                padding: 10px 24px;
                font-size: 14px;
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
                    <a href="/teacher/class-list" class="nav-item">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Class List
                    </a>
                </div>

                <div class="nav-section">
                    <a href="/teacher/profile" class="nav-item active">
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
                    <span class="user-name">{{ $teacher->first_name ?? $user->name }}</span>
                </div>
            </header>

            
            <div class="profile-container view-mode" id="profileContainer">
                
                <!-- View Mode -->
                <div class="profile-summary view-mode-content">
                    <div class="profile-picture">
                        @if($teacher->profile_picture)
                            <img src="{{ asset('storage/' . $teacher->profile_picture) }}" alt="Profile Picture" id="profilePictureView">
                        @else
                            <div style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%; background-color: #e5e7eb; color: #6b7280; font-size: 48px;">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 60px; height: 60px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="profile-name">{{ $teacher->first_name }} {{ $teacher->last_name }}</div>
                    <div class="profile-email-container">
                        <span class="profile-email">{{ $teacher->email }}</span>
                        <svg class="edit-icon" id="editIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                </div>

                <div class="info-section view-mode-content">
                    <h2 class="section-title">Personal Information</h2>
                    <div class="info-grid">
                        <div class="info-field">
                            <div class="field-label">First Name</div>
                            <div class="field-value">{{ $teacher->first_name }}</div>
                        </div>
                        <div class="info-field">
                            <div class="field-label">Last Name</div>
                            <div class="field-value">{{ $teacher->last_name }}</div>
                        </div>
                        <div class="info-field">
                            <div class="field-label">Email</div>
                            <div class="field-value">{{ $teacher->email }}</div>
                        </div>
                        <div class="info-field">
                            <div class="field-label">Gender</div>
                            <div class="field-value">{{ $teacher->gender }}</div>
                        </div>
                        <div class="info-field">
                            <div class="field-label">Mobile Number</div>
                            <div class="field-value">{{ $teacher->mobile_number }}</div>
                        </div>
                    </div>
                </div>

                <div class="info-section view-mode-content">
                    <h2 class="section-title">Address</h2>
                    <div class="info-grid">
                        <div class="info-field">
                            <div class="field-label">Street</div>
                            <div class="field-value">{{ $teacher->street ?? '-' }}</div>
                        </div>
                        <div class="info-field">
                            <div class="field-label">Barangay</div>
                            <div class="field-value">{{ $teacher->barangay ?? '-' }}</div>
                        </div>
                        <div class="info-field">
                            <div class="field-label">City</div>
                            <div class="field-value">{{ $teacher->city ?? '-' }}</div>
                        </div>
                        <div class="info-field">
                            <div class="field-label">Province</div>
                            <div class="field-value">{{ $teacher->province ?? '-' }}</div>
                        </div>
                    </div>
                </div>

                <!-- Edit Mode -->
                <div class="profile-form edit-mode-content">
                    <div class="profile-picture-section">
                        <div class="profile-picture-edit">
                            <div class="profile-picture" id="profilePictureEdit">
                                @if($teacher->profile_picture)
                                    <img src="{{ asset('storage/' . $teacher->profile_picture) }}" alt="Profile Picture" id="profilePictureEditImg">
                                @else
                                    <div style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%; background-color: #e5e7eb; color: #6b7280; font-size: 48px;">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 60px; height: 60px;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="camera-icon" id="cameraIcon">
                                <input type="file" id="profilePictureInput" accept="image/*" style="display: none;">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 20px; height: 20px; color: white;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    
                    <div class="info-section">
                        <h2 class="section-title">Personal Information</h2>
                        <div class="info-grid">
                            <div class="info-field">
                                <div class="field-label">First Name</div>
                                <input type="text" class="field-input" value="{{ $teacher->first_name }}" id="firstName">
                            </div>
                            <div class="info-field">
                                <div class="field-label">Last Name</div>
                                <input type="text" class="field-input" value="{{ $teacher->last_name }}" id="lastName">
                            </div>
                            <div class="info-field">
                                <div class="field-label">Email</div>
                                <input type="email" class="field-input" value="{{ $teacher->email }}" id="email">
                            </div>
                            <div class="info-field">
                                <div class="field-label">Gender</div>
                                <select class="field-input" id="gender">
                                    <option value="Male" {{ $teacher->gender === 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $teacher->gender === 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <div class="info-field">
                                <div class="field-label">Mobile Number</div>
                                <input type="text" class="field-input" value="{{ $teacher->mobile_number }}" id="mobileNumber">
                            </div>
                        </div>
                    </div>

                    
                    <div class="info-section">
                        <h2 class="section-title">Address</h2>
                        <div class="info-grid">
                            <div class="info-field">
                                <div class="field-label">Street</div>
                                <input type="text" class="field-input" value="{{ $teacher->street ?? '' }}" id="street">
                            </div>
                            <div class="info-field">
                                <div class="field-label">Barangay</div>
                                <input type="text" class="field-input" value="{{ $teacher->barangay ?? '' }}" id="barangay">
                            </div>
                            <div class="info-field">
                                <div class="field-label">City</div>
                                <input type="text" class="field-input" value="{{ $teacher->city ?? '' }}" id="city">
                            </div>
                            <div class="info-field">
                                <div class="field-label">Province</div>
                                <input type="text" class="field-input" value="{{ $teacher->province ?? '' }}" id="province">
                            </div>
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="button" class="save-button" id="saveButton">Save</button>
                        <button type="button" class="cancel-button" id="cancelButton">Cancel</button>
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

        // Profile picture upload
        const cameraIcon = document.getElementById('cameraIcon');
        const profilePictureInput = document.getElementById('profilePictureInput');
        const profilePictureEdit = document.getElementById('profilePictureEdit');
        const profilePictureEditImg = document.getElementById('profilePictureEditImg');
        let selectedProfilePicture = null;

        if (cameraIcon && profilePictureInput) {
            cameraIcon.addEventListener('click', function() {
                profilePictureInput.click();
            });

            profilePictureInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Validate file type
                    if (!file.type.startsWith('image/')) {
                        alert('Please select an image file.');
                        return;
                    }

                    // Validate file size (2MB max)
                    if (file.size > 2 * 1024 * 1024) {
                        alert('Image size must be less than 2MB.');
                        return;
                    }

                    selectedProfilePicture = file;

                    // Preview the image
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        if (profilePictureEditImg) {
                            profilePictureEditImg.src = e.target.result;
                        } else {
                            // Create img element if it doesn't exist
                            const img = document.createElement('img');
                            img.id = 'profilePictureEditImg';
                            img.src = e.target.result;
                            img.alt = 'Profile Picture';
                            img.style.width = '100%';
                            img.style.height = '100%';
                            img.style.objectFit = 'cover';
                            img.style.borderRadius = '50%';
                            profilePictureEdit.innerHTML = '';
                            profilePictureEdit.appendChild(img);
                        }
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Edit mode toggle
        const editIcon = document.getElementById('editIcon');
        const profileContainer = document.getElementById('profileContainer');
        const saveButton = document.getElementById('saveButton');
        const cancelButton = document.getElementById('cancelButton');
        
        if (editIcon) {
            editIcon.addEventListener('click', function() {
                profileContainer.classList.remove('view-mode');
                profileContainer.classList.add('edit-mode');
                // Reset file input when entering edit mode
                if (profilePictureInput) {
                    profilePictureInput.value = '';
                    selectedProfilePicture = null;
                }
            });
        }

        // Cancel button functionality
        if (cancelButton) {
            cancelButton.addEventListener('click', function() {
                // Switch back to view mode without saving
                profileContainer.classList.remove('edit-mode');
                profileContainer.classList.add('view-mode');
                // Reset file input
                if (profilePictureInput) {
                    profilePictureInput.value = '';
                    selectedProfilePicture = null;
                }
            });
        }

        // Save button functionality
        if (saveButton) {
            saveButton.addEventListener('click', function() {
                // Get all input values
                const firstName = document.getElementById('firstName').value.trim();
                const lastName = document.getElementById('lastName').value.trim();
                const email = document.getElementById('email').value.trim();
                const gender = document.getElementById('gender').value;
                const mobileNumber = document.getElementById('mobileNumber').value.trim();
                const street = document.getElementById('street').value.trim();
                const barangay = document.getElementById('barangay').value.trim();
                const city = document.getElementById('city').value.trim();
                const province = document.getElementById('province').value.trim();

                // Disable save button during submission
                saveButton.disabled = true;
                saveButton.textContent = 'Saving...';

                // Get CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

                // Prepare form data
                const formData = new FormData();
                formData.append('first_name', firstName);
                formData.append('last_name', lastName);
                formData.append('email', email);
                formData.append('gender', gender);
                formData.append('mobile_number', mobileNumber);
                formData.append('street', street);
                formData.append('barangay', barangay);
                formData.append('city', city);
                formData.append('province', province);
                
                // Add profile picture if selected
                if (selectedProfilePicture) {
                    formData.append('profile_picture', selectedProfilePicture);
                }
                
                if (csrfToken) {
                    formData.append('_token', csrfToken);
                }

                // Send update request
                fetch('/teacher/profile', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => {
                    return response.json().then(data => {
                        if (!response.ok) {
                            // Handle validation errors
                            if (data.errors) {
                                const errorMessages = Object.values(data.errors).flat().join(', ');
                                throw new Error(errorMessages || data.error || 'Validation failed');
                            }
                            throw new Error(data.error || 'Server error');
                        }
                        return data;
                    });
                })
                .then(data => {
                    console.log('Response data:', data);
                    if (data.success) {
                        // Check if profile picture was uploaded
                        const profilePictureUploaded = selectedProfilePicture !== null;
                        console.log('Profile picture uploaded:', profilePictureUploaded);
                        console.log('Profile picture path:', data.teacher?.profile_picture);
                        
                        // Reset file input
                        if (profilePictureInput) {
                            profilePictureInput.value = '';
                            selectedProfilePicture = null;
                        }

                        // Show success message
                        alert('Profile updated successfully!');
                        
                        // Always reload page to ensure all changes are reflected, especially profile picture
                        window.location.reload();
                    } else {
                        alert('Error: ' + (data.error || 'Failed to update profile'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred: ' + error.message);
                })
                .finally(() => {
                    // Re-enable save button
                    saveButton.disabled = false;
                    saveButton.textContent = 'Save';
                });
            });
        }

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

