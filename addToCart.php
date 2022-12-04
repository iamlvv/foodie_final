<?php
include('./config.php');
$product_id = $_POST['product_id'];
$user_id = $_COOKIE['user_id'];

$cart_result = $mysqli->query("SELECT * FROM cart WHERE product_id=".$product_id);
$product_result = $mysqli->query("SELECT * FROM product WHERE product_id=".$product_id);
$num_rows = $cart_result->num_rows;

if($num_rows == 0)
{
    while($result = $product_result->fetch_assoc())
    {
        $product_name = $result['product_name'];
        $price = $result['price'];
        $quantity = 1;
        $product_image = $result['product_image'];

        $result = $mysqli->query("INSERT INTO `cart` (`user_id`, `product_id`, `product_name`, `price`, `quantity`, `product_image`) VALUES ('$user_id', '$product_id', '$product_name','$price', '$quantity', '$product_image')");
    }
}
else
{
    while($result = $cart_result->fetch_assoc())
    {
        $quantity = $result['quantity'] + 1;
        $result = $mysqli->query("UPDATE cart SET `quantity` = $quantity WHERE `product_id` = $product_id");
    }
}
?>