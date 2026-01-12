<?php
header("Content-Type: application/json");

$json_file = 'students.json';

if(!file_exists($json_file)){
    echo json_encode(["error" => "JSON file not found."]);
    exit;
}

$data = file_get_contents($json_file);

$students = json_decode($data, true);
if($students === null){
    echo json_encode(["error" => "Invalid JSON data."]);
    exit;
}

echo json_encode($students);
?>
