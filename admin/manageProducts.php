<?php include('partials/header.php'); 
    if (!isset($_COOKIE['user_id'])) {
        header('Location: ../login.php');
    }
?>

<div class="flex w-full bg-white ">
    <?php include('partials/sideBar.php'); ?>

    <!-- modal add product-->
    <div id="addProductModal" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto  fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-96 min-w-max px-4 h-full md:h-auto my-0 mx-auto">
            <!-- Modal content -->
            <div class="bg-slate-500 rounded-lg shadow relative dark:bg-gray-700">
                <div class="flex justify-end p-2">
                    <button id="btnCloseAddProductModal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <form id="saveProduct" action="code.php" method="POST" class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8 " action="#">

                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">Add Product</h3>
                    <div id="errorMessage" class="alert alert-warning d-none"></div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="">
                            <label for="product_name" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Product name</label>
                            <input type="text" name="product_name" id="product_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-2.5 " placeholder="Pork - Ground" required="">
                        </div>
                        <div>
                            <label for="price" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Price</label>
                            <input type="text" name="price" id="price" placeholder="25000" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-2.5 " required="">
                        </div>

                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="quantity" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Quantity</label>
                            <input type="text" name="quantity" id="quantity" placeholder="50" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-2.5 " required="">
                        </div>
                        <div>
                            <label for="image" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Product image</label>
                            <input type="text" name="image" id="image" placeholder="http://dummyimage.com/134x100.png/ff4444/ffffff" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-2.5 " required="">
                        </div>

                    </div>

                    <div>
                        <label for="desc" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Description</label>
                        <input type="text" name="desc" id="desc" placeholder="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi placeat deleniti obcaecati " class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block min-w-full p-2.5 " required="">

                    </div>
                    <div class="flex flex-wrap justify-end align-middle">
                        <button type="submit" name="submit" class="btnSaveProduct w-48 my-0 mx-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal add product -->

    
    <div class="flex-1">
        <h1 class="text-center my-5 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl px-5">PRODUCTS
            <button data-modal-toggle="addProductModal" value="" type=" button" class="addProduct float-right text-white bg-slate-700 hover:bg-slate-800 focus:outline-none font-medium rounded-lg text-sm px-8 py-2.5 text-center ">ADD PRODUCT</button>
        </h1>
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
                        <div class="grid  bg-orange-100 text-center rounded-lg shadow-md m-5 overflow-hidden ">
                            <img src="<?= $product_image; ?>" class=" h-20 my-5 mx-auto" alt="order icon">
                            <h1 class="px-2"><?= $name; ?></h1>
                            <p class="mb-2"><?= $price; ?></p>
                            <button value="<?php echo $id; ?>" class="productInfo bg-blue-500 text-white p-3 hover:bg-blue-800 transition-all duration-500" type="button" name="view_detail" data-id="">
                                Details
                            </button>
                        </div>
                    </div>


            <?php
                }
            } else {
                 //Don't have product yet
                    echo " <div class='flex items-center justify-center border-solid border-4 border-gray-800 rounded-lg w-48 h-28 mx-auto my-0 font-bold'> NO PRODUCTS YET!!! </div>";
            }

            ?>


            </table>
        </div>

    </div>
</div>



<?php include('partials/footer.php'); ?>
