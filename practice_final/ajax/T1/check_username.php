<?php
header("Content-Type: application/json");

$existingUsers = [
    "admin", "john", "sarah", "mike", "alex",
    "emma", "david", "lisa", "robert", "nancy"
];

$username = isset($_GET['username']) ? strtolower($_GET['username']) : "";

$available = true;

foreach ($existingUsers as $user) {
    if (strtolower($user) === $username) {
        $available = false;
        break;
    }
}

if ($available) {
    echo json_encode([
        "available" => true,
        "message" => "Username is available"
    ]);
} else {
    echo json_encode([
        "available" => false,
        "message" => "Username is already taken"
    ]);
}
?>
