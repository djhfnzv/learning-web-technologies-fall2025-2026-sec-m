<?php
include "db.php";

$keyword = "";
$category = "";
$min = "";
$max = "";

$query = "SELECT * FROM books WHERE 1";
$params = [];
$types = "";

if (isset($_GET['search'])) {

    if ($_GET['keyword'] != "") {
        $query .= " AND (title LIKE ? OR author LIKE ?)";
        $keyword = "%" . $_GET['keyword'] . "%";
        $params[] = $keyword;
        $params[] = $keyword;
        $types .= "ss";
    }

    if ($_GET['category'] != "") {
        $query .= " AND category = ?";
        $params[] = $_GET['category'];
        $types .= "s";
    }

    if ($_GET['min'] != "" && $_GET['max'] != "") {
        $query .= " AND price BETWEEN ? AND ?";
        $params[] = $_GET['min'];
        $params[] = $_GET['max'];
        $types .= "dd";
    }

    $stmt = $conn->prepare($query);
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<h2>Search Books</h2>

<form method="get">
Keyword: <input type="text" name="keyword"><br><br>
Category:
<select name="category">
<option value="">All</option>
<option>Fiction</option>
<option>Science</option>
<option>Technology</option>
</select><br><br>

Price Range:
<input type="number" name="min"> to
<input type="number" name="max"><br><br>

<input type="submit" name="search" value="Search">
</form>

<?php
if (isset($result)) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><b>{$row['title']}</b> by {$row['author']} - ৳{$row['price']}</p>";
    }
}
?>

<a href="catalog.php">Back to Catalog</a>
