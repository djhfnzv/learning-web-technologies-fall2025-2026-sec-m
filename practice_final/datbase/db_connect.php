<?php

$host = "localhost";
$username = "root";      
$password = "";         
$database = "project";

$conn = mysqli_connect($host, $username, $password, $database);

if ($conn) {
    echo "Database connected successfully.";
} else {
    echo "Connection failed: " . mysqli_connect_error();
}

mysqli_close($conn);
?>
