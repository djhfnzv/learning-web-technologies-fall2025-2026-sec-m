<?php
include "db_connect.php";

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
</head>
<body>

<h2>Student Records</h2>

<?php
if (mysqli_num_rows($result) > 0) {

    echo "<table border='1' cellpadding='5'>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Registration No</th>
                <th>Department</th>
                <th>Action</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['registration_no']}</td>
                <td>{$row['department']}</td>
                <td>
                    <a href='edit_student.php?id={$row['id']}'>Edit</a> |
                    <a href='delete_student.php?id={$row['id']}'>Delete</a>
                </td>
              </tr>";
    }

    echo "</table>";

} else {
    echo "No student records found.";
}
?>

<br>
<a href="add_student.php">Add New Student</a>

</body>
</html>
