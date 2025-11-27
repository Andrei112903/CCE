<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Reset Password - UM {{ ucfirst($type) }} Portal</title>
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
                    Enter your new password below.
                </p>
                
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="type" value="{{ $type }}">
                    
                    @if ($errors->any())
                        <div style="background-color: #fee; color: #c33; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-size: 14px;">
                            <ul style="margin: 0; padding-left: 20px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div style="background-color: #dfd; color: #3a3; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-size: 14px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <input type="email" value="{{ $email }}" disabled style="width: calc(100% - 20px); padding: 15px 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-size: 1em; background-color: #f5f5f5; color: #666; cursor: not-allowed;">
                    
                    <input type="password" name="password" placeholder="New Password" required autofocus>
                    <small style="display: block; color: #666; font-size: 0.85em; margin-bottom: 10px; text-align: left;">
                        Password must be at least 8 characters long.
                    </small>
                    
                    <input type="password" name="password_confirmation" placeholder="Confirm New Password" required>
                    
                    <button type="submit" class="login-button">Reset Password</button>
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

