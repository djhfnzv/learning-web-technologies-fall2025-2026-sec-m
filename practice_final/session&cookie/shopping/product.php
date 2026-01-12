<?php
session_start();

// Product list
$products = [
    1 => ["name" => "Laptop", "price" => 800],
    2 => ["name" => "Mouse", "price" => 20],
    3 => ["name" => "Keyboard", "price" => 30],
    4 => ["name" => "Headphone", "price" => 50],
    5 => ["name" => "Monitor", "price" => 200]
];

// Add to cart
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $_SESSION['cart'][$id] = [
            'name' => $products[$id]['name'],
            'price' => $products[$id]['price'],
            'quantity' => 1
        ];
    }

    header("Location: products.php");
    exit;
}

// Cart item count
$count = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $count += $item['quantity'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>

<h2>Electronics Store</h2>
<p>🛒 Cart Items: <?php echo  $count ?> | <a href="cart.php">View Cart</a></p>

<hr>

<?php foreach ($products as $id => $product): ?>
    <p>
        <b><?php echo  $product['name'] ?></b><br>
        Price: $<?php echo  $product['price'] ?><br>
        <img src="https://via.placeholder.com/100"><br>
        <a href="products.php?id=<?php echo  $id ?>">Add to Cart</a>
    </p>
    <hr>
<?php endforeach; ?>

</body>
</html>
