<?php
session_start();

// Hardcoded credentials
$validUsername = "admin";
$validPassword = "12345";

// Get form values
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$remember = isset($_POST['remember']) ? true : false;

// Validate credentials
if ($username === $validUsername && $password === $validPassword) {

    // Store username in session
    $_SESSION['username'] = $username;

    if ($remember) {
        setcookie("username", $username, time() +3600, "/");
    }

    header("Location: dashboard.php");
    exit;

} else {
    echo "<h3>Login Failed!</h3>";
    echo "<p>Invalid username or password.</p>";
    echo "<a href='login.php'>Go back to Login</a>";
}
?>
