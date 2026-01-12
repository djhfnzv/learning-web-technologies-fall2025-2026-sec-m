<?php
session_start();

$products = [
    1 => ["name" => "Laptop", "price" => 60000],
    2 => ["name" => "Mouse", "price" => 500],
    3 => ["name" => "Keyboard", "price" => 1500],
    4 => ["name" => "Headphone", "price" => 2000],
    5 => ["name" => "Pendrive", "price" => 800]
];

if (isset($_POST['update'])) {
    foreach ($_POST['qty'] as $id => $q) {
        if ($q <= 0) {
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id] = $q;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>

<h2>Your Cart</h2>

<nav>
    <a href="index.php">Home</a> |
    <a href="cart.php">Cart</a>
</nav>

<br><br>

<?php
if (empty($_SESSION['cart'])) {
    echo "<p>Cart is empty.</p>";
    exit;
}
?>

<form method="post">
<table border="1" cellpadding="5">
<tr>
    <th>Product</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
</tr>

<?php
$grandTotal = 0;

foreach ($_SESSION['cart'] as $id => $qty):
    $price = $products[$id]['price'];
    $total = $price * $qty;
    $grandTotal += $total;
?>
<tr>
    <td><?php echo  $products[$id]['name'] ?></td>
    <td><?php echo  $price ?></td>
    <td>
        <input type="number" name="qty[<?php echo  $id ?>]" value="<?php echo  $qty ?>">
    </td>
    <td><?php echo  $total ?></td>
</tr>
<?php endforeach; ?>

<tr>
    <td colspan="3"><strong>Grand Total</strong></td>
    <td><strong><?php echo  $grandTotal ?></strong></td>
</tr>
</table>

<br>
<input type="submit" name="update" value="Update Cart">
</form>

<br>
<a href="checkout.php">Proceed to Checkout</a>

</body>
</html>
