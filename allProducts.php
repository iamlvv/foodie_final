<?php include('./header-member.php');
    if (!isset($_COOKIE['user_id'])) {
        header('Location: ./login.php');
    }
?>

<?php 
    $sql= "SELECT * FROM product";
    $result = $mysqli->query($sql);
    $count = $result->num_rows;
?>

<div class='my-20'>
    <h1 class='text-3xl pt-5 pl-10 mb-10 font-bold'>Products</h1>
    <div class='grid lg:grid-cols-5 md:grid-cols-4 ml-28 mr-28 gap-9 md:ml-10 md:mr-10'>
<?php
    if($count > 0)
    {
        while($rows = $result->fetch_assoc())
        {
?>        
        <div class='flex flex-col justify-center items-center bg-yellow-100 transition ease-in-out p-1 rounded-3xl hover:shadow-xl' >
            <div class='lg:w-40 lg:h-40 md:w-28 md:h-28 relative'>
                <a href="./productDetail.php?product_id=<?php echo $rows['product_id']?>">
                    <img src='<?php echo $rows['product_image']?>' alt='' class='lg:w-full h-auto max-w-full max-h-full top-0 bottom-0 left-0 right-0 absolute m-auto'/>
                </a>
            </div>
            <div class='flex flex-col justify-center items-center w-full h-40'>
                <h1 class='lg:text-base md:text-sm font-bold w-full h-14 text-center'><?php echo $rows['product_name']?></h1>
                <p class='lg:text-xl text-red-600 font-bold mt-3 md:text-base'>
                    <?php echo $rows['price']?> VND
                </p>
                <button class='rounded-full shadow-lg w-11 h-11 bg-white mt-2 cart-btn' value="<?php echo $rows['product_id']?>">
                    <img src="./user/image/product-cart-logo.png" alt='' class='block mx-auto w-1/2' />
                </button>
            </div>
        </div>
<?php
        }
    }
?>
    </div>
</div>
<script type=text/javascript>
    $(document).ready(function(){
        // Handle click - Add to cart-btn
        $('.cart-btn').click(function(){
            var product_id = $(this).val();

            $.ajax({
                method:'POST',
                url:'addToCart.php',
                data:{
                    product_id: product_id,
                },
                success:function(response){
                    if(response == -1)
                    {
                        toastr.warning('Out of stock!');
                    }
                    else 
                    {
                        toastr.success('Successfully add to cart');
                    }
                }
            });
        });
    }); 
</script>

<?php include('./footer.php')?>