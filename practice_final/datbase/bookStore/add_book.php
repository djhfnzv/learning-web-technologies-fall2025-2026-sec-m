<?php
include "db.php";
$message = "";

if (isset($_POST['add'])) {

    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $isbn = trim($_POST['isbn']);
    $price = $_POST['price'];
    $category = $_POST['category'];
    $stock = $_POST['stock'];
    $year = $_POST['year'];

    if ($title == "" || $author == "" || $isbn == "" || $price == "" || $category == "") {
        $message = "All fields are required";
    } elseif ($price <= 0) {
        $message = "Price must be positive";
    } else {

        $check = $conn->prepare("SELECT book_id FROM books WHERE isbn = ?");
        $check->bind_param("s", $isbn);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = "ISBN already exists";
        } else {
            $stmt = $conn->prepare(
                "INSERT INTO books (title, author, isbn, price, category, stock_quantity, publication_year)
                 VALUES (?, ?, ?, ?, ?, ?, ?)"
            );
            $stmt->bind_param("sssdsii", $title, $author, $isbn, $price, $category, $stock, $year);
            $stmt->execute();
            $message = "Book added successfully";
        }
    }
}
?>

<h2>Add Book</h2>

<form method="post">
Title: <input type="text" name="title"><br><br>
Author: <input type="text" name="author"><br><br>
ISBN: <input type="text" name="isbn"><br><br>
Price: <input type="number" step="0.01" name="price"><br><br>
Category: <input type="text" name="category"><br><br>
Stock Quantity: <input type="number" name="stock"><br><br>
Publication Year: <input type="number" name="year"><br><br>
<input type="submit" name="add" value="Add Book">
</form>

<p><?php echo $message; ?></p>
<a href="catalog.php">View Catalog</a>
