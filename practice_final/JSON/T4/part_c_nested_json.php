<?php
echo "<h2>Part C: Nested JSON</h2>";

$students = [
    [
        "Name" => "John Doe",
        "ID" => "101",
        "Courses" => ["Programming", "Mathematics", "Physics"]
    ],
    [
        "Name" => "Alice Smith",
        "ID" => "102",
        "Courses" => ["English", "Biology", "Chemistry"]
    ],
    [
        "Name" => "Bob Johnson",
        "ID" => "103",
        "Courses" => ["History", "Geography", "Economics"]
    ]
];

$students_json = json_encode($students);
echo "<h4>JSON String:</h4>";
echo "<pre>$students_json</pre>";

$decoded_students = json_decode($students_json, true);

echo "<h4>Student Courses Table:</h4>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Name</th><th>ID</th><th>Courses</th></tr>";

foreach ($decoded_students as $student) {
    echo "<tr>";
    echo "<td>".$student['Name']."</td>";
    echo "<td>".$student['ID']."</td>";
    echo "<td>".implode(", ", $student['Courses'])."</td>";
    echo "</tr>";
}

echo "</table>";
?>
