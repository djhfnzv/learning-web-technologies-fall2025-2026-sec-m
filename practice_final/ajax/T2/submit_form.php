<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["success"=>false,"message"=>"Invalid data"]);
    exit;
}

if (strlen($data['message']) < 20) {
    echo json_encode(["success"=>false,"message"=>"Message too short"]);
    exit;
}

$reference = "MSG" . rand(1000,9999);

sleep(1);

echo json_encode([
    "success"=>true,
    "ref"=>$reference
]);
