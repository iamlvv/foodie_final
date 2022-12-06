<?php 
    require_once './config.php';
    function removeFromDB($productId, $productQuantity) {
        $con = mysqli_connect('localhost', 'root', '', 'foodie_store');
        $sql = "DELETE FROM cart WHERE product_id = $productId";
        $result = mysqli_query($con, $sql);
        $sql2 = "UPDATE `product` SET `quantity` = `quantity` + $productQuantity WHERE product_id = ".$productId;
        $result2 = mysqli_query($con, $sql2);
        return $result;
    }
    removeFromDB($_POST['product_id'], $_POST['quantity']);
?>