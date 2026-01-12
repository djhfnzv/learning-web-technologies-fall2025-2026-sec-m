<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Welcome to Dashboard</h2>

<p>Hello, <strong><?= $username ?></strong>! You are logged in.</p>

<h3>Session Information</h3>
<p>Session ID: <?= session_id() ?></p>

<h3>Cookie Information</h3>
<?php
if (isset($_COOKIE['username'])) {
    echo "Cookie 'username' is set: " . $_COOKIE['username'];
} else {
    echo "No cookie set.";
}
?>

<br><br>
<a href="logout.php">Logout</a>

</body>
</html>
