<?php
session_start();

// Update quantity
if (isset($_POST['update'])) {
    foreach ($_POST['qty'] as $id => $quantity) {
        if ($quantity > 0) {
            $_SESSION['cart'][$id]['quantity'] = $quantity;
        }
    }
}

$grandTotal = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>

<h2>Your Shopping Cart</h2>

<?php if (empty($_SESSION['cart'])): ?>
    <p>Your cart is empty.</p>
    <a href="products.php">Continue Shopping</a>

<?php else: ?>

<form method="post">
<table border="1" cellpadding="10">
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th>Action</th>
    </tr>

<?php foreach ($_SESSION['cart'] as $id => $item): 
    $subtotal = $item['price'] * $item['quantity'];
    $grandTotal += $subtotal;
?>
<tr>
    <td><?php echo  $item['name'] ?></td>
    <td>$<?php echo  $item['price'] ?></td>
    <td>
        <input type="number" name="qty[<?php echo  $id ?>]" value="<?php echo  $item['quantity'] ?>" min="1">
    </td>
    <td>$<?php echo  $subtotal ?></td>
    <td><a href="remove_item.php?id=<?php echo  $id ?>">Remove</a></td>
</tr>
<?php endforeach; ?>

<tr>
    <td colspan="3"><b>Grand Total</b></td>
    <td colspan="2"><b>$<?php echo  $grandTotal ?></b></td>
</tr>
</table>

<br>
<input type="submit" name="update" value="Update Quantity">
</form>

<br>
<a href="products.php">Continue Shopping</a> |
<a href="empty_cart.php">Empty Cart</a>

<?php endif; ?>

</body>
</html>
