<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "student_records";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Database connection failed");
}
?>
