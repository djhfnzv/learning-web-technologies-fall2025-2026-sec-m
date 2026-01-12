<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Dashboard</h2>

<?php
echo "Welcome, <b>" . $_SESSION['username'] . "</b><br><br>";

if (isset($_COOKIE['username'])) {
    echo "Cookie is set for username: <b>" . $_COOKIE['username'] . "</b><br><br>";
} else {
    echo "No username cookie found.<br><br>";
}
?>

<a href="logout.php">Logout</a>

</body>
</html>
