<?php
//require_once '../../admin/config/config.php';
include('./header-member.php');
function Itemcart($productId, $productName, $productPrice, $productQuantity, $productImg)
{
    $element = "
        <div class='grid grid-cols-5 mb-5 '>
        <div class='col-span-1'>
            <img src={$productImg} alt='' class='mx-auto w-1/2' />
        </div>
        <div class='col-span-3 flex flex-col'>
            <div>
                $productName
            </div>
            <div class=''>
                $productPrice
            </div>
        </div>
        <div class='col-span-1 flex flex-col'>
            <div>
                <div class='flex flex-end items-center '>
                    <button type='button' class='text-3xl' onclick = 'handleDecrease($productId, $productPrice)'>-</button>
                    <input type='text' placeholder={$productQuantity} disabled class='w-12 text-center bg-white text-black' id='input-quantity-$productId' value='$productQuantity'/>
                    <button type='button' class='text-3xl' onclick = 'handleIncrease($productId, $productPrice)'>+</button>
                </div>
            </div>
            <div>
                <button class='bg-red-500 text-white rounded-md px-3 py-1 mt-5 hover:bg-red-700 transition ease-in' onclick ='handleRemove($productId, $productQuantity)'>Remove</button>
            </div>
        </div>
    </div>
        ";
    echo $element;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        function handleIncrease(productId, productPrice) {
            var inputQuantityElement = $("#input-quantity-" + productId);
            var newQuantity = parseInt($(inputQuantityElement).val()) + 1;
            var newPrice = newQuantity * productPrice;
            var flag = 0;
            saveToDB(productId, newQuantity, newPrice, flag);
            //var value = document.getElementById("$productId").value;
            //console.log(value);
            //getTotalPrice();
            newPrice = "<?php 
                $totalPrice = 0;
                $result = $mysqli->query("SELECT * FROM cart");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        //Itemcart($row['product_id'], $row['product_name'], $row['price'], $row['quantity'], $row['product_image']);
                        $totalPrice += $row['price'] * $row['quantity'];
                    }
                }
                echo $totalPrice;
            ?>"
            document.getElementById("totalPrice").value = newPrice + " VND";
        }

        function handleDecrease(productId, productPrice) {
            var inputQuantityElement = $("#input-quantity-" + productId);
            var flag = 1;
            if ($(inputQuantityElement).val() > 1) {
                var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
                var newPrice = newQuantity * productPrice;
                saveToDB(productId, newQuantity, newPrice, flag);
            }
            else {
                handleRemove(productId, 1);
            }
        }

        function saveToDB(productId, newQuantity, newPrice, flag) {
            var inputQuantityElement = $("#input-quantity-" + productId);
            //var priceElement = $("#price-" + productId);
            $.ajax({
                url: "update_cart_quantity.php",
                data: "product_id=" + productId + "&quantity=" + newQuantity + "&flag=" + flag,
                type: "POST",
                success: function (response) {
                    $(inputQuantityElement).val(newQuantity);
                    window.location.reload();
                    // var totalQuantity = 0;
                    // $("input[id*='input-quantity-']").each(function () {
                    //     var cart_quantity = $(this).val() * newPrice;
                    //     totalQuantity += parseInt(cart_quantity);
                    // });
                    // $("#totalPrice").val(totalQuantity);
                    
                }
            })
        }
        function getTotalPrice() {
            $.ajax({
                url: 'totalPrice.php',
                type: "GET",
                success: function (response) {
                    $("#totalPrice").val(response);
                }
            })
        }
        function handleRemove(productId, productQuantity) {
            $.ajax({
                url: "remove_cart_item.php",
                data: "product_id=" + productId + "&quantity=" + productQuantity,
                type: "POST",
                success: function (response) {
                    window.location.reload();
                }
            })
        }
    </script>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class=" bg-gray-200 pb-10 pt-20 mt-10" id='main-bg'>
        <div class="shadow-lg lg:ml-32 lg:mr-32 bg-white lg:grid lg:grid-cols-3 md:ml-20 md:mr-20">
            <div class="col-span-2 lg:mt-10 mb-5 md:pt-10">
                <?php
                $totalPrice = 0;
                $userId = $_COOKIE['user_id'];
                $result = $mysqli->query("SELECT * FROM cart WHERE user_id = $userId");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        Itemcart($row['product_id'], $row['product_name'], $row['price'], $row['quantity'], $row['product_image']);
                        $totalPrice += $row['price'] * $row['quantity'];
                    }
                } else {
                    echo "<h5 class='ml-10'>Your cart is empty now. <a href='./homepage-member.php' class='font-bold'>Continue shopping.</a></h5>";
                }
                // while ($row = $result->fetch_assoc()) {
                //     Itemcart($row['product_id'], $row['product_name'], $row['price'], $row['quantity'], $row['product_image']);
                //     $totalPrice += (int)$row['price'];
                // }
                ?>
            </div>
            <div class="text-center">
                <div class="grid grid-cols-2 mt-20 font-bold">
                    <p>Total</p>
                    <input class="text-red-500" id='totalPrice' value= "<?php echo $totalPrice; ?> VND"/>
                </div>
                <?php 
                    if ($totalPrice > 0) {
                        echo "<button class='bg-sky-500 py-3 px-6 font-bold rounded-3xl mt-10 mb-5 shadow-lg hover:text-white transition ease-in hover:font-bold'><a href='./checkout.php'>Checkout</a></button>";
                    }
                    else {
                        echo "<button class='bg-gray-500 py-3 px-6 font-bold rounded-3xl mt-10 mb-5 shadow-lg transition ease-in' disabled>Checkout</button>";
                    }
                ?>
            </div>
        </div>
    </div>
    <?php include('./footer.php') ?>
</body>

</html>