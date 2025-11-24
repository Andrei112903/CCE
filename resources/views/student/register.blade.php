<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UM Student Registration Portal</title>
    <!-- Load Tailwind CSS for utility classes -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Load the custom styles after Tailwind */
        @import url('/css/registerstyle.css');
        
        /* Load Inter font */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-gray-100">
    <!-- Main container for the split layout -->
    <div class="split-container">
        
        <!-- LEFT SECTION: Diagonal Image with Red Tint -->
        <div class="left-section">
            <div class="overlay">
                <div class="welcome-content">
                    <!-- 'UM' is wrapped in a span for red coloring -->
                    <h1>Welcome to <span class="um-color">UM</span></h1>
                    <p class="text-xl mt-4 max-w-sm">Located in Tagum City, Davao del Norte, the University of Mindanao
Tagum Campus is a leading educational institution in the region.</p>
                </div>
            </div>
        </div>

        <!-- RIGHT SECTION: Student Registration Form -->
        <div class="right-section">
            <div class="registration-card">
                <!-- Placeholder for the UM Logo -->
                <img src="image/um-seal.png" alt="UM Logo" class="um-logo">
                
                <h2 class="portal-title">Student Registration</h2>

                <h3 class="welcome-smu">Welcome, Future Student!</h3>
                <p class="form-description">
                    Fill out the form to create your student account. Double-check your details before submitting.
                </p>

                <form class="registration-form" method="POST" action="{{ route('register.store') }}">
                    @csrf
                    
                    @if ($errors->any())
                        <div class="error-message" style="background-color: #fee; color: #c33; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                            <strong>Please fix the following errors:</strong>
                            <ul style="margin: 8px 0 0 20px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="success-message" style="background-color: #dfd; color: #3a3; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <!-- 1. PERSONAL INFORMATION -->
                    <div class="form-group-header">
                        <span class="text-2xl">👤</span> Personal Information
                    </div>
                    <div class="name-fields">
                        <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
                        <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
                    </div>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    <input type="password" name="password" placeholder="Password (min. 8 characters)" required>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    <input type="text" name="contact" placeholder="Contact Number" value="{{ old('contact') }}" required>
                    <input type="date" name="birthday" title="Date of Birth" value="{{ old('birthday') }}" required>
                    <select name="gender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>

                    <!-- 2. ADDRESS INFORMATION -->
                    <div class="form-group-header">
                        <span class="text-2xl">🏠</span> Address Information
                    </div>
                    <input type="text" name="street" placeholder="Street / Barangay" value="{{ old('street') }}" required>
                    <input type="text" name="city" placeholder="City / Province" value="{{ old('city') }}" required>
                    <input type="text" name="zip_code" placeholder="ZIP Code" value="{{ old('zip_code') }}">

                    <!-- 3. EDUCATIONAL INFORMATION -->
                    <div class="form-group-header">
                        <span class="text-2xl">🎓</span> Educational Information
                    </div>
                    
                    <!-- Select Program Dropdown -->
                    <select name="program" required>
                        <option value="" disabled selected>Select Program</option>
                        <option value="BSIT" {{ old('program') == 'BSIT' ? 'selected' : '' }}>BS Information Technology</option>
                        <option value="BSCS" {{ old('program') == 'BSCS' ? 'selected' : '' }}>BS Computer Science</option>
                        <option value="BSEE" {{ old('program') == 'BSEE' ? 'selected' : '' }}>BS Electrical Engineering</option>
                        <option value="BSHRM" {{ old('program') == 'BSHRM' ? 'selected' : '' }}>BS Hotel and Restaurant Management</option>
                        <option value="BSED" {{ old('program') == 'BSED' ? 'selected' : '' }}>BSED - Secondary Education</option>
                        <option value="BSCRIM" {{ old('program') == 'BSCRIM' ? 'selected' : '' }}>BS in Criminology</option>
                        <option value="BSA" {{ old('program') == 'BSA' ? 'selected' : '' }}>BS in Accountancy</option>
                        <option value="BSBA" {{ old('program') == 'BSBA' ? 'selected' : '' }}>BS in Business Administration</option>
                    </select>
                    
                    <input type="text" name="year_level" placeholder="Year Level (e.g., 1st Year)" value="{{ old('year_level') }}" required>

                    <!-- 4. PARENT/GUARDIAN INFORMATION -->
                    <div class="form-group-header">
                        <span class="text-2xl">👨‍👩‍👧</span> Parent/Guardian Information
                    </div>
                    <input type="text" name="parent_name" placeholder="Parent/Guardian Name" value="{{ old('parent_name') }}" required>
                    <input type="text" name="parent_contact" placeholder="Parent/Guardian Contact Number" value="{{ old('parent_contact') }}" required>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="register-button">Register</button>
                </form>
                
                <p class="login-link-text">
                    Already have an account? <a href="/login">Login Here</a>
                </p>

            </div>
        </div>
    </div>
</body>
</html>