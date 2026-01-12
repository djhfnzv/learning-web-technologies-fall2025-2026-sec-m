<?php
include "db.php";

$limit = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$count = $conn->query("SELECT COUNT(*) AS total FROM books");
$total = $count->fetch_assoc()['total'];
$total_pages = ceil($total / $limit);

$stmt = $conn->prepare("SELECT * FROM books LIMIT ?, ?");
$stmt->bind_param("ii", $offset, $limit);
$stmt->execute();
$result = $stmt->get_result();
?>

<h2>Book Catalog</h2>
<a href="search.php">Search Books</a><br><br>

<?php while ($row = $result->fetch_assoc()) { ?>
    <div>
        <img src="https://via.placeholder.com/100"><br>
        <b><?php echo $row['title']; ?></b><br>
        Author: <?php echo $row['author']; ?><br>
        Price: ৳<?php echo $row['price']; ?><br>
        Status: <?php echo ($row['stock_quantity'] > 0) ? "In Stock" : "Out of Stock"; ?><br>
        <a href="details.php?id=<?php echo $row['book_id']; ?>">View Details</a>
    </div>
    <hr>
<?php } ?>

<?php
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a href='catalog.php?page=$i'>$i</a> ";
}
?>
