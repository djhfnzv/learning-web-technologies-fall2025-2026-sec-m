<?php
session_start();

$valid_username = "student";
$valid_password = "aiub123";

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == $valid_username && $password == $valid_password) {

    $_SESSION['username'] = $username;

    if (isset($_POST['remember'])) {
        setcookie("username", $username, time() + (7 * 24 * 60 * 60));
    }

    header("Location: dashboard.php");
    exit();

} else {
    echo "<h3>Invalid Username or Password</h3>";
    echo "<a href='login.php'>Go Back to Login</a>";
}
?>
