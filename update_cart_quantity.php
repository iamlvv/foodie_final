<?php 
    require_once './config.php';
    
    function updateCartQuantity($productId, $productQuantity, $flag) {
        $con = mysqli_connect('localhost', 'root', '','foodie_store');
        $result = 0;
        if ($flag == 0) {
            $query = "UPDATE `cart` SET `quantity` = '$productQuantity' WHERE product_id = ".$productId;
            $result = mysqli_query($con, $query);
            $query2 = "UPDATE `product` SET `quantity` = `quantity` - 1 WHERE product_id = ".$productId;
            $result2 = mysqli_query($con, $query2);
        }
        else if ($flag == 1) {
            $query = "UPDATE `cart` SET `quantity` = '$productQuantity' WHERE product_id = ".$productId;
            $result = mysqli_query($con, $query);
            $query2 = "UPDATE `product` SET `quantity` = `quantity` + 1 WHERE product_id = ".$productId;
            $result2 = mysqli_query($con, $query2);
        }
        
        //getTotalPrice();
        return $result;
    }
    updateCartQuantity($_POST['product_id'], $_POST['quantity'], $_POST['flag']);
?>