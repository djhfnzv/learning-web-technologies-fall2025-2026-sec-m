<?php
session_start();

$products = [
    1 => ["name" => "Laptop", "price" => 60000],
    2 => ["name" => "Mouse", "price" => 500],
    3 => ["name" => "Keyboard", "price" => 1500],
    4 => ["name" => "Headphone", "price" => 2000],
    5 => ["name" => "Pendrive", "price" => 800]
];

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(!isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id] = 1;
    } else{
        $_SESSION['cart'][$id]++;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Catalog</title>
</head>
<body>

<h2>Product Catalog</h2>

<nav>
    <a href="index.php">Home</a> |
    <a href="cart.php">View Cart</a>
</nav>

<br><br>

<table border="1" cellpadding="5">
<tr>
    <th>Product</th>
    <th>Price</th>
    <th>Action</th>
</tr>

<?php foreach($products as $id => $p): ?>
<tr>
    <td><?php echo  $p['name'] ?></td>
    <td><?php echo  $p['price'] ?> BDT</td>
    <td>
        <a href="index.php?id=<?php echo  $id ?>">Add to Cart</a>
    </td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>
