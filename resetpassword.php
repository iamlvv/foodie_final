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
            @media all and (min-width: 1024px) {
                .resetpassword{
                    border: 0px;
                    width: 500px;
                    background-color: white;
                    border-radius: 12px;
                    margin: 100px auto;
                    padding: 20px;
                }
                .input{
                    background-color:rgb(236, 236, 236);
                    border-radius: 5px;
                    width: 400px;
                    height: 40px;   
                }
            }
            @media all and (min-width: 768px) {
                .resetpassword{
                    border: 0px;
                    width: 375px;
                    background-color: white;
                    border-radius: 12px;
                    margin: 100px auto;
                    padding: 15px;
                }
                .input{
                    background-color:rgb(236, 236, 236);
                    border-radius: 5px;
                    width: 300px;
                    height: 30px;   
                }
                .h1{
                    font-size: 20px;
                }
            }
        </style>
    </head>
    <body>
        <div class="resetpassword">
            <h1 class="font-bold mb-5 text-center text-2xl">RESET YOUR PASSWORD</h1>
            <p class="text-center text-muted">Enter your email</p>
            <br><br>
            <form action="" method="POST" class="text-center">
                <div class="mb-5">
                <input class="input pl-5" type="text" name="email" placeholder="Email" required>
                </div>
                <div class="mb-5">
                <input class="input pl-5" type="text" name="newpassword" placeholder="New password" required>
                </div>
                <div class="mb-5">
                <input class="input pl-5" type="text" name="confirmnewpassword" placeholder="Confirm new password" required>
                </div>
                <input type="submit" name="submit" value="Reset password" class="font-bold bg-black text-white w-48 py-2 my-3 text-center hover:bg-white hover:text-black rounded-3xl transition ease-in cursor-pointer"><br><br>
            </form>
            <p class="text-center">Don't have account?&emsp;&emsp;<a href="./signup.php"><b><span style="color: rgb(95, 113, 166)">Sign up</span></b></a></p>
        </div>
    </body>
    <?php
        include('./footer.php');    
    ?>
</html>

