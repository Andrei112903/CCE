<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Forgot Password - UM {{ ucfirst($type) }} Portal</title>
    <link rel="stylesheet" href="/css/loginstyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
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
                <img src="/image/um-seal.png" alt="UM Logo" class="um-logo">
                <h2>{{ ucfirst($type) }} Portal</h2>
                <p class="campus-name">Tagum Campus</p>
                <p style="color: #666; font-size: 0.95em; margin-bottom: 25px;">
                    Enter your email address and we'll help you reset your password.
                </p>
                
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <input type="hidden" name="type" value="{{ $type }}">
                    
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

                    @if (session('info'))
                        <div style="background-color: #e3f2fd; color: #1976d2; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-size: 14px;">
                            {{ session('info') }}
                        </div>
                    @endif

                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email or {{ ucfirst($type) }} ID Number" required autofocus>
                    
                    <button type="submit" class="login-button">Send Password Reset Link</button>
                </form>

                <div style="margin-top: 20px; text-align: center;">
                    <a href="{{ $type === 'teacher' ? route('teacher.login') : route('login') }}" style="color: var(--um-red); text-decoration: none; font-size: 0.9em;">
                        ← Back to Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


