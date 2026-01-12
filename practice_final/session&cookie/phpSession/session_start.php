<?php
session_start();


if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "Student";
}


if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 1;
} else {
    $_SESSION['visits']++;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Session Start</title>
</head>
<body>

<h2>Session Example</h2>

<p>Welcome, <b><?php echo $_SESSION['username']; ?></b></p>
<p>Number of visits in this session: <b><?php echo $_SESSION['visits']; ?></b></p>

<a href="session_destroy.php">End Session</a>

</body>
</html>
