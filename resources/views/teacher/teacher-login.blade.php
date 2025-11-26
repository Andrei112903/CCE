<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>UM Teacher Portal</title>
    <link rel="stylesheet" href="/css/loginstyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        .left-section {
            background-image: url('/image/Rectangle 5.png');
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <div class="overlay">
                <div class="welcome-content">
                    <h1>Welcome to <span class="um-color">UM</span></h1>
                    <p>Located in Tagum City, Davao del Norte, the University of Mindanao
                        Tagum Campus is a leading educational institution in the region.</p>
                </div>
            </div>
        </div>

        <div class="right-section">
            <div class="portal-card">
                <img src="/image/um-seal.png" alt="UM Logo" class="um-logo" style="border-radius: 50%; object-fit: cover;">
                <h2>Teacher Portal</h2>
                <p class="campus-name">Tagum Campus</p>
                
                <form method="POST" action="/teacher/login">
                    @csrf
                    
                    @if ($errors->any())
                        <div style="background-color: #fee; color: #c33; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-size: 14px;">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div style="background-color: #dfd; color: #3a3; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-size: 14px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email or Teacher ID Number" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" class="login-button">Login</button>
                </form>

                <p class="register-text">
                    If you're a new teacher, please create your account
                    to access your teacher portal. <a href="/teacher/register">Register Now</a>
                </p>
                <a href="#" class="forgot-password">Forgot your Password?</a>
            </div>
        </div>
    </div>
</body>
</html>

