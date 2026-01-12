<?php
session_start();

$name = $_POST['name'] ?? '';
$marks = [
    $_POST['s1'] ?? '',
    $_POST['s2'] ?? '',
    $_POST['s3'] ?? '',
    $_POST['s4'] ?? '',
    $_POST['s5'] ?? ''
];

$errors = [];

// Validation
if($name == ""){
    $errors[] = "Student name is required";
}

foreach($marks as $m){
    if($m === ""){
        $errors[] = "All marks must be filled";
        break;
    }
    if($m < 0 || $m > 100){
        $errors[] = "Marks must be between 0 and 100";
        break;
    }
}

if(!empty($errors)){
    echo "<h3>Errors:</h3><ul>";
    foreach($errors as $e){
        echo "<li>$e</li>";
    }
    echo "</ul>";
    echo "<a href='index.php'>Go Back</a>";
    exit;
}

// Calculation
$total = array_sum($marks);
$average = $total / 5;

// Grade
if($average >= 90){
    $grade = "A";
} elseif($average >= 80){
    $grade = "B";
} elseif($average >= 70){
    $grade = "C";
} elseif($average >= 60){
    $grade = "D";
} else{
    $grade = "F";
}

// Store in session
$_SESSION['results'][] = [
    'name' => $name,
    'total' => $total,
    'average' => $average,
    'grade' => $grade
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
</head>
<body>

<nav>
    <a href="index.php">Home</a> |
    <a href="results.php">View All Results</a>
</nav>

<h2>Student Result</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Name</th>
        <th>Total</th>
        <th>Average</th>
        <th>Grade</th>
    </tr>
    <tr>
        <td><?= $name ?></td>
        <td><?= $total ?></td>
        <td><?= number_format($average,2) ?></td>
        <td><?= $grade ?></td>
    </tr>
</table>

</body>
</html>
