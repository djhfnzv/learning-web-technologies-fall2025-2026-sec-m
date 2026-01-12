<?php
session_start();

$products = [
    1 => ["name" => "Laptop", "price" => 60000],
    2 => ["name" => "Mouse", "price" => 500],
    3 => ["name" => "Keyboard", "price" => 1500],
    4 => ["name" => "Headphone", "price" => 2000],
    5 => ["name" => "Pendrive", "price" => 800]
];

$placed = false;

if(isset($_POST['place'])){
    $placed = true;
    session_destroy();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>

<h2>Checkout</h2>

<nav>
    <a href="index.php">Home</a> |
    <a href="cart.php">Cart</a>
</nav>

<br><br>

<?php if($placed): ?>
    <p><strong>Order placed successfully!</strong></p>
    <a href="index.php">Shop Again</a>
<?php else: ?>

<h3>Order Summary</h3>

<?php
$grandTotal = 0;
foreach($_SESSION['cart'] as $id => $qty){
    $total = $products[$id]['price'] * $qty;
    $grandTotal += $total;
    echo $products[$id]['name'] . " x $qty = $total <br>";
}
echo "<br><strong>Total: $grandTotal</strong><br><br>";
?>

<form method="post">
    Name:<br>
    <input type="text" name="name" required><br><br>

    Email:<br>
    <input type="email" name="email" required><br><br>

    <input type="submit" name="place" value="Place Order">
</form>

<?php endif; ?>

</body>
</html>
