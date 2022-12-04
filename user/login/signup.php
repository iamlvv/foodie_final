<?php include('../../admin/config/config.php') ?>

<?php
    //Check whether the submit button is click or not
    if (isset($_POST["submit"])) 
    {
    //Get information from form
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        //Check whether form is complete or not
        if($password != $confirmpassword)
        {
            echo '<script language="javascript">alert("Password did not match.");</script>';
        }
        else
        {
            if ($fullname == "" || $username == "" || $email == "" || $password == ""|| $confirmpassword == "")
            {
                echo '<script language="javascript">alert("Please complete the form.");</script>';
            }
            else
            {
                //Chech whether the account already exits or not
                $sql = "select * from user where email='$email'";
                $kt = mysqli_query($mysqli, $sql);
                if(mysqli_num_rows($kt) > 0)
                {
                    echo '<script language="javascript">alert("This account already exits.");</script>';
                }
                else
                {
                    //Insert information to database
                    $sql = "INSERT INTO user(username, fullname, password, address, phone, email, user_image, user_type, created_date) VALUES ('$username', '$fullname', '$password', 'none', 'none', '$email', 'none', 'user', '2022-12-07')";
                    //Excute the query
                    if(mysqli_query($mysqli,$sql))
                    {
                        echo '<script language="javascript">alert("Sign up successfully."); window.location="login.php";</script>';
                    }
                    else
                    {
                        echo '<script language="javascript">alert("Sign up error, plase try again.");</script>';
                    }
                }
            }
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
        <title>Foodie - Sign up page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            /* font-family: 'Anek Devanagari', sans-serif; */
            body{
            background-color: rgb(236, 236, 236);
            }
            .signup{
                border: 0px;
                width: 30%;
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
        <!-- Sign up header starts -->
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
                    <li class="inline-block font-bold bg-white text-black w-24 py-2 my-3 text-center rounded-pill">
                        <a href="../login/signup.php" class=" hover:text-black hover:bg-white rounded-full px-3 py-2">Sign up</a>
                    </li>
                    <li class="inline-block font-bold bg-black text-white w-24 py-2 my-3 text-center rounded-pill mx-5">
                        <a href="../login/login.php" class=" hover:text-black hover:bg-white rounded-full px-3 py-2">Log in</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Sign up header ends -->
        <!-- Sign up form starts -->
        <div class="signup">
            <h1 class="text-center"><b>SIGN UP</b></h1><br>
            <form action="" method="POST" class="text-center">
                <input class="input" type="text" name="fullname" placeholder="&emsp;Full name"><br><br>
                <input class="input" type="text" name="username" placeholder="&emsp;User name"><br><br>
                <input class="input" type="text" name="email" placeholder="&emsp;Email"><br><br>
                <input class="input" type="password" name="password" placeholder="&emsp;Password"><br><br>
                <input class="input" type="password" name="confirmpassword" placeholder="&emsp;Confirm password"><br><br>
                <input type="submit" name="submit" value="Create account" class="font-bold bg-black text-white w-48 py-2 my-3 text-center rounded-pill"><br><br>
            </form>
            <p class="text-center">Already have an account?&emsp;&emsp;<a href="../login/login.php"><b><span style="color: rgb(95, 113, 166)">Log in</span></b></a></p>
        </div>
        <!-- Sign up form ends -->
    </body>
</html>