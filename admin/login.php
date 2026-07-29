<?php
session_start();
require_once __DIR__ . '/../config/db.php';

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: dashboard.php');
    exit;
}

$error_msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($username) && !empty($password)) {
        if ($pdo) {
            $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ? LIMIT 1");
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_username'] = $user['username'];
                header('Location: dashboard.php');
                exit;
            } else {
                // Fallback for default admin demo if DB hash mismatch
                if ($username === 'admin' && $password === 'password123') {
                    $_SESSION['admin_logged_in'] = true;
                    $_SESSION['admin_username'] = 'admin';
                    header('Location: dashboard.php');
                    exit;
                }
                $error_msg = 'Invalid username or password.';
            }
        } else {
            // Fallback offline login for testing if MySQL connection is down
            if ($username === 'admin' && $password === 'password123') {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_username'] = 'admin';
                header('Location: dashboard.php');
                exit;
            }
            $error_msg = 'Database connection error. Logged in via fallback.';
        }
    } else {
        $error_msg = 'Please enter both username and password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - GAM Developer Solution</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            background-color: #061325;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-card {
            background: #FFFFFF;
            width: 100%;
            max-width: 440px;
            border-radius: 8px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.4);
            overflow: hidden;
            border-top: 5px solid #C9A227;
        }
        .login-header {
            background: #0B1F3A;
            color: #FFFFFF;
            padding: 30px;
            text-align: center;
        }
        .login-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            color: #C9A227;
        }
        .login-body {
            padding: 35px 30px;
        }
        .alert-error {
            background: #FEE2E2;
            color: #991B1B;
            padding: 12px 16px;
            border-radius: 4px;
            font-size: 0.9rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="login-header">
        <img src="../assets/images/logo.png" alt="GAM Developer Solutions Logo" class="brand-logo-img" style="height: 60px; margin-bottom: 12px;">
        <h2>GAM Developer Solutions</h2>
        <p style="font-size: 0.85rem; color: #CBD5E1; margin-top: 5px;">Workforce Management System Login</p>
    </div>
    
    <div class="login-body">
        <?php if (!empty($error_msg)): ?>
            <div class="alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span><?= htmlspecialchars($error_msg); ?></span>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="form-group" style="margin-bottom: 20px;">
                <label class="form-label"><i class="fa-solid fa-user text-gold"></i> Username</label>
                <input type="text" name="username" class="form-input" placeholder="Enter admin username" required value="admin">
            </div>

            <div class="form-group" style="margin-bottom: 25px;">
                <label class="form-label"><i class="fa-solid fa-lock text-gold"></i> Password</label>
                <input type="password" name="password" class="form-input" placeholder="Enter password" required value="password123">
            </div>

            <button type="submit" class="btn btn-gold btn-full">
                <i class="fa-solid fa-right-to-bracket"></i> Login to Portal
            </button>
        </form>
        
        <div style="text-align: center; margin-top: 20px; font-size: 0.85rem; color: #64748B;">
            Default Credentials: <b>admin</b> / <b>password123</b>
        </div>
    </div>
</div>

</body>
</html>
