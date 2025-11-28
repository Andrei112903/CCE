<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UM Teacher Registration Portal</title>
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
        
        .left-section {
            background-image: url('/image/Rectangle 5.png');
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

        <!-- RIGHT SECTION: Teacher Registration Form -->
        <div class="right-section">
            <div class="registration-card">
                <!-- Placeholder for the UM Logo -->
                <img src="/image/um-seal.png" alt="UM Logo" class="um-logo">
                
                <h2 class="portal-title">Teacher Registration</h2>

                <h3 class="welcome-smu">Welcome, Future Educator!</h3>
                <p class="form-description">
                    Fill out the form to create your teacher account. Double-check your details before submitting.
                </p>

                <form class="registration-form" method="POST" action="{{ route('teacher.register.store') }}">
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
                    <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                    <input type="password" name="password" placeholder="Password (min. 8 characters)" required>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    <input type="text" name="mobile_number" placeholder="Mobile Number" value="{{ old('mobile_number') }}" required>
                    <select name="gender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>

                    <!-- 2. ADDRESS INFORMATION -->
                    <div class="form-group-header">
                        <span class="text-2xl">🏠</span> Address Information
                    </div>
                    <input type="text" name="street" placeholder="Street" value="{{ old('street') }}">
                    <input type="text" name="barangay" placeholder="Barangay" value="{{ old('barangay') }}">
                    <input type="text" name="city" placeholder="City" value="{{ old('city') }}">
                    <input type="text" name="province" placeholder="Province" value="{{ old('province') }}">
                    
                    <!-- Submit Button -->
                    <button type="submit" class="register-button">Register</button>
                </form>
                
                <p class="login-link-text">
                    Already have an account? <a href="/teacher/login">Login Here</a>
                </p>

            </div>
        </div>
    </div>
</body>
</html>






