<?php
// Part A: PHP Variables and Output
$name = "John Doe";
$studentID = "2026001";
$department = "Computer Science";

echo "<h3>Part A: Variables and Output</h3>";
echo "Name: $name <br>";
echo "Student ID: $studentID <br>";
echo "Department: $department <br><br>";

// Part B: Arithmetic and Type Casting
$num1 = 15;
$num2 = 4;

echo "<h3>Part B: Arithmetic Operations</h3>";
echo "$num1 + $num2 = " . ($num1 + $num2) . "<br>";
echo "$num1 - $num2 = " . ($num1 - $num2) . "<br>";
echo "$num1 * $num2 = " . ($num1 * $num2) . "<br>";
echo "$num1 / $num2 = " . ($num1 / $num2) . "<br><br>";

$stringNum = "123";
$floatNum = 45.67;

$intFromString = (int)$stringNum;
$intFromFloat = (int)$floatNum;

echo "String '$stringNum' converted to integer: $intFromString <br>";
echo "Float $floatNum converted to integer: $intFromFloat <br><br>";

// Part C: Control Flow

$marks = 72;

echo "<h3>Part C: Control Flow (Grade)</h3>";

if ($marks >= 80) {
    echo "Grade: A <br>";
} elseif ($marks >= 65) {
    echo "Grade: B <br>";
} elseif ($marks >= 50) {
    echo "Grade: C <br>";
} else {
    echo "Fail <br>";
}

echo "<br>";

// Part D: Loops
echo "<h3>Part D: Loops</h3>";

echo "Numbers 1 to 10: ";
for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}
echo "<br>";


echo "Even numbers from 1 to 20: ";
$j = 2;
while ($j <= 20) {
    echo $j . " ";
    $j += 2;
}
echo "<br><br>";

// Part E: Arrays
echo "<h3>Part E: Arrays</h3>";

$languages = ["PHP", "Python", "JavaScript", "Java", "C++"];
echo "Favorite Programming Languages: ";
foreach ($languages as $lang) {
    echo $lang . " ";
}
echo "<br>";

$info = [
    "Name" => "John Doe",
    "Email" => "john@example.com",
    "City" => "Dhaka"
];

echo "Personal Info: <br>";
foreach ($info as $key => $value) {
    echo "$key: $value <br>";
}
echo "<br>";

// Part F: User-Defined Function
echo "<h3>Part F: User-Defined Function</h3>";

function calculateSquare($number) {
    return $number * $number;
}

$num = 7;
$square = calculateSquare($num);
echo "The square of $num is $square <br>";
?>
