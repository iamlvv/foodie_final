<?php 
    require_once './config.php';
    function insertToDB($orderId, $userId, $firstname, $lastname, $phone, $email, $address, $totalProducts, $totalPrice, $note, $paymentmethod, $date) {
        $userId = $_COOKIE['user_id'];
        $con = mysqli_connect('localhost', 'root', '','foodie_store');
        $query = "INSERT INTO `order` (`order_id`, `user_id`, `first_name`, `last_name`, `phone`, `email`, `address`, `total_products`, `total_price`, `desc_note`, `payment_method`, `created_date`) VALUES (NULL, '$userId', '$firstname', '$lastname', '$phone', '$email', '$address', '$totalProducts', '$totalPrice', '$note', '$paymentmethod', '$date')";
        $result = mysqli_query($con, $query);
        return $result;
    }
    insertToDB($_POST['order_id'], $_POST['user_id'], $_POST['first_name'], $_POST['last_name'], $_POST['phone'], $_POST['email'], $_POST['address'], $_POST['total_products'], $_POST['total_price'], $_POST['desc_note'], $_POST['payment_method'], $_POST['created_date']);
?>