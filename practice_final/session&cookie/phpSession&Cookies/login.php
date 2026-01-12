<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="post" action="process_login.php">

    <label>Username:</label><br>
    <input type="text" name="username"
        value="<?php
            if (isset($_COOKIE['username'])) {
                echo $_COOKIE['username'];
            }
        ?>">
    <br><br>

    <label>Password:</label><br>
    <input type="password" name="password">
    <br><br>

    <input type="checkbox" name="remember"> Remember Me
    <br><br>

    <input type="submit" value="Login">

</form>

</body>
</html>
