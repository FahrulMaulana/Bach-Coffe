<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            font-family: 'Arial', sans-serif;
        }
        .card {
            border: none;
            border-radius: 15px;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-primary {
            background: #6e8efb;
            border: none;
            border-radius: 10px;
        }
        .btn-primary:hover {
            background: #a777e3;
        }
        .form-label {
            font-weight: bold;
            padding-left: 30px;
        }
        .text-center a {
            color: #6e8efb;
            text-decoration: none;
        }
        .text-center a:hover {
            text-decoration: underline;
        }
        .alerts {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            max-width: 500px;
            z-index: 1050;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <!-- Alert Section -->
    <div class="alerts">
        @if ($errors->any())
            <div class="alert alert-danger d-flex align-items-center mt-3" id="error-alert" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="display: none;"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mt-3" id="error-alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="display: none;"></button>
            </div>
        @endif

        <!-- Success alert -->
        @if (session('success'))
            <div class="alert alert-success mt-3" id="success-alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="display: none;"></button>
            </div>
        @endif
    </div>
<body class="d-flex align-items-center justify-content-center vh-100">
    <!-- Alert Section -->
    <!-- Login Form -->
    <div class="card shadow-lg p-4" style="width: 400px;">
        <h3 class="text-center mb-4 text-primary">Login</h3>
        <form action="{{ route('postlogin') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0"><i class="bi bi-envelope"></i></span>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0"><i class="bi bi-lock"></i></span>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
            </div>
            <div class="d-grid gap-2 col-10 mx-auto">
                <button type="submit" class="btn btn-primary btn-lg">Login</button>
            </div>
        </form>
        <div class="text-center mt-3">
            <small>Don't have an account ? <a href="{{ route('register') }}">Register</a></small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Automatically dismiss alerts after 5 seconds
       
// Alert auto-close
        setTimeout(function() {
            ['error-alert', 'success-alert'].forEach(id => {
                const alert = document.getElementById(id);
                if (alert) {
                    const closeButton = alert.querySelector('[data-bs-dismiss="alert"]');
                    if (closeButton) closeButton.click();
                }
            });
        }, 3000);
    </script>
</body>
</html>
