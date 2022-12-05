<?php include('partials/header.php');

if (isset($_GET['delete'])) {

    $delete_id = $_GET['delete'];
    $delete_message = $mysqli->prepare("DELETE FROM `order` WHERE order_id = ?");
    $delete_message->execute([$delete_id]);
    header('location:manageOrders.php');
}
?>




<div class="flex w-full bg-white ">
    <?php include('partials/sideBar.php'); ?>


    <div class="w-full overflow-x-auto relative shadow-md sm:rounded-lg">
        <h1 class="text-center mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl ">ORDERS</h1>

        <?php
        //Create a SQL Query to Get all the ORDER 
        $sql = "SELECT * FROM `order`";
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
                            TOTAL PRICE
                        </th>
                        <th scope="col" class="py-3 px-6 bg-slate-100">
                            ITEMS
                        </th>
                        <th scope="col" class="py-3 px-6 bg-slate-300">
                            ADDRESS
                        </th>
                        <th scope="col" class="py-3 px-6 bg-slate-100">
                            DESCRIPTION NOTE
                        </th>
                        <th scope="col" class="py-3 px-6 bg-slate-300">
                            PAYMENT METHOD
                        </th>
                        <th scope="col" class="py-3 px-6 bg-slate-100">
                            DATE
                        </th>
                        <th scope="col" class="py-3 px-6 bg-slate-300">
                            ACTION
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($row = $res->fetch_assoc()) {
                        //get the values from individual columns
                        $id = $row['order_id'];
                        $user_id = $row['user_id'];
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $phone = $row['phone'];
                        $email = $row['email'];
                        $address = $row['address'];
                        $total_products = $row['total_products'];
                        $total_price = $row['total_price'];
                        $desc_note = $row['desc_note'];
                        $payment_method = $row['payment_method'];
                        $created_date = $row['created_date'];

                    ?>
                        <tr class="border-b border-gray-400 ">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900  bg-slate-300 ">
                                <?php echo $id; ?>
                            </th>
                            <td class="py-4 px-6">
                                <?php echo ($first_name .  " "  . $last_name); ?>
                            </td>
                            <td class="py-4 px-6 bg-slate-300 ">
                                <?php echo $total_price; ?>
                            </td>
                            <td class="py-4 px-6">
                                <?php echo $total_products; ?>
                            </td>
                            <td class="py-4 px-6 bg-slate-300 ">
                                <?php echo $address; ?>
                            </td>
                            <td class="py-4 px-6">
                                <?php echo $desc_note; ?>
                            </td>
                            <td class="py-4 px-6 bg-slate-300">
                                <?php echo $payment_method; ?>
                            </td>
                            <td class="py-4 px-6">
                                <?php echo $created_date; ?>
                            </td>
                            <td class="py-4 px-6 bg-slate-300">
                                <a href="manageOrders.php?delete=<?php echo ($row['order_id']); ?>" onclick="return confirm('Do you really want to delete this order?');" class="  hover:text-white hover:bg-black rounded-full px-3 py-2"> <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>

                <?php

                    }
                } else {
                    //Don't have Order yet
                    echo " <div class='flex items-center justify-center border-solid border-4 border-gray-800 rounded-lg w-48 h-28 mx-auto my-0 font-bold'> NO ORDER YET!!! </div>";
                }

                ?>
                </tbody>
            </table>
    </div>


</div>

<?php include('partials/footer.php'); ?>