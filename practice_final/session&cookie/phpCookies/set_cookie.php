<?php
if (isset($_POST['theme'])) {

    $theme = $_POST['theme'];

    setcookie("user_theme", $theme, time() + (7 * 24 * 60 * 60));

    header("Location: read_cookie.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Set Cookie</title>
</head>
<body>

<h2>Select Your Preferred Theme</h2>

<form method="post">
    <input type="radio" name="theme" value="Light"> Light <br>
    <input type="radio" name="theme" value="Dark"> Dark <br><br>

    <input type="submit" value="Save Theme">
</form>

</body>
</html>
