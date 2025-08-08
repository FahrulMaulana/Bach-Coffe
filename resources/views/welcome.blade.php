<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bach Coffee - Login</title>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --cream-primary: #f5f1eb;
            --cream-secondary: #ede7dc;
            --cream-light: #faf8f5;
            --cream-dark: #e8e0d2;
            --red-primary: #dc2626;
            --red-secondary: #b91c1c;
            --red-light: #fee2e2;
            --red-dark: #991b1b;
            --red-gradient: linear-gradient(135deg, #dc2626 0%, #b91c1c 50%, #991b1b 100%);
            --cream-gradient: linear-gradient(135deg, #f5f1eb 0%, #ede7dc 50%, #e8e0d2 100%);
            --modern-shadow: 0 10px 40px rgba(220, 38, 38, 0.15);
            --modern-shadow-lg: 0 20px 60px rgba(220, 38, 38, 0.2);
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --border-radius: 16px;
            --border-radius-lg: 24px;
            --success-green: #228B22;
            --danger-red: #DC143C;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif !important;
        }

        body {
            font-family: 'Poppins', sans-serif !important;
            background: var(--cream-light) !important;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><g fill="%23f5f1eb" fill-opacity="0.03"><circle cx="50" cy="50" r="40"/><circle cx="20" cy="20" r="15"/><circle cx="80" cy="80" r="15"/><circle cx="80" cy="20" r="10"/><circle cx="20" cy="80" r="10"/></g></svg>') repeat;
            background-size: 200px 200px;
            z-index: -1;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid var(--cream-dark);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--modern-shadow-lg);
            padding: 3rem 2.5rem;
            width: 100%;
            max-width: 450px;
            position: relative;
            overflow: hidden;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--red-gradient);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .login-title {
            color: var(--red-primary);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .coffee-icon {
            font-size: 2.2rem;
            color: var(--red-secondary);
            animation: steam 2s ease-in-out infinite alternate;
        }

        @keyframes steam {
            0% { transform: translateY(0px) rotate(0deg); opacity: 1; }
            100% { transform: translateY(-3px) rotate(2deg); opacity: 0.8; }
        }

        .login-subtitle {
            color: var(--text-secondary);
            font-size: 0.95rem;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            color: var(--text-primary);
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .input-group {
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--modern-shadow);
            transition: all 0.3s ease;
        }

        .input-group:focus-within {
            box-shadow: var(--modern-shadow-lg);
            transform: translateY(-1px);
        }

        .input-group-text {
            background: var(--red-gradient);
            color: white;
            border: none;
            padding: 0.75rem 1rem;
            font-size: 1.1rem;
        }

        .form-control {
            border: none;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            background: rgba(245, 241, 235, 0.5);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: white;
            box-shadow: none;
            border: none;
        }

        .btn-login {
            background: var(--red-gradient) !important;
            border: none !important;
            border-radius: var(--border-radius) !important;
            padding: 12px 30px !important;
            font-weight: 600 !important;
            font-size: 1rem;
            color: white;
            width: 100%;
            margin: 1rem 0;
            transition: all 0.3s ease !important;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: var(--modern-shadow);
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--cream-dark);
        }

        .register-link a {
            color: var(--red-primary);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .register-link a:hover {
            color: var(--red-secondary);
            text-decoration: underline;
        }

        .alerts {
            position: fixed;
            top: 2rem;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            max-width: 500px;
            z-index: 1050;
        }

        .alert {
            border: none;
            border-radius: var(--border-radius);
            padding: 1rem 1.5rem;
            margin-bottom: 1rem;
            font-weight: 500;
            box-shadow: var(--modern-shadow);
            backdrop-filter: blur(10px);
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(220, 38, 38, 0.9), rgba(185, 28, 28, 0.9));
            color: white;
            border-left: 4px solid var(--danger-red);
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(34, 139, 34, 0.9), rgba(46, 125, 50, 0.9));
            color: white;
            border-left: 4px solid var(--success-green);
        }

        @media (max-width: 576px) {
            .login-card {
                padding: 2rem 1.5rem;
                margin: 1rem;
            }
            
            .login-title {
                font-size: 1.7rem;
            }
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(245, 241, 235, 0.95);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            backdrop-filter: blur(5px);
        }

        .coffee-loading {
            text-align: center;
            color: var(--red-primary);
        }

        .coffee-loading i {
            font-size: 3rem;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="coffee-loading">
            <i class="bi bi-cup-hot"></i>
            <div class="mt-2">Loading...</div>
        </div>
    </div>

    <!-- Alert Section -->
    <div class="alerts">
        @if ($errors->any())
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <div class="flex-grow-1">
                    <ul class="mb-0 list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <div class="flex-grow-1">{{ session('error') }}</div>
                <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <div class="flex-grow-1">{{ session('success') }}</div>
                <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h1 class="login-title">
                    <i class="bi bi-cup-hot coffee-icon"></i>
                    Bach Coffee
                </h1>
                <p class="login-subtitle">Welcome back! Please sign in to your account</p>
            </div>

            <form action="{{ route('postlogin') }}" method="POST" id="loginForm">
                @csrf
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input type="text" 
                               id="username" 
                               name="username" 
                               class="form-control" 
                               placeholder="Enter your username" 
                               required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-lock-fill"></i>
                        </span>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="form-control" 
                               placeholder="Enter your password" 
                               required>
                    </div>
                </div>

                <button type="submit" class="btn btn-login">
                    <i class="bi bi-box-arrow-in-right me-2"></i>
                    Sign In
                </button>
            </form>

            <div class="register-link">
                <small>Don't have an account? <a href="{{ route('register') }}">Create one here</a></small>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-dismiss alerts
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const closeButton = alert.querySelector('[data-bs-dismiss="alert"]');
                if (closeButton) {
                    closeButton.click();
                }
            });
        }, 5000);

        // Form submission with loading
        document.getElementById('loginForm').addEventListener('submit', function() {
            document.getElementById('loadingOverlay').style.display = 'flex';
        });

        // Input focus effects
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Button ripple effect
        document.querySelector('.btn-login').addEventListener('click', function(e) {
            const button = e.currentTarget;
            const ripple = document.createElement('span');
            const rect = button.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s ease-out;
                pointer-events: none;
            `;
            
            button.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });

        // Add ripple animation CSS
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
