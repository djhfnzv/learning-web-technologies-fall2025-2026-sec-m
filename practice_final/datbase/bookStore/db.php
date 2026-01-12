<?php
$conn = new mysqli("localhost", "root", "", "bookstore_db");

if (!$conn) {
    echo "Connection failed";
}
?>
