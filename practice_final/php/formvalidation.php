<?php
$name = $email = $subject = $message = "";
$errors = [];
$success = false;

function clean($data){
    return htmlspecialchars(trim($data));
}

if($_SERVER["REQUEST_METHOD"] === "POST"){

    // Sanitize inputs
    $name = clean($_POST['name'] ?? '');
    $email = clean($_POST['email'] ?? '');
    $subject = clean($_POST['subject'] ?? '');
    $message = clean($_POST['message'] ?? '');

    // Validation
    if($name == ""){
        $errors[] = "Name is required";
    }

    if($email == ""){
        $errors[] = "Email is required";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Invalid email format";
    }

    if($subject == ""){
        $errors[] = "Subject is required";
    }

    if($message == ""){
        $errors[] = "Message is required";
    } elseif(strlen($message) < 10){
        $errors[] = "Message must be at least 10 characters";
    }

    if(empty($_FILES['attachment']['name'])){
        $errors[] = "Files must be submitted";
    }

    if(empty($errors)){
        $success = true; 
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
    <meta charset="UTF-8">
</head>

<body>

<h2>Contact Form</h2>

<?php
if(!empty($errors)){
    echo "<ul>";
    foreach($errors as $e){
        echo "<li>$e</li>";
    }
    echo "</ul>";
}

if($success){
    echo "<p><strong>Email sent successfully!</strong></p>";
    echo "<p><b>Name:</b> $name</p>";
    echo "<p><b>Email:</b> $email</p>";
    echo "<p><b>Subject:</b> $subject</p>";
    echo "<p><b>Message:</b> $message</p>";

    if(!empty($_FILES['attachment']['name'])){
        echo "<p><b>Attachment:</b> " . $_FILES['attachment']['name'] . "</p>";
    }
}
?>

<form method="post" enctype="multipart/form-data">

    <label>Name:</label><br>
    <input type="text" name="name" value="<?php echo  $name ?>"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo  $email ?>"><br><br>

    <label>Subject:</label><br>
    <select name="subject">
        <option value="">Select</option>
        <option value="General" <?php echo($subject=="General")?'selected':'' ?>>General</option>
        <option value="Support" <?php echo($subject=="Support")?'selected':'' ?>>Support</option>
        <option value="Feedback" <?php echo($subject=="Feedback")?'selected':'' ?>>Feedback</option>
    </select><br><br>

    <label>Message:</label><br>
    <textarea name="message" rows="4" cols="40"><?php echo  $message ?></textarea><br><br>

    <label>Attachment(optional):</label><br>
    <input type="file" name="attachment"><br><br>

    <input type="submit" value="Send">

</form>

</body>
</html>
