<?php
session_start();

if(isset($_GET['clear'])){
    session_destroy();
    header("Location: results.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Results</title>
</head>
<body>

<nav>
    <a href="index.php">Home</a> |
    <a href="results.php">View Results</a>
</nav>

<h2>All Student Results</h2>

<?php
if(empty($_SESSION['results'])){
    echo "<p>No results available.</p>";
} else{
    echo "<table border='1' cellpadding='5'>";
    echo "<tr>
            <th>Name</th>
            <th>Total</th>
            <th>Average</th>
            <th>Grade</th>
          </tr>";

    foreach($_SESSION['results'] as $r){
        echo "<tr>
                <td>{$r['name']}</td>
                <td>{$r['total']}</td>
                <td>".number_format($r['average'],2)."</td>
                <td>{$r['grade']}</td>
              </tr>";
    }

    echo "</table>";
}
?>

<br>
<a href="results.php?clear=1">Clear Results</a>

</body>
</html>
