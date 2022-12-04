<?php
include('./config.php');
$product_id = $_POST['product_id'];
$user_id = $_COOKIE['user_id'];

$result = ($mysqli->query("SELECT * FROM product WHERE product_id=".$product_id))->fetch_assoc();

$product_name = $result['product_name'];
$price = $result['price'];
$quantity = $result['quantity'];
$product_image = $result['product_image'];

$result = $mysqli->query("INSERT INTO `cart` (`user_id`, `product_id`, `product_name`, `price`, `quantity`, `product_image`) VALUES ('$user_id', '$product_id', '$product_name','$price', '$quantity', '$product_image')");

echo $product_id;
?>