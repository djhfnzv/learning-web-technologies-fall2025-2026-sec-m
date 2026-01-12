<?php
session_start();

// Session start time
if (!isset($_SESSION['start_time'])) {
    $_SESSION['start_time'] = time();
}

// Track pages visited
$_SESSION['pages'][] = "Home";

// Unique visitor
if (!isset($_COOKIE['visitor_id'])) {
    setcookie("visitor_id", uniqid(), time() + (365*24*60*60));
    setcookie("first_visit", date("Y-m-d H:i:s"), time() + (365*24*60*60));
}

// Visit counter
$visits = $_COOKIE['visit_count'] ?? 0;
$visits++;
setcookie("visit_count", $visits, time() + (365*24*60*60));

// Visit history (last 5)
$history = isset($_COOKIE['visit_history'])
    ? json_decode($_COOKIE['visit_history'], true)
    : [];

$history[] = time();
if (count($history) > 5) {
    array_shift($history);
}
setcookie("visit_history", json_encode($history), time() + (365*24*60*60));

// Last visit
setcookie("last_visit", date("Y-m-d H:i:s"), time() + (365*24*60*60));

// Count visits last 24 hours
$last24 = 0;
foreach ($history as $time) {
    if ($time >= time() - 86400) {
        $last24++;
    }
}

// Session duration
$sessionDuration = time() - $_SESSION['start_time'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>

<h2>Visitor Statistics</h2>

<nav>
    <a href="index.php">Home</a> |
    <a href="about.php">About</a> |
    <a href="services.php">Services</a> |
    <a href="contact.php">Contact</a>
</nav>

<hr>

<p><b>Total Visits:</b> <?php echo  $visits ?></p>
<p><b>Session Duration:</b> <?php echo  $sessionDuration ?> seconds</p>
<p><b>Pages Visited (This Session):</b></p>
<ul>
<?php
if (!empty($_SESSION['pages'])) {
    foreach (array_unique($_SESSION['pages']) as $page) {
        echo "<li>$page</li>";
    }
}
?>
</ul>

<p><b>First Visit:</b> <?php echo  $_COOKIE['first_visit'] ?? 'N/A' ?></p>
<p><b>Last Visit:</b> <?php echo  $_COOKIE['last_visit'] ?? 'N/A' ?></p>
<p><b>Visits in Last 24 Hours:</b> <?php echo  $last24 ?></p>

<h3>Last 5 Visits</h3>
<ul>
<?php
foreach ($history as $h) {
    echo "<li>" . date("Y-m-d H:i:s", $h) . "</li>";
}
?>
</ul>

<form action="clear.php" method="post">
    <input type="submit" value="Clear History">
</form>

</body>
</html>
