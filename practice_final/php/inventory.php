<?php
$products = [
    [
        "name" => "Laptop",
        "price" => 60000,
        "quantity" => 5,
        "category" => "Electronics"
    ],
    [
        "name" => "Mouse",
        "price" => 500,
        "quantity" => 20,
        "category" => "Electronics"
    ],
    [
        "name" => "Chair",
        "price" => 3000,
        "quantity" => 10,
        "category" => "Furniture"
    ],
    [
        "name" => "Notebook",
        "price" => 100,
        "quantity" => 50,
        "category" => "Stationery"
    ],
    [
        "name" => "Pen",
        "price" => 20,
        "quantity" => 100,
        "category" => "Stationery"
    ]
];

$discounts = [
    "Electronics" => 10,
    "Furniture" => 15,
    "Stationery" => 5
];

function getDiscountedPrice($price, $discount){
    return $price -($price * $discount / 100);
}

function getMostExpensiveProduct($products){
    $maxProduct = $products[0];

    foreach($products as $product){
        if($product['price'] > $maxProduct['price']){
            $maxProduct = $product;
        }
    }
    return $maxProduct;
}

$totalInventoryValue = 0;
foreach($products as $product){
    $totalInventoryValue += $product['price'] * $product['quantity'];
}

$expensiveProduct = getMostExpensiveProduct($products);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory Management</title>
</head>
<body>

<h2>Product Inventory</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Discount(%)</th>
        <th>Discounted Price</th>
    </tr>

    <?php foreach($products as $product): 
        $discount = $discounts[$product['category']];
        $discountedPrice = getDiscountedPrice($product['price'], $discount);
    ?>
    <tr>
        <td><?php echo  $product['name'] ?></td>
        <td><?php echo  $product['category'] ?></td>
        <td><?php echo  $product['price'] ?></td>
        <td><?php echo  $product['quantity'] ?></td>
        <td><?php echo  $discount ?></td>
        <td><?php echo  number_format($discountedPrice, 2) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<br>

<h3>Most Expensive Product</h3>
<p>
    Name: <?php echo  $expensiveProduct['name'] ?><br>
    Price: <?php echo  $expensiveProduct['price'] ?>
</p>

<h3>Total Inventory Value</h3>
<p><?php echo  $totalInventoryValue ?></p>

</body>
</html>
