<?php
$username = $email = $password = $cpassword = "";
$_uErr = $_eErr = $_pErr = $_cErr = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username  = $_POST['username'] ?? '';
    $email     = $_POST['email'] ?? '';
    $password  = $_POST['password'] ?? '';
    $cpassword = $_POST['cpassword'] ?? '';

    if ($username === "") {
        $_uErr = "Username is required";
    }

    if ($email === "") {
        $_eErr = "Email is required";
    }

    if ($password === "") {
        $_pErr = "Password is required";
    }

    if ($password !== $cpassword) {
        $_cErr = "Passwords do not match";
    }

    if ($_uErr === "" && $_eErr === "" && $_pErr === "" && $_cErr === "") {
        echo '<script>alert("Registration successful");</script>';
        // database insert code goes here
    }

    echo $username;
    echo $email;
    echo $password;

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <style>
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>

<form method="post" action="">
    <label>Username:</label><br>
    <input type="text" name="username" value="<?php echo $username ?>">
    <div class="error"><?= $_uErr ?></div><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo $email ?>">
    <div class="error"><?= $_eErr ?></div><br>

    <label>Password:</label><br>
    <input type="password" name="password">
    <div class="error"><?= $_pErr ?></div><br>

    <label>Confirm Password:</label><br>
    <input type="password" name="cpassword">
    <div class="error"><?= $_cErr ?></div><br>

    <input type="submit" value="Register">
</form>

</body>
</html>
