<?php
// Display request method and script name using $_SERVER
echo "<h3>Server Info</h3>";
echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . "<br>";
echo "Script Name: " . $_SERVER['SCRIPT_NAME'] . "<br><hr>";

// Initialize variables and error array
$errors = [];
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$age = $_POST['age'] ?? '';
$gender = $_POST['gender'] ?? '';
$skills = $_POST['skills'] ?? [];
$country = $_POST['country'] ?? '';

// Server-side validation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Name validation
    if (!isset($_POST['name']) || trim($name) === '') {
        $errors[] = "Name is required.";
    }

    // Email validation
    if (!isset($_POST['email']) || trim($email) === '') {
        $errors[] = "Email is required.";
    }

    // Age validation
    if (!isset($_POST['age']) || !is_numeric($age) || $age <= 0) {
        $errors[] = "Age must be a positive number.";
    }

    // Gender validation
    if (!isset($_POST['gender']) || $gender === '') {
        $errors[] = "Gender must be selected.";
    }

    // Skills validation
    if (!isset($_POST['skills']) || count($skills) === 0) {
        $errors[] = "At least one skill must be selected.";
    }

    // Display errors or success
    if (!empty($errors)) {
        echo "<h3>Validation Errors:</h3><ul>";
        foreach ($errors as $err) {
            echo "<li>$err</li>";
        }
        echo "</ul>";
        echo "<a href='form.php'>Go Back to Form</a>";
    } else {
        // Success: Display submitted data
        echo "<h3>Form Submitted Successfully!</h3>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Age:</strong> $age</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo "<p><strong>Skills:</strong> " . implode(", ", $skills) . "</p>";
        echo "<p><strong>Country:</strong> $country</p>";
    }
}
?>
