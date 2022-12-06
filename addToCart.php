<?php
include('./config.php');
$product_id = $_POST['product_id'];
$user_id = $_COOKIE['user_id'];
$flag = 0;

$cart_result = ($mysqli->query("SELECT * FROM cart WHERE product_id=".$product_id))->fetch_assoc();
$pro_result = ($mysqli->query("SELECT * FROM product WHERE product_id=".$product_id))->fetch_assoc();

if($pro_result['quantity'] == 0)
{
    $flag = -1;
}
else
{
    $quantity = $pro_result['quantity'] - 1;
    $mysqli->query("UPDATE product SET `quantity` = $quantity WHERE `product_id` = $product_id");

    if(($mysqli->query("SELECT * FROM cart WHERE product_id=".$product_id))->num_rows == 0)
    {
        $product_name = $pro_result['product_name'];
        $price = $pro_result['price'];
        $product_image = $pro_result['product_image'];

        $mysqli->query("INSERT INTO `cart` (`user_id`, `product_id`, `product_name`, `price`, `quantity`, `product_image`) VALUES ('$user_id', '$product_id', '$product_name','$price', '1', '$product_image')");
    }
    else 
    {
        $quantity = $cart_result['quantity'] + 1;
        $mysqli->query("UPDATE cart SET `quantity` = $quantity WHERE `product_id` = $product_id");
    }
}
echo $output = $flag;
?>