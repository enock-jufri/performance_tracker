<?php
if (isset($_GET['back'])) {
    header('Location: public/index.php');
    exit();
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #232526 0%, #414345 100%);
        }
        .login-card {
            width: 420px;
            max-width: 700px;
            margin: auto;
            background: #23272b;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.4);
            padding: 2.5rem 2rem 2rem 2rem;
        }
        .login-title {
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .form-label {
            color: #adb5bd;
        }
        .form-control {
            background: #23272b;
            color: #fff;
            border: 1px solid #495057;
        }
        .form-control:focus {
            background: #23272b;
            color: #fff;
            border-color: #0d6efd;
            box-shadow: none;
        }
        .btn-success {
            font-weight: 600;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <div class="d-flex align-items-center justify-content-center" style="min-height:100vh;">
        <div class="login-card">
            <div class="login-title">Login</div>
            <form action="auth/handle_login.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required autocomplete="username">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required autocomplete="current-password">
                </div>
                <button type="submit" class="btn btn-success w-100">Login</button>
            </form>
            <form method="get" class="mt-3">
                <button type="submit" name="back" value="1" class="btn btn-outline-light w-100">Back to Scoreboard</button>
            </form>
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger mt-3 text-center" role="alert">Invalid credentials</div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>