<!DOCTYPE html>
<html>
<head>
    <title>Student Grade Calculator</title>
</head>
<body>

<h2>Enter Student Marks</h2>

<nav>
    <a href="index.php">Home</a> |
    <a href="results.php">View Results</a>
</nav>

<br><br>

<form method="post" action="calculate.php">

    Student Name:<br>
    <input type="text" name="name"><br><br>

    Subject 1:<br>
    <input type="number" name="s1"><br><br>

    Subject 2:<br>
    <input type="number" name="s2"><br><br>

    Subject 3:<br>
    <input type="number" name="s3"><br><br>

    Subject 4:<br>
    <input type="number" name="s4"><br><br>

    Subject 5:<br>
    <input type="number" name="s5"><br><br>

    <input type="submit" value="Calculate Grade">

</form>

</body>
</html>
