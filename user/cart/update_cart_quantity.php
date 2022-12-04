<?php 
    require_once '../../admin/config/config.php';
    
    function updateCartQuantity($productId, $productQuantity) {
        $con = mysqli_connect('localhost', 'root', '','foodie_store');
        $query = "UPDATE `cart` SET `quantity` = '$productQuantity' WHERE product_id = ".$productId;
        $result = mysqli_query($con, $query);
        //getTotalPrice();
        return $result;
    }
    updateCartQuantity($_POST['product_id'], $_POST['quantity']);
?>