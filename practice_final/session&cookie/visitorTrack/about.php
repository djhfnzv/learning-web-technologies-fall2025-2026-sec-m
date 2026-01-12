<?php
session_start();
$_SESSION['pages'][] = "About";
?>

<!DOCTYPE html>
<html>
<head><title>About</title></head>
<body>

<nav>
<a href="index.php">Home</a> |
<a href="about.php">About</a> |
<a href="services.php">Services</a> |
<a href="contact.php">Contact</a>
</nav>

<h2>About Page</h2>
<p>This is the about page.</p>

</body>
</html>
