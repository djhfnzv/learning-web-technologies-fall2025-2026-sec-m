<?php
include "db_connect.php";
$message = "";

if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $department = $_POST['department'];

    $sql = "insert into students (name, email, age, department)
            VALUES ('$name', '$email', '$age', '$department')";

    if (mysqli_query($conn, $sql)) {
        $message = "Registration Successful";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>

<h2>Student Registration Form</h2>

<form method="post">
Name: <input type="text" name="name"><br><br>
Email: <input type="email" name="email"><br><br>
Age: <input type="number" name="age"><br><br>
Department: <input type="text" name="department"><br><br>
<input type="submit" name="register" value="Register">
</form>

<p><?php echo $message; ?></p>

<?php mysqli_close($conn); ?>

</body>
</html>
