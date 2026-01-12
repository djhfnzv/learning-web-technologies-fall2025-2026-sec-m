<?php
include "db.php";
$message = "";

// Add Employee
if (isset($_POST['add'])) {
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $email = $_POST['email'];
    $dept = $_POST['department'];
    $join = $_POST['join_date'];

    if ($first && $last && $email && $dept && $join) {
        $stmt = $conn->prepare("INSERT INTO employees (first_name,last_name,email,department,join_date) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss",$first,$last,$email,$dept,$join);
        if ($stmt->execute()) {
            $message = "Employee added successfully.";
        } else {
            $message = "Error: " . $stmt->error;
        }
    } else {
        $message = "All fields are required.";
    }
}

// Fetch Employees
$emp_result = $conn->query("SELECT * FROM employees ORDER BY emp_id ASC");
?>

<h2>Manage Employees</h2>

<form method="post">
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
Email: <input type="email" name="email"><br>
Department: <input type="text" name="department"><br>
Join Date: <input type="date" name="join_date"><br><br>
<input type="submit" name="add" value="Add Employee">
</form>

<p><?php echo $message; ?></p>

<h3>All Employees</h3>
<table border="1">
<tr>
<th>ID</th><th>Name</th><th>Email</th><th>Dept</th><th>Join Date</th>
</tr>
<?php while($row=$emp_result->fetch_assoc()){ ?>
<tr>
<td><?php echo $row['emp_id']; ?></td>
<td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['department']; ?></td>
<td><?php echo $row['join_date']; ?></td>
</tr>
<?php } ?>
</table>
