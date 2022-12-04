<?php 
    require_once '../../admin/config/config.php';
    function removeFromDB($productId) {
        $con = mysqli_connect('localhost', 'root', '', 'foodie_store');
        $sql = "DELETE FROM cart WHERE product_id = $productId";
        $result = mysqli_query($con, $sql);
        return ;
    }
    removeFromDB($_POST['product_id']);
?>