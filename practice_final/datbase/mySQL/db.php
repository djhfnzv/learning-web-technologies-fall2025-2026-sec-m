<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db = "school_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo "Connection failed ";
}
?>
