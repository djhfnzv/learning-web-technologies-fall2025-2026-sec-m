<?php
session_start();

$validUsername = "admin";
$validPassword = "admin123";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === $validUsername && $password === $validPassword) {

    $_SESSION['username'] = $username;
    $_SESSION['login_time'] = date("Y-m-d H:i:s");
    $_SESSION['user_role'] = "Administrator";

    header("Location: dashboard.php");
    exit;

} else {
    header("Location: login.php?error=Invalid username or password");
    exit;
}
