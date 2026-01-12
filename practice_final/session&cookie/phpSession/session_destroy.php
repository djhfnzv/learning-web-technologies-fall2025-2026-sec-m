<?php
session_start();


session_unset();

session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Session Destroyed</title>
</head>
<body>

<h2>Session Ended</h2>
<p>You have successfully logged out.</p>

<a href="session_start.php">Start New Session</a>

</body>
</html>
