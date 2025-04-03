<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | Fintech Agriculture</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Custom Styles -->
</head>
<body class="bg-light">

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow p-4" style="width: 400px;">
        <h4 class="text-center mb-3">Reset Your Password</h4>
        
        <!-- Alert Box (Displays Messages) -->
        <?php if (isset($_SESSION['reset_msg'])): ?>
            <div class="alert alert-info"><?php echo $_SESSION['reset_msg']; unset($_SESSION['reset_msg']); ?></div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['reset_error'])): ?>
            <div class="alert alert-danger"><?php echo $_SESSION['reset_error']; unset($_SESSION['reset_error']); ?></div>
        <?php endif; ?>

        <form id="forgotPasswordForm" action="process_forgot_password.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Enter Your Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
        </form>

        <p class="text-center mt-3">
            <a href="login.php">Back to Login</a>
        </p>
    </div>
</div>

</body>
</html>
