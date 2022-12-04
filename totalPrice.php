<?php 
    function getTotalPrice() {
        $con = mysqli_connect('localhost', 'root', '','foodie_store');
        $totalPrice = 0;
        $result = $con->query("SELECT * FROM product");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        //Itemcart($row['product_id'], $row['product_name'], $row['price'], $row['quantity'], $row['product_image']);
                        $totalPrice += $row['price'] * $row['quantity'];
                    }
                }
        return $totalPrice;
    }
    getTotalPrice();
?>