<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "university_db";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    echo "Database connection failed";
}
?>
