<?php
include "../db_connect.php";

// Insert student 1
$sql1 = "insert into students (name, email, age, department)
VALUES ('Rahim Ahmed', 'rahim@gmail.com', 21, 'CSE')";

if (mysqli_query($conn, $sql1)) {
    echo "Student 1 inserted successfully<br>";
} else {
    echo "Error: " . mysqli_error($conn) . "<br>";
}

// Insert student 2
$sql2 = "insert into students (name, email, age, department)
VALUES ('Karim Hossain', 'karim@gmail.com', 22, 'EEE')";

if (mysqli_query($conn, $sql2)) {
    echo "Student 2 inserted successfully<br>";
} else {
    echo "Error: " . mysqli_error($conn) . "<br>";
}

// Insert student 3
$sql3 = "insert into students (name, email, age, department)
VALUES ('Nusrat Jahan', 'nusrat@gmail.com', 20, 'BBA')";

if (mysqli_query($conn, $sql3)) {
    echo "Student 3 inserted successfully<br>";
} else {
    echo "Error: " . mysqli_error($conn) . "<br>";
}

// Close connection
mysqli_close($conn);
?>
