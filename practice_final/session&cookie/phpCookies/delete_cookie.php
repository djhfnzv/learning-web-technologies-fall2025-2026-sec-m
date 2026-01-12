<?php
// Delete the cookie by setting past time
setcookie("user_theme", "", time() - 3600);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Cookie</title>
</head>
<body>

<h2>Cookie Deleted</h2>

<p>Cookie has been deleted successfully.</p>

<a href="set_cookie.php">Set New Cookie</a>

</body>
</html>
