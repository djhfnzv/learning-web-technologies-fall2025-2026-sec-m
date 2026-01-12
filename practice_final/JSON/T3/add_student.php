<?php
$jsonFile = 'student.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $students = [];
    if (file_exists($jsonFile) && filesize($jsonFile) > 0) {
        $jsonData = file_get_contents($jsonFile);
        $students = json_decode($jsonData, true);
    }

    $students[] = [
        "id" => $id,
        "name" => $name,
        "email" => $email,
        "department" => $department
    ];

    file_put_contents($jsonFile, json_encode($students, JSON_PRETTY_PRINT));
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <style>
        form { width: 300px; margin: 30px auto; display: flex; flex-direction: column; }
        input { margin-bottom: 10px; padding: 8px; }
        button { padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Add New Student</h2>
    <form method="post" action="">
        <input type="number" name="id" placeholder="ID" required>
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="department" placeholder="Department" required>
        <button type="submit">Add Student</button>
    </form>
</body>
</html>
