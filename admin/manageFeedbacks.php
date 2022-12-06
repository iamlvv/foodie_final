<?php include('partials/header.php');
if (!isset($_COOKIE['user_id'])) {
    header('Location: ../login.php');
}

if (isset($_GET['delete'])) {

    $delete_id = $_GET['delete'];
    $delete_message = $mysqli->prepare("DELETE FROM feedback WHERE feedback_id = ?");
    $delete_message->execute([$delete_id]);
    header('location:manageFeedbacks.php');
}
?>


<div class="flex w-full bg-white ">
    <?php include('partials/sideBar.php'); ?>


    <div class="w-full overflow-x-auto relative shadow-md sm:rounded-lg">
        <h1 class="text-center my-5 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">FEEDBACKS</h1>

        <?php
        //Create a SQL Query to Get all the ORDER 
        $sql = "SELECT * FROM feedback";
        //Execute the qUery
        $res = $mysqli->query($sql);

        //Count Rows to check whether we have orders or not
        $count = $res->num_rows;

        if ($count > 0) {
            //we have orders in DB
            //Get the orders from DB and Display
        ?>
            <table class="w-full text-sm  text-gray-500 text-center">
                <thead class="text-xs text-black font-bold uppercase border-b border-gray-800 ">
                    <tr>
                        <th scope="col" class="py-3 px-6 bg-slate-300 ">
                            ID
                        </th>
                        <th scope="col" class="py-3 px-6 bg-slate-100">
                            CUSTOMER
                        </th>
                        <th scope="col" class="py-3 px-6 bg-slate-300">
                            PRODUCT
                        </th>
                        <th scope="col" class="py-3 px-6 bg-slate-100">
                            CONTENT
                        </th>
                        <th scope="col" class="py-3 px-6 bg-slate-300">
                            DATE
                        </th>
                        <th scope="col" class="py-3 px-6 bg-slate-100">
                            ACTION
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($row = $res->fetch_assoc()) {
                        //get the values from individual columns
                        $id = $row['feedback_id'];
                        $user_id = $row['user_id'];
                        $product_id = $row['product_id'];
                        $content = $row['content'];
                        $created_date = $row['created_date'];
                        $res_userName = $mysqli->query("SELECT fullname FROM user WHERE user_id=$user_id");
                        $user_name = $res_userName->fetch_assoc();
                        $res_productName = $mysqli->query("SELECT product_name FROM product WHERE product_id=$product_id");
                        $product_name = $res_productName->fetch_assoc();
                    ?>
                        <tr class="border-b border-gray-400 ">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900  bg-slate-300 ">
                                <?php echo $id; ?>
                            </th>
                            <td class="py-4 px-6">
                                <?php echo implode($user_name); ?>
                            </td>
                            <td class="py-4 px-6 bg-slate-300 ">
                                <?php echo implode($product_name); ?>
                            </td>
                            <td class="py-4 px-6 ">
                                <?php echo $content; ?>
                            </td>
                            <td class="py-4 px-6 bg-slate-300">
                                <?php echo $created_date; ?>
                            </td>
                            <td class="py-4 px-6 ">
                                <a href="manageFeedbacks.php?delete=<?php echo ($row['feedback_id']); ?>" onclick="return confirm('Do you really want to delete this feedback?');" class="  hover:text-white hover:bg-black rounded-full px-3 py-2"> <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>

                <?php

                    }
                } else {
                    //Don't have Order yet
                    echo " <div class='flex items-center justify-center border-solid border-4 border-gray-800 rounded-lg w-48 h-28 mx-auto my-0 font-bold'> NO FEEDBACK YET!!! </div>";
                }

                ?>
                </tbody>
            </table>
    </div>
</div>
<?php include('partials/footer.php'); ?>
