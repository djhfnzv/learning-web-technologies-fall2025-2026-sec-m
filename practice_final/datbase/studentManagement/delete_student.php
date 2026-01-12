<?php
include "db_connect.php";

$id = $_GET['id'];

$sql = "DELETE FROM students WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Student deleted successfully<br><br>";
} else {
    echo "Deletion failed";
}
?>

<a href="view_student.php">Back to Student List</a>
