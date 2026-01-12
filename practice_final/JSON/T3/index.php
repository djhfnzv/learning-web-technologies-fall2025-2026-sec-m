<?php

$jsonFile = 'student.json';

if (!file_exists($jsonFile) || filesize($jsonFile) == 0) {
    $students = [];
} else {
    $jsonData = file_get_contents($jsonFile);
    $students = json_decode($jsonData, true);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <style>
        table { border-collapse: collapse; width: 60%; margin: 20px auto; }
        th, td { border: 1px solid #333; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        a { display: block; width: 120px; margin: 10px auto; text-align: center; text-decoration: none; padding: 8px; background-color: #4CAF50; color: white; border-radius: 4px; }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Student Records</h1>

    <?php if (empty($students)) : ?>
        <p style="text-align:center;">No student records found.</p>
    <?php else : ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
            </tr>
            <?php foreach ($students as $student) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($student['id']); ?></td>
                    <td><?php echo htmlspecialchars($student['name']); ?></td>
                    <td><?php echo htmlspecialchars($student['email']); ?></td>
                    <td><?php echo htmlspecialchars($student['department']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <a href="add_student.php">Add New Student</a>
</body>
</html>
