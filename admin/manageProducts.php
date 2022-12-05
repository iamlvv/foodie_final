<?php include('partials/header.php'); ?>

<div class="flex w-full bg-white ">
    <?php include('partials/sideBar.php'); ?>

    <div class="flex-1">
        <div class="wrapper grid grid-cols-4 gap-4">

            <?php
            //Create a SQL Query to Get all the Food
            $sql = "SELECT * FROM product";

            //Execute the qUery
            $res = $mysqli->query($sql);

            //Count Rows to check whether we have foods or not
            $count = $res->num_rows;

            //Create Serial Number VAriable and Set Default VAlue as 1
            $sn = 1;

            if ($count > 0) {
                //We have food in Database
                //Get the Foods from Database and Display
                while ($row = mysqli_fetch_assoc($res)) {
                    //get the values from individual columns
                    $id = $row['product_id'];
                    $name = $row['product_name'];
                    $price = $row['price'];
                    $product_image = $row['product_image'];
                    $description = $row['description'];
                    $quantity = $row['quantity'];

            ?>
                    <div class="">
                        <div class="grid bg-orange-100 flex flex-col bg-white rounded-lg shadow-md m-5 overflow-hidden ">
                            <img src="<?= $product_image; ?>" class=" h-20 m-6" alt="order icon">
                            <h1 class="px-2 pb-5"><?= $name; ?></h1>
                            <a href="manageFeedbacks.php" class="bg-blue-500 text-white p-3 hover:bg-blue-800 transition-all duration-500">
                                <?= $price; ?></a>
                        </div>
                    </div>

            <?php
                }
            } else {
                //Food not Added in Database
                echo "<tr> <td colspan='7' class='error'> . </td> </tr>";
            }

            ?>


            </table>
        </div>

    </div>
</div>



<?php include('partials/footer.php'); ?>