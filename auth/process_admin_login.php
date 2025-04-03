<?php
session_start();
require_once '../config.php'; // Database connection

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['admin_username']);
    $password = trim($_POST['admin_password']);

    // Validate inputs
    if (empty($username) || empty($password)) {
        $_SESSION['admin_login_error'] = "Both fields are required!";
        header("Location: admin_login.php");
        exit();
    }

    // Check if the admin exists in the database
    $stmt = $conn->prepare("SELECT id, username, password FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($admin_id, $admin_username, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Regenerate session ID to prevent session fixation attacks
            session_regenerate_id(true);
            
            // Store session variables
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_username'] = $admin_username;

            // Redirect to admin dashboard
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $_SESSION['admin_login_error'] = "Invalid username or password.";
        }
    } else {
        $_SESSION['admin_login_error'] = "Admin not found!";
    }

    $stmt->close();
    $conn->close();

    // Redirect back to login page with error message
    header("Location: admin_login.php");
    exit();
} else {
    header("Location: admin_login.php");
    exit();
}
?>
