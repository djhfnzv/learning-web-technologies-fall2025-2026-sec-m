<?php
echo "<h2>Part A: PHP Array to JSON</h2>";

$student = [
    "Name" => "John Doe",
    "ID" => "101",
    "Department" => "Computer Science",
    "Email" => "john.doe@example.com"
];

$student_json = json_encode($student);

echo "<pre>$student_json</pre>";
?>
