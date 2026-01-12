<?php
$errors = [];
$success = false;

// Collect values
$fullname = $_POST['fullname'] ?? '';
$email = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$cpassword = $_POST['cpassword'] ?? '';
$age = $_POST['age'] ?? '';
$gender = $_POST['gender'] ?? '';
$course = $_POST['course'] ?? '';
$terms = isset($_POST['terms']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($fullname == "" || $email == "" || $username == "" || $password == "" || $cpassword == "" || $age == "") {
        $errors[] = "All fields must be filled.";
    }

    if (!ctype_alpha(str_replace(" ", "", $fullname))) {
        $errors[] = "Full Name can contain only letters and spaces.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    if (strlen($username) < 5) {
        $errors[] = "Username must be at least 5 characters long.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    if ($password != $cpassword) {
        $errors[] = "Password and Confirm Password must match.";
    }

    if ($age < 18) {
        $errors[] = "Age must be 18 or above.";
    }

    if ($gender == "") {
        $errors[] = "Please select gender.";
    }

    if ($course == "") {
        $errors[] = "Please select a course.";
    }

    
    if (!$terms) {
        $errors[] = "You must accept Terms & Conditions.";
    }

    if (empty($errors)) {
        $success = true;
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

<form method="post" action="">

    <label>Full Name:</label><br>
    <input type="text" name="fullname" value="<?php echo  htmlspecialchars($fullname) ?>"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo  htmlspecialchars($email) ?>"><br><br>

    <label>Username:</label><br>
    <input type="text" name="username" value="<?php echo  htmlspecialchars($username) ?>"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br><br>

    <label>Confirm Password:</label><br>
    <input type="password" name="cpassword"><br><br>

    <label>Age:</label><br>
    <input type="number" name="age" value="<?php echo  htmlspecialchars($age) ?>"><br><br>

    <label>Gender:</label><br>
    <input type="radio" name="gender" value="Male" <?php echo  ($gender=="Male")?'checked':'' ?>> Male
    <input type="radio" name="gender" value="Female" <?php echo  ($gender=="Female")?'checked':'' ?>> Female
    <br><br>

    <label>Course:</label><br>
    <select name="course">
        <option value="">Select Course</option>
        <option value="CSE" <?php echo  ($course=="CSE")?'selected':'' ?>>CSE</option>
        <option value="EEE" <?php echo  ($course=="EEE")?'selected':'' ?>>EEE</option>
        <option value="BBA" <?php echo  ($course=="BBA")?'selected':'' ?>>BBA</option>
    </select>
    <br><br>

    <input type="checkbox" name="terms" <?php echo  ($terms)?'checked':'' ?>>
    <label>I accept Terms & Conditions</label>
    <br><br>

    <input type="submit" value="Register">

</form>

<hr>

<?php
// Errors
if (!empty($errors)) {
    echo "<h3>Error(s):</h3><ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
}

// Success
if ($success) {
    echo "<h3>Registration Successful!</h3>";
    echo "<p><b>Name:</b> $fullname</p>";
    echo "<p><b>Email:</b> $email</p>";
    echo "<p><b>Username:</b> $username</p>";
    echo "<p><b>Age:</b> $age</p>";
    echo "<p><b>Gender:</b> $gender</p>";
    echo "<p><b>Course:</b> $course</p>";
}
?>

</body>
</html>
