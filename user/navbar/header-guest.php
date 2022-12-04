<?php include('../../admin/config/config.php') ?>

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
    <title>Foodie - Homepage</title>
    <style>
        * {
            /* font-family: 'Anek Devanagari', sans-serif; */
        }
    </style>
</head>
<body>
    <!-- Header - Guest -->
    <div class="h-16 z-10 fixed top-0 w-full">
        <div class="h-full float-left mx-5">
            <a href="<?php echo "../pages/homepage-guest.php"; ?>" title="Logo">
                <img
                    src="../image/Foodie-logo.png"
                    alt="Restaurant Logo"
                    class="w-auto h-full"
                />
            </a>
        </div>

        <div class="bg-black h-full">
            <ul class="text-left h-full inline-block">
                <li class="inline-block font-bold bg-black text-white w-24 py-2 my-3 text-center">
                    <a href="<?php echo "../pages/homepage-guest.php"; ?>" class=" hover:text-black hover:bg-white rounded-full px-3 py-2 transition ease-in">Home</a>
                </li>
                <li class="inline-block font-bold bg-black text-white w-24 py-2 my-3 text-center">
                    <a href="../products/allProducts.php" class=" hover:text-black hover:bg-white rounded-full px-3 py-2 transition ease-in">Products</a>
                </li>
            </ul>
            <ul class="text-right h-full float-right">
                <li class="inline-block font-bold bg-black text-white w-24 py-2 my-3 text-center">
                    <a href="../login/signup.php" class=" hover:text-black hover:bg-white rounded-full px-3 py-2 transition ease-in">Sign up</a>
                </li>
                <li class="inline-block font-bold bg-black text-white w-24 py-2 my-3 text-center">
                    <a href="../login/login.php" class=" hover:text-black hover:bg-white rounded-full px-3 py-2 transition ease-in">Log in</a>
                </li>
            </ul>
        </div>
    </div>