<?php include('../../admin/config/config.php') ?>

<?php
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the data from Login form
        $email = $_POST['email'];
        $password = $_POST['password'];
        //2. SQL to check whether the user with email and password exit or not
        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        //3. Excute the query
        $res = mysqli_query($mysqli, $sql);
        //4. Count rows to check whether the user exits or not
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            //User available, check type
            $check_usertype = mysqli_query($mysqli, "SELECT * FROM user WHERE email='$email' AND password='$password' AND user_type='admin'");
            $check_usertype = mysqli_num_rows($check_usertype);
            if($check_usertype)
            {
                header("Location: http://localhost/foodie_final/admin/components/manageProducts.php");
            }
            else
            {
                header("Location: http://localhost/foodie_final/user/pages/homepage-member.php");
            }
        }
        else
        {
            //User not available and log in fail
            $_SESSION['login'] = "<div class='error text-center'>Email or password did not match.</div>";
        }
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
        <title>Foodie - Log in page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            body{
            background-color: rgb(236, 236, 236);
            }
            .login{
                border: 0px;
                width: 500px;
                background-color: white;
                border-radius: 12px;
                margin: 10% auto;
                padding: 2%;
            }
            .input{
                background-color:rgb(236, 236, 236);
                border-radius: 5px;
                width: 90%;
                height: 40px;   
            }
        </style>
    </head>
    <body>
        <!-- Log in guest header starts -->
        <div class="h-16">
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
                        <a href="<?php echo "../pages/homepage-guest.php"; ?>" class=" hover:text-black hover:bg-white rounded-full px-3 py-2">Home</a>
                    </li>
                    <li class="inline-block font-bold bg-black text-white w-24 py-2 my-3 text-center">
                        <a href="../products/allProducts.php" class=" hover:text-black hover:bg-white rounded-full px-3 py-2">Products</a>
                    </li>
                </ul>
                <ul class="text-right h-full float-right">
                    <li class="inline-block font-bold bg-black text-white w-24 py-2 my-3 text-center">
                        <a href="../login/signup.php" class=" hover:text-black hover:bg-white rounded-full px-3 py-2">Sign up</a>
                    </li>
                    <li class="inline-block font-bold bg-white text-black w-24 py-2 my-3 text-center rounded-pill mx-5">
                        <a href="../login/login.php" class=" hover:text-black hover:bg-white rounded-full px-3 py-2">Log in</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Log in guest header ends -->
        <!-- Login form starts -->
        <div class="login">
            <h1 class="text-center"><b>LOG IN</b></h1><br>
            <?php
                if(isset($_SESSION['login']))
                {
                    echo$_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <br><br>
            <form action="" method="POST" class="text-center">
                <input class="input" type="text" name="email" placeholder="&emsp;Email"><br><br>
                <input class="input" type="password" name="password" placeholder="&emsp;Password"><br>
                <input type="submit" name="submit" value="Log in" class="font-bold bg-black text-white w-24 py-2 my-3 text-center rounded-pill"><br>
            </form>
            <p class="text-center"><a href="../login/resetpassword.php"><b><span style="color: rgb(95, 113, 166)">Forgot password?</span></b></a></p><br><br>
            <p class="text-center">Don't have account?&emsp;&emsp;<a href="../login/signup.php"><b><span style="color: rgb(95, 113, 166)">Sign up</span></b></a></p>
        </div>
        <!-- Login form ends -->
    </body>
</html>



