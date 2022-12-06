<?php 
    include('./config.php');
    include ('./header-guest.php'); ?>
<?php
    if (isset($_POST["submit"]))
    {
        //Check email is exit or not
        $email = $_POST["email"];
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $kq = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($kq) == 0)
        {
            echo '<script language="javascript">alert("Email doesnot exit.");</script>';
        }
        else
        {
            //Create new random password in database
            $newpassword = substr(md5(rand(0, 999999)), 0, 8);
            $sql = "UPDATE user SET password='$newpassword' WHERE email = '$email'";
            if(mysqli_query($mysqli, $sql))
            {
                //echo "thanh cong"
                echo '<script language="javascript">alert("Your new password is sent to your email.");</script>';
            }
            else
            {
                echo '<script language="javascript">alert("Reset password error, plase try again.");</script>';
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
        <title>Foodie - Reset password page</title>
        <style>
            body{
            background-color: rgb(236, 236, 236);
            }
            .resetpassword{
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
        
        <!-- Log in guest header ends -->
        <!-- Reset password form starts -->
        <div class="resetpassword">
            <h1 class="text-center"><b>FORGOT YOUR PASSWORD?</b></h1><br>
            <p class="text-center text-muted">We'll send you a new password</p>
            <br><br>
            <form action="" method="POST" class="text-center">
                <input class="input" type="text" name="email" placeholder="&emsp;Email"><br><br>
                <input type="submit" name="submit" value="Reset password" class="font-bold bg-black text-white w-48 py-2 my-3 text-center rounded-pill"><br><br>
            </form>
            <p class="text-center">Don't have account?&emsp;&emsp;<a href="./signup.php"><b><span style="color: rgb(95, 113, 166)">Sign up</span></b></a></p>
        </div>
        <!-- Login form ends -->
    </body>
</html>

