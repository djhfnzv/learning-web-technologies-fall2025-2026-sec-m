<?php
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $marks = $_POST['marks'];

    if ($marks >= 50) {
        $result = "Student <b>$name</b> has <b>Passed</b>";
    } else {
        $result = "Student <b>$name</b> has <b>Failed</b>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Result</title>
</head>
<body>

<h2>Student Pass / Fail System</h2>

<form method="post" action="">
    <label>Student Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Marks:</label><br>
    <input type="number" name="marks" required><br><br>

    <input type="submit" value="Check Result">
</form>

<?php
if ($result != "") {
    echo "<h3>Result:</h3>";
    echo $result;
}
?>

</body>
</html>
