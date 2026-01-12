<?php
include "db_connect.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $reg = $_POST['registration_no'];
    $dept = $_POST['department'];

    $sql = "INSERT INTO students (name, email, registration_no, department)
            VALUES ('$name', '$email', '$reg', '$dept')";

    if (mysqli_query($conn, $sql)) {
        echo "Student added successfully<br><br>";
    } else {
        echo "Error adding student";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>

<h2>Add Student</h2>

<form method="post">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="text" name="email"><br><br>
    Registration No: <input type="text" name="registration_no"><br><br>
    Department: <input type="text" name="department"><br><br>
    <input type="submit" name="submit" value="Add Student">
</form>

<br>
<a href="view_student.php">View Students</a>

</body>
</html>
