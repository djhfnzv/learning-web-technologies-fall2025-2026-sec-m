<!DOCTYPE html>
<html>
<head>
    <title>Read Cookie</title>
</head>
<body>

<h2>Read Cookie</h2>

<?php
if (isset($_COOKIE['user_theme'])) {
    echo "Hello! Your preferred theme is <b>" . $_COOKIE['user_theme'] . "</b>.";
} else {
    echo "No theme selected. Please choose your preferred theme.";
}
?>

<br><br>
<a href="delete_cookie.php">Delete Cookie</a>

</body>
</html>
