<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - EDUSENSE</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .left-panel {
            background: linear-gradient(135deg, #41e472, #22c98c);
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            position: relative;
            padding: 0 4rem;
        }

        .left-panel::before,
        .left-panel::after {
            content: "";
            position: absolute;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .left-panel::before {
            width: 300px;
            height: 300px;
            top: 10%;
            left: 10%;
            z-index: 0;
        }

        .left-panel::after {
            width: 200px;
            height: 200px;
            bottom: 10%;
            right: 10%;
            z-index: 0;
        }

        .logo {
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            font-size: 2rem;
            font-weight: bold;
            z-index: 1;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background-color: white;
            clip-path: polygon(0 0, 100% 0, 100% 100%, 30% 100%, 30% 50%, 0 50%);
            margin-right: 10px;
        }

        .welcome-text {
            text-align: center;
            margin-bottom: 2rem;
            z-index: 1;
        }

        .welcome-text h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .welcome-text p {
            font-size: 1rem;
            max-width: 400px;
            line-height: 1.6;
        }

        .features {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 2rem;
            width: 80%;
            max-width: 450px;
            z-index: 1;
        }

        .feature {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .feature:last-child {
            margin-bottom: 0;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }

        .feature-text {
            flex: 1;
        }

        .feature-text h3 {
            font-size: 1.1rem;
            margin-bottom: 0.3rem;
        }

        .feature-text p {
            font-size: 0.85rem;
            opacity: 0.9;
        }

        .right-panel {
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            background-color: #f5f5f5;
        }

        .register-form {
            width: 100%;
            max-width: 400px;
            background-color: white;
            border-radius: 10px;
            padding: 2.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .register-form h2 {
            text-align: center;
            margin-bottom: 0.5rem;
            color: #333;
            font-size: 1.8rem;
        }

        .register-form p {
            text-align: center;
            margin-bottom: 2rem;
            color: #777;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9rem;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #22c98c;
            outline: none;
        }

        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
        }

        .btn-submit {
            width: 100%;
            padding: 0.8rem;
            background-color: #22c98c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #1daa7a;
        }

        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
            color: #666;
        }

        .register-link a {
            color: #22c98c;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .social-login {
            margin-top: 2rem;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .social-login p {
            margin-bottom: 1rem;
            color: #888;
            font-size: 0.9rem;
            position: relative;
        }

        .social-login p::before,
        .social-login p::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 30%;
            height: 1px;
            background-color: #ddd;
        }

        .social-login p::before {
            left: 0;
        }

        .social-login p::after {
            right: 0;
        }

        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .social-button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.6rem 1.5rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .social-button:hover {
            background-color: #f9f9f9;
        }

        .social-button img {
            width: 20px;
            height: 20px;
            margin-right: 0.5rem;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        .role-select {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9rem;
            background-color: white;
            transition: border-color 0.3s;
        }

        .role-select:focus {
            border-color: #22c98c;
            outline: none;
        }

        @media (max-width: 992px) {
            body {
                flex-direction: column;
                overflow-y: auto;
            }

            .left-panel,
            .right-panel {
                width: 100%;
                height: auto;
                padding: 3rem 1.5rem;
            }

            .left-panel {
                padding-bottom: 2rem;
            }

            .right-panel {
                padding-top: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="left-panel">
        <div class="logo">
            <div class="logo-icon"></div>
            EDUSENSE
        </div>
        <div class="welcome-text">
            <h1>Welcome!</h1>
            <p>Smart learning starts here. Unlock your potential with our intelligent learning platform designed for your success.</p>
        </div>
        <div class="features">
            <div class="feature">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <div class="feature-text">
                    <h3>Personalized Learning</h3>
                    <p>tailored to your unique needs</p>
                </div>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                    </svg>
                </div>
                <div class="feature-text">
                    <h3>Smart Analytics</h3>
                    <p>Track your progress with AI insights</p>
                </div>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <div class="feature-text">
                    <h3>Collaborative Learning</h3>
                    <p>Learn better together</p>
                </div>
            </div>
        </div>
    </div>
    <div class="right-panel">
        <div class="register-form">
            <h2>Sign Up</h2>
            <p>Create your account to access our platform</p>

            @if ($errors->any())
                <div class="alert">
                    <ul style="margin: 0; padding-left: 1rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <div class="password-container">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <span class="password-toggle" onclick="togglePassword('password')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="password-container">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                        <span class="password-toggle" onclick="togglePassword('password_confirmation')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <select class="role-select" id="role" name="role" required>
                        <option value="user" selected>User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn-submit">Sign Up</button>
                <div class="register-link">
                    Already have an account? <a href="{{ route('login') }}">Sign In</a>
                </div>
            </form>
        </div>
        <div class="social-login">
            <p>Or continue with</p>
            <div class="social-buttons">
                <button class="social-button">
                    <img src="https://cdn-icons-png.flaticon.com/512/2991/2991148.png" alt="Google">
                    Google
                </button>
                <button class="social-button">
                    <img src="https://cdn-icons-png.flaticon.com/512/5968/5968764.png" alt="Facebook">
                    Facebook
                </button>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
    </script>
</body>
</html>