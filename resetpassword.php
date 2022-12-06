<?php 
    include('./config.php');
    include ('./header-guest.php'); ?>
<?php
    if (isset($_POST["submit"]))
    {
        //Check email is exit or not
        $email = $_POST["email"];
        $newpassword = $_POST['newpassword'];
        $confirmnewpassword = $_POST['confirmnewpassword'];
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $kq = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($kq) == 0)
        {
            echo '<script language="javascript">alert("Email doesnot exit.");</script>';
        }
        else
        {
            if($newpassword != $confirmnewpassword)
        {
            echo '<script language="javascript">alert("New password did not match.");</script>';
        }
        else
        {
            $sql = "UPDATE user SET password='$newpassword' WHERE email = '$email'";
            if(mysqli_query($mysqli, $sql))
            {
                echo '<script language="javascript">alert("Reset password successfully.");window.location="login.php";</script>';
            }
            else
            {
                echo '<script language="javascript">alert("Reset password error, please try again.");</script>';
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
        <div class="resetpassword">
            <h1 class="text-center"><b>RESET YOUR PASSWORD</b></h1><br>
            <p class="text-center text-muted">Enter your email</p>
            <br><br>
            <form action="" method="POST" class="text-center">
                <input class="input" type="text" name="email" placeholder="&emsp;Email"><br><br>
                <input class="input" type="text" name="newpassword" placeholder="&emsp;New password"><br><br>
                <input class="input" type="text" name="confirmnewpassword" placeholder="&emsp;Confirm new password"><br><br>
                <input type="submit" name="submit" value="Reset password" class="font-bold bg-black text-white w-48 py-2 my-3 text-center rounded-pill"><br><br>
            </form>
            <p class="text-center">Don't have account?&emsp;&emsp;<a href="./signup.php"><b><span style="color: rgb(95, 113, 166)">Sign up</span></b></a></p>
        </div>
    </body>
</html>

