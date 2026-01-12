<?php
include "db.php";

$emp_result = $conn->query("SELECT emp_id, first_name, last_name FROM employees ORDER BY first_name");

$where = "1";
$params=[];$types="";

if (isset($_GET['filter'])) {
    if ($_GET['emp_id'] != "") {
        $where .= " AND emp_id=?";
        $params[] = $_GET['emp_id'];
        $types .= "i";
    }
    if ($_GET['from'] != "" && $_GET['to'] != "") {
        $where .= " AND date BETWEEN ? AND ?";
        $params[] = $_GET['from'];
        $params[] = $_GET['to'];
        $types .= "ss";
    }
}

$stmt = $conn->prepare("SELECT * FROM attendance WHERE $where ORDER BY date DESC");
if (!empty($params)) {
    $stmt->bind_param($types,...$params);
}
$stmt->execute();
$result = $stmt->get_result();

// Statistics
$total = $present = $absent = $late = 0;
while($row=$result->fetch_assoc()){
    $total++;
    if($row['status']=="Present") $present++;
    if($row['status']=="Absent") $absent++;
    if($row['status']=="Late") $late++;
    $records[]=$row;
}

$attendance_percentage = ($total>0) ? round(($present/$total)*100,2) : 0;
?>

<h2>Attendance Report</h2>

<form method="get">
Employee:
<select name="emp_id">
<option value="">All</option>
<?php
$emp_result->data_seek(0);
while($row=$emp_result->fetch_assoc()){
    echo "<option value='{$row['emp_id']}'".(isset($_GET['emp_id']) && $_GET['emp_id']==$row['emp_id'] ? " selected":"").">".$row['first_name'].' '.$row['last_name']."</option>";
}
?>
</select><br><br>
From: <input type="date" name="from" value="<?php echo $_GET['from'] ?? '';?>"><br>
To: <input type="date" name="to" value="<?php echo $_GET['to'] ?? '';?>"><br><br>
<input type="submit" name="filter" value="Filter">
</form>

<h3>Statistics</h3>
<p>Total Records: <?php echo $total; ?></p>
<p>Present: <?php echo $present; ?></p>
<p>Absent: <?php echo $absent; ?></p>
<p>Late: <?php echo $late; ?></p>
<p>Attendance %: <?php echo $attendance_percentage; ?>%</p>

<h3>Attendance Records</h3>
<table border="1">
<tr><th>Employee</th><th>Date</th><th>Check-in</th><th>Check-out</th><th>Status</th></tr>
<?php
if(isset($records)){
    foreach($records as $r){
        $emp_name = "";
        $stmt2 = $conn->prepare("SELECT first_name,last_name FROM employees WHERE emp_id=?");
        $stmt2->bind_param("i",$r['emp_id']);
        $stmt2->execute();
        $res=$stmt2->get_result()->fetch_assoc();
        $emp_name = $res['first_name'].' '.$res['last_name'];
        echo "<tr>
        <td>$emp_name</td>
        <td>{$r['date']}</td>
        <td>{$r['check_in_time']}</td>
        <td>{$r['check_out_time']}</td>
        <td>{$r['status']}</td>
        </tr>";
    }
}
?>
</table>
