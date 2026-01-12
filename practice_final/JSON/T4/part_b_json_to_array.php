<?php
echo "<h2>Part B: JSON to PHP Array</h2>";

$json_string = '{"Name":"John Doe","ID":"101","Department":"Computer Science","Email":"john.doe@example.com"}';

$student_array = json_decode($json_string, true);

echo "<ul>";
foreach ($student_array as $key => $value) {
    echo "<li><strong>$key:</strong> $value</li>";
}
echo "</ul>";
?>
