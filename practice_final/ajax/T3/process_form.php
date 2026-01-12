
<?php
$name  = isset($_POST['name']) ? trim($_POST['name']) : "";
$email = isset($_POST['email']) ? trim($_POST['email']) : "";

if ($name == "") {
    echo " Error: Name must not be empty.";
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo " Error: Invalid email address.";
}
else {
    echo " Success! Form submitted successfully.<br>";
    echo "Name: " . htmlspecialchars($name) . "<br>";
    echo "Email: " . htmlspecialchars($email);
}
?>

