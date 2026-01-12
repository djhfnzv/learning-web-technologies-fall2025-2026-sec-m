<?php
header("Content-Type: application/json");

$student = array(
    "id" => 23524742,
    "name" => "Asif Akber",
    "email" => "asifakber0003@gmail.com",
    "department" => "Computer Science"
);

echo json_encode($student);
?>
