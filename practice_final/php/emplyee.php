<?php
// Initialize variables
$empName = "";
$department = "";
$leaveDays = "";
$decision = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $empName = $_POST['empName'] ?? '';
    $department = $_POST['department'] ?? '';
    $leaveDays = $_POST['leaveDays'] ?? '';

    if ($empName == "" || $department == "" || $leaveDays == "") {
        $decision = "Please fill all fields.";
    } else {
        if (is_numeric($leaveDays)) {
            if ($leaveDays <= 5) {
                $decision = "Leave Approved";
            } else {
                $decision = "Pending Approval";
            }
        } else {
            $decision = "Number of leave days must be a number.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Leave Request</title>
</head>
<body>

<h2>Employee Leave Request Form</h2>

<form method="post" action="">
    <label for="empName">Employee Name:</label><br>
    <input type="text" name="empName" id="empName" value="<?php echo  htmlspecialchars($empName) ?>"><br><br>

    <label for="department">Department:</label><br>
    <input type="text" name="department" id="department" value="<?php echo  htmlspecialchars($department) ?>"><br><br>

    <label for="leaveDays">Number of Leave Days:</label><br>
    <input type="number" name="leaveDays" id="leaveDays" value="<?php echo  htmlspecialchars($leaveDays) ?>"><br><br>

    <input type="submit" value="Submit Request">
</form>

<?php
if ($decision != "") {
    echo "<h3>Leave Evaluation Result:</h3>";
    echo "<p>Employee Name: $empName</p>";
    echo "<p>Department: $department</p>";
    echo "<p>Leave Days: $leaveDays</p>";
    echo "<p>Decision: <strong>$decision</strong></p>";
}
?>

</body>
</html>
