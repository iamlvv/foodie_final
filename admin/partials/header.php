<?php

include('../config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website - Home Page</title>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <!-- 
    RTL version
-->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css" />



    <script src="https://kit.fontawesome.com/a4088ee5a6.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>






</head>


<body>

    <!-- Menu Section Starts -->
    <div class="h-16">
        <div class="h-full float-left mx-5">
            <a href="<?php echo "../pages/homepage-guest.php"; ?>" title="Logo">
                <img src="../user/image/Foodie-logo.png" alt="Restaurant Logo" class="w-auto h-full" />
            </a>
        </div>
        <div class="bg-black h-full">
            <ul class="text-right h-full  float-right pr-10">
                <li class="inline-block font-bold bg-black text-white w-24 py-2 my-3 text-center">
                    <a href="index.php" class=" hover:text-black hover:bg-white rounded-full px-3 py-2">Home</a>
                </li>
                <li class="inline-block font-bold bg-black text-white w-24 py-2 my-3 text-center">
                    <a href="../login.php" class=" hover:text-black hover:bg-white rounded-full px-3 py-2">Log out</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Menu Section Ends -->