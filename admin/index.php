<?php include('partials/header.php'); 
    if (!isset($_COOKIE['user_id'])) {
        header('Location: ../login.php');
    }
?>

<!-- Main Content Section Starts -->

<div class="w-full  bg-slate-300 bg-cover min-h-screen pt-10">
    <h1 class="font-bold text-5xl text-center mt-36 pb-10 ">DASHBOARD</h1>



    <div class="flex px-32 text-center ">
        <div class="flex flex-col bg-white rounded-lg shadow-md w-full m-5 overflow-hidden ">
            <img src="../user/image/food-icon.svg" class=" h-20 m-6" alt="food icon">
            <?php
            //Sql Query 
            $sql = "SELECT * FROM product";
            //Execute Query
            $res = $mysqli->query($sql);
            //Count Rows
            $count = $res->num_rows;
            ?>

            <h1 class="px-2 pb-5"><?php echo $count; ?></h1>

            <a href="manageProducts.php" class="bg-blue-500 text-white p-3 hover:bg-blue-800 transition-all duration-500">
                PRODUCT</a>
        </div>

        <div class="flex flex-col bg-white rounded-lg shadow-md w-full m-5 overflow-hidden ">
            <img src="../user/image/user-icon.svg" class=" h-20 m-6" alt="user icon">

            <?php
            //Sql Query 
            $sql2 = "SELECT * FROM user WHERE user_type = 'user'";
            //Execute Query
            $res2 = $mysqli->query($sql2);
            //Count Rows
            $count2 = $res2->num_rows;
            ?>

            <h1 class="font-bold px-2 pb-5"><?php echo $count2; ?></h1>

            <a href="viewUsers.php" class="bg-blue-500 text-white p-3 hover:bg-blue-800 transition-all duration-500">
                USER</a>
        </div>

        <div class="flex flex-col bg-white rounded-lg shadow-md w-full m-5 overflow-hidden ">
            <img src="../user/image/orders-icon.svg" class=" h-20 m-6" alt="order icon">
            <?php
            //Sql Query 
            $sql3 = "SELECT * FROM `order`";
            //Execute Query
            $res3 = $mysqli->query($sql3);
            //Count Rows
            $count3 = $res3->num_rows;
            ?>

            <h1 class="px-2 pb-5"><?php echo $count3; ?></h1>
            <a href="manageOrders.php" class="bg-blue-500 text-white p-3 hover:bg-blue-800 transition-all duration-500">
                ORDER</a>
        </div>

        <div class="flex flex-col bg-white rounded-lg shadow-md w-full m-5 overflow-hidden ">
            <img src="../user/image/feedback-icon.svg" class=" h-20 m-6" alt="order icon">
            <?php
            //Sql Query 
            $sql4 = "SELECT * FROM feedback";

            //Execute the Query
            $res4 = $mysqli->query($sql4);

            //Get the VAlue
            $count4 = $res4->num_rows;
            ?>
            <h1 class="px-2 pb-5"><?php echo $count4; ?></h1>
            <a href="manageFeedbacks.php" class="bg-blue-500 text-white p-3 hover:bg-blue-800 transition-all duration-500">
                FEEDBACK</a>
        </div>

    </div>

</div>

<!-- Main Content Setion Ends -->


 <?php include('partials/footer.php'); ?>


