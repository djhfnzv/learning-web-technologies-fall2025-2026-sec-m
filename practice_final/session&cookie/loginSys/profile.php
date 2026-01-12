<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>

<h2>User Profile</h2>

<p><b>Username:</b> <?php echo  $_SESSION['username'] ?></p>
<p><b>User Role:</b> <?php echo  $_SESSION['user_role'] ?></p>
<p><b>Login Time:</b> <?php echo  $_SESSION['login_time'] ?></p>

<br>
<a href="dashboard.php">Back to Dashboard</a> |
<a href="logout.php">Logout</a>

</body>
</html>
