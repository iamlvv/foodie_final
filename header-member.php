<?php include('./config.php') ;
    if (isset($_POST['logout'])) {
        setcookie('user_id', null, -1 , "/"); // 86400 = 1 day
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/a4088ee5a6.js" crossorigin="anonymous"></script>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <!-- Tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Toast -->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    
    <title>Foodie - Homepage</title>

    <style>
        #toast-container
        {   
            margin-top: 60px;
        }
    </style>
    
</head>
<body>
    <!-- Header - Member -->
    <div class="h-16 z-10 fixed top-0 w-full">
        <div class="h-full float-left mx-5">
            <a href="<?php echo "./homepage-member.php"; ?>" title="Logo">
                <img
                src="./user/image/Foodie-logo.png" 
                alt="Restaurant Logo"
                class="h-full w-full"
                />
                <!-- Note: Đường dẫn ảnh -->
            </a>
        </div>
        <div class="bg-black h-full">
            <ul class="text-left h-full inline-block">
                <li class="inline-block font-bold bg-black text-white w-24 py-2 my-3 text-center">
                    <a href="<?php echo "./homepage-member.php"; ?>" class=" hover:text-black hover:bg-white rounded-full px-3 py-2 transition ease-in">Home</a>
                </li>
                <li class="inline-block font-bold bg-black text-white w-24 py-2 my-3 text-center">
                    <a href="./allProducts.php" class=" hover:text-black hover:bg-white rounded-full px-3 py-2 transition ease-in">Products</a>
                </li>
            </ul>
            <ul class="text-right h-full float-right">
                <li class="inline-block font-bold bg-black text-white w-24 py-2 my-3 text-center">
                    <a href="./cart.php" class=" hover:text-black hover:bg-white rounded-full px-3 py-2 transition ease-in">My cart</a>
                </li>
                <li class="inline-block font-bold bg-black text-white w-28 py-2 my-3 text-center">
                    <a href="./userDetail.php" class=" hover:text-black hover:bg-white rounded-full px-3 py-2 transition ease-in">My account</a>
                </li>
                <li class="inline-block font-bold bg-black text-white w-24 py-2 text-center">
                    <form method="POST">
                        <input type="submit" name="logout" class=" hover:text-black hover:bg-white rounded-full px-3 py-2 transition ease-in cursor-pointer" value="logout"/>
                    </form>
                    <!-- <a href="./index.php" class=" hover:text-black hover:bg-white rounded-full px-3 py-2 transition ease-in">Log out</a> -->
                </li>
            </ul>
        </div>
    </div>
    