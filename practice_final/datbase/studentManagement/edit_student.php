<?php
include "db_connect.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dept = $_POST['department'];

    $sql = "UPDATE students 
            SET name='$name', email='$email', department='$dept'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Student updated successfully<br><br>";
    } else {
        echo "Update failed";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form method="post">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
    Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br><br>
    Department: <input type="text" name="department" value="<?php echo $row['department']; ?>"><br><br>
    <input type="submit" name="update" value="Update">
</form>

<br>
<a href="view_student.php">Back to List</a>

</body>
</html>
