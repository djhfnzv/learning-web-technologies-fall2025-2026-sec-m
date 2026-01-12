<?php
include "db.php";

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM books WHERE book_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$book = $stmt->get_result()->fetch_assoc();
?>

<h2><?php echo $book['title']; ?></h2>
<img src="https://via.placeholder.com/150"><br><br>

Author: <?php echo $book['author']; ?><br>
ISBN: <?php echo $book['isbn']; ?><br>
Price: ৳<?php echo $book['price']; ?><br>
Category: <?php echo $book['category']; ?><br>
Stock: <?php echo $book['stock_quantity']; ?><br>
Year: <?php echo $book['publication_year']; ?><br>

<hr>
<h3>Related Books</h3>

<?php
$rel = $conn->prepare(
    "SELECT book_id, title FROM books WHERE category = ? AND book_id != ? LIMIT 3"
);
$rel->bind_param("si", $book['category'], $id);
$rel->execute();
$r = $rel->get_result();

while ($row = $r->fetch_assoc()) {
    echo "<a href='details.php?id={$row['book_id']}'>{$row['title']}</a><br>";
}
?>

<br>
<a href="catalog.php">Back to Catalog</a>
