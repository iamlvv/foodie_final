<?php include('partials/header.php');
if (!isset($_COOKIE['user_id'])) {
    header('Location: ../login.php');
}
?>
<div class="flex w-full bg-white ">
<?php include('partials/sideBar.php');?>

    <div class="flex-1">
        <div class="wrapper grid grid-cols-4 gap-4">

            <?php
            //Create a SQL Query to Get all the Food
            $sql = "SELECT * FROM user WHERE user_type = 'user'";

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
                    $id = $row['user_id'];
                    $user_fullName = $row['fullname'];
                    $username = $row['username'];
                    $address = $row['address'];
                    $phone = $row['phone'];
                    $email = $row['email'];
                    $user_image = $row['user_image'];
                    $user_type = $row['user_type'];
                    $created_date = $row['created_date'];

            ?>
                    <div class="">
                        <div class=" bg-orange-100 grid flex-col  rounded-lg shadow-md m-5 overflow-hidden ">
                            <img src="<?= $user_image; ?>" class=" h-20 m-6" alt="order icon">
                            <h1 class="px-2 pb-5"><?= $user_fullName; ?></h1>

                            <button value="<?php echo $id; ?>" class="userInfo bg-blue-500 text-white p-3 hover:bg-blue-800 transition-all duration-500" type="button" name="view_detail" data-id="">
                                Details
                            </button>
                        </div>
                    </div>
            <?php
                }
            } else {
                //Food not Added in Database
                echo "<tr> <td colspan='7' class='error'> . </td> </tr>";
            }
            ?>
        </div>
    </div>
</div>

<?php include('partials/modal.php'); ?>
<?php include('partials/footer.php'); ?>