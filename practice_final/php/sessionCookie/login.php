<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

<h2>Login</h2>

<form method="post" action="process.php">
    
    <!-- Username -->
    <label for="username">Username:</label><br>
    <input type="text" name="username" id="username" required><br><br>

    <!-- Password -->
    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password" required><br><br>

    <!-- Remember Me -->
    <input type="checkbox" name="remember" id="remember" value="1">
    <label for="remember">Remember Me</label><br><br>

    <input type="submit" value="Login">

</form>

</body>
</html>
