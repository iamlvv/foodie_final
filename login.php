<?php
    include ('./header-guest.php');
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the data from Login form
        $mysqli = mysqli_connect('localhost', 'root', '', 'foodie_store');
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


            $result = $mysqli->query("SELECT `user_id` FROM `user` WHERE `email` = '$email' AND `password` = '$password'");
            $user_id = $result->fetch_assoc();
            setcookie('user_id', $user_id['user_id'], time() + (86400), "/"); // 86400 = 1 day
            if($check_usertype)
            {
                //User is admin
                header("Location: http://localhost/foodie_final/admin/index.php");
            }
            else
            {
               
                //print_r($_SESSION);
                //User available and login success
                header("Location: http://localhost/foodie_final/homepage-member.php");
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
        <style>
            body{
            background-color: rgb(236, 236, 236);
            }
            @media all and (min-width: 1024px) {
                .login{
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
                .login{
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
            /*@media all and (min-width: 768px) {
                .login{
                    border: 0px;
                    width: 350px;
                    background-color: white;
                    border-radius: 8px;
                    margin: 10% auto;
                    padding: 2%;
                }
                .input{
                    background-color:rgb(236, 236, 236);
                    border-radius: 5px;
                    width: 90%;
                    height: 40px;   
                }
            }*/
        </style>
    </head>
    <body>
        <!-- Log in guest header starts -->
        
        <!-- Log in guest header ends -->
        <!-- Login form starts -->
        <div class="login ">
            <h1 class="h1 text-center font-bold text-5xl"><b>LOG IN</b></h1><br>
            <?php
                if(isset($_SESSION['login']))
                {
                    echo$_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <br><br>
            <form action="" method="POST" class="text-center">
                <div>
                    <input class="input pl-5" type="text" name="email" placeholder="Email" required>
                </div>
                <div class="mt-5 mb-5">
                    <input class="input pl-5" type="password" name="password" placeholder="Password" required>
                </div>
                <input type="submit" name="submit" value="Log in" class="font-bold bg-black text-white w-24 py-2 my-3 text-center rounded-3xl cursor-pointer hover:bg-white hover:text-black shadow-lg transition ease-in"><br>
            </form>
            <p class="text-center"><a href="./resetpassword.php"><b><span style="color: rgb(95, 113, 166)">Forgot password?</span></b></a></p><br><br>
            <p class="text-center">Don't have account?&emsp;&emsp;<a href="./signup.php"><b><span style="color: rgb(95, 113, 166)">Sign up</span></b></a></p>
        </div>
        <!-- Login form ends -->
    </body>
    <?php
        include('./footer.php');    
    ?>
</html>



