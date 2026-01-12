<?php
header("Content-Type: application/json");

$email = $_GET['email'] ?? "";

$existingEmails = [
    "test@example.com",
    "admin@company.com",
    "info@company.com"
];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["valid"=>false,"message"=>"Invalid email format"]);
    exit;
}

if (in_array(strtolower($email), array_map('strtolower',$existingEmails))) {
    echo json_encode(["valid"=>false,"message"=>"Email already exists"]);
} else {
    echo json_encode(["valid"=>true,"message"=>"✔ Email available"]);
}

