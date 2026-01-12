<?php
include "db.php";
$message="";

// Fetch employees
$emp_result = $conn->query("SELECT emp_id, first_name, last_name FROM employees ORDER BY first_name");

if (isset($_POST['mark'])) {
    $emp_id = $_POST['emp_id'];
    $date = $_POST['date'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $status = $_POST['status'];

    if ($emp_id && $date && $check_in && $check_out && $status) {

        // Prevent duplicate
        $check = $conn->prepare("SELECT attendance_id FROM attendance WHERE emp_id=? AND date=?");
        $check->bind_param("is",$emp_id,$date);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = "Attendance already marked for this employee on this date.";
        } else {
            $stmt = $conn->prepare("INSERT INTO attendance (emp_id,date,check_in_time,check_out_time,status) VALUES (?,?,?,?,?)");
            $stmt->bind_param("issss",$emp_id,$date,$check_in,$check_out,$status);
            if ($stmt->execute()) {
                $message = "Attendance marked successfully.";
            } else {
                $message = "Error: ".$stmt->error;
            }
        }
    } else {
        $message = "All fields are required.";
    }
}
?>

<h2>Mark Attendance</h2>

<form method="post">
Employee:
<select name="emp_id">
<option value="">Select</option>
<?php while($row=$emp_result->fetch_assoc()){ ?>
<option value="<?php echo $row['emp_id']; ?>"><?php echo $row['first_name'].' '.$row['last_name']; ?></option>
<?php } ?>
</select><br><br>

Date: <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>"><br><br>
Check-in: <input type="time" name="check_in"><br><br>
Check-out: <input type="time" name="check_out"><br><br>
Status:
<select name="status">
<option value="">Select</option>
<option value="Present">Present</option>
<option value="Absent">Absent</option>
<option value="Late">Late</option>
<option value="Half-Day">Half-Day</option>
</select><br><br>

<input type="submit" name="mark" value="Mark Attendance">
</form>

<p><?php echo $message; ?></p>

