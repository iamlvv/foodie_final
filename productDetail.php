<?php include('./header-member.php')?>

    <!-- Product information -->
<?php 
    $sql= "SELECT * FROM product WHERE product_id=";
    $result = $mysqli->query($sql.$_GET['product_id']);
    $count = $result->num_rows;
?>

<div class='my-20'>
    <h1 class='lg:text-3xl md:text-2xl pt-5 pl-10 mb-5 font-bold'>Product Information</h1>
    <div class='grid grid-cols-2 h-full mx-28 gap-5 md:ml-10 md:mr-10 items-center'>
        
<?php
    if($count > 0)
    {
        while($rows = $result->fetch_assoc())
        {
?>        

        <img src='<?php echo $rows['product_image']?>' alt='' class='w-full flex relative p-3 my-3 rounded-2xl'/>

        <div class='flex flex-col w-full bg-gray-100 rounded-2xl p-5'>
            <h1 class='lg:text-2xl font-bold md:text-base w-full h-14 text-left font-serif'><?php echo $rows['product_name']?></h1>
            <p class='text-base lg:mb-20 md:mb-5 opacity-60 font-serif'>
                <?php echo $rows['description']?>
            </p>
            <p class='lg:text-2xl text-red-600 font-bold mt-2 md:text-base'>
                <?php echo $rows['price']?> VND
                <button class='rounded-3xl shadow-lg my-3 float-right mr-5 text-xl bg-black px-5 py-2 text-white cart-btn hover:bg-white hover:text-black transition ease-in' value="<?php echo $_GET['product_id']?>">
                    Add to cart
                </button>
            </p>
        </div>     
   
<?php
        }
    }
?>
    </div>
    <!-- Feedback -->
    <hr class='mx-auto w-11/12 border-1 border-black-300 my-5'>
    <div class="h-full">
        <h1 class='lg:text-3xl md:text-2xl pt-5 pl-10 mb-5 font-bold'>Customer feedback</h1>
        <div id="feedback">

<?php
    $sql= "SELECT * FROM feedback WHERE product_id=";
    $result = $mysqli->query($sql.$_GET['product_id']);
    $count = $result->num_rows;

    if($count > 0)
    {
        while($rows = $result->fetch_assoc())
        {
            $user_info = ($mysqli->query("SELECT * FROM user WHERE user_id=".$rows['user_id']))->fetch_assoc();
            $user_avatar = $user_info['user_image'];
            $user_name = $user_info['username'];
?>
        <div class="mx-14 my-5 rounded-2xl bg-gray-200 p-3">
            <img src="<?php echo $user_avatar?>" alt="user-avatar" class="w-10 h-10 rounded-full overflow-hidden inline float-left">
            <div class="float-left mx-3 text-sm font-bold">
                <p><?php echo $user_name?></p>
                <p><?php echo $rows['created_date']?></p>
            </div>
            <p class="pt-10 pb-3 mt-2">
                <?php echo $rows['content']?>
            </p>
        </div>
<?php
        }
    }
?>
        </div>
        <textarea placeholder="Write your feedback here..." name="textarea" class="p-3 border-gray border active:border-black border-solid lg:ml-14 md:ml-16 hover:shadow-xl lg:w-11/12 md:w-10/12 h-44 resize-none"></textarea>
        <div class="h-12 mb-7 mt-5">
            <button class='block rounded-3xl shadow-lg float-right mr-10 text-2xl font-bold bg-black px-6 py-2 text-white submit-btn hover:bg-white hover:text-black transition ease-in' value="<?php echo $_GET['product_id']?>">
                Post
            </button>
            <button class='block rounded-3xl shadow-lg float-right mr-5 text-2xl font-bold bg-black px-6 py-2 text-white cancel-btn hover:bg-white hover:text-black transition ease-in'>
                Cancel
            </button>
        </div>
    </div>
</div>
    <!-- Ajax -->
<script type=text/javascript>
    $(document).ready(function(){
        // Handle click - Submit-btn
            $('.submit-btn').click(function(){
                var content = $("textarea").val();
                var product_id = $(this).val();

                $.ajax({
                    method:'POST',
                    url:'addFeedback.php',
                    data:{
                        product_id: product_id,
                        content: content
                    },
                    success:function(response){
                        $('#feedback').html(response);
                        $('textarea').val('');
                    }
                });
            });
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
                        toastr.success('Successfully add to cart');
                    }
                });
            });
        // Handle click - Cancel-btn
            $('.cancel-btn').click(function(){
                $('textarea').val('');
            });
        });
</script>

<?php include('./footer.php')?>