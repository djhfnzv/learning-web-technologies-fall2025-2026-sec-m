<?php
require_once "db_connect.php";

$sql = "select * from students";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
</head>
<body>

<h2>All Student Records</h2>

<?php
if (mysqli_num_rows($result) > 0) {

    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Registration No</th>
            <th>Program</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['registration_no']}</td>
                <td>{$row['program']}</td>
              </tr>";
    }

    echo "</table>";

} else {
    echo "<p>No student records found.</p>";
}

mysqli_close($conn);
?>

</body>
</html>
