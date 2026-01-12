<!DOCTYPE html>
<html>
<head>
    <title>User Information Form</title>
</head>
<body>

<h2>User Information Form</h2>

<form action="process.php" method="post">
    
    <!-- Name -->
    <label for="name">Name:</label><br>
    <input type="text" name="name" id="name"><br><br>

    <!-- Email -->
    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email"><br><br>

    <!-- Age -->
    <label for="age">Age:</label><br>
    <input type="number" name="age" id="age"><br><br>

    <!-- Gender -->
    <label>Gender:</label><br>
    <input type="radio" name="gender" value="Male" id="male">
    <label for="male">Male</label><br>
    <input type="radio" name="gender" value="Female" id="female">
    <label for="female">Female</label><br>
    <input type="radio" name="gender" value="Other" id="other">
    <label for="other">Other</label><br><br>

    <!-- Skills -->
    <label>Skills:</label><br>
    <input type="checkbox" name="skills[]" value="PHP" id="php">
    <label for="php">PHP</label><br>
    <input type="checkbox" name="skills[]" value="JavaScript" id="js">
    <label for="js">JavaScript</label><br>
    <input type="checkbox" name="skills[]" value="HTML" id="html">
    <label for="html">HTML</label><br><br>

    <!-- Country -->
    <label for="country">Country:</label><br>
    <select name="country" id="country">
        <option value="">Select</option>
        <option value="Bangladesh">Bangladesh</option>
        <option value="India">India</option>
        <option value="USA">USA</option>
        <option value="UK">UK</option>
    </select><br><br>

    <input type="submit" value="Submit">

</form>

</body>
</html>

