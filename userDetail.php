<?php
    include('./header-member.php');
    if (!isset($_COOKIE['user_id'])) {
        header('Location: login.php');
    }
    //include('./config.php');
    $user_id = $_COOKIE['user_id'];
    $user_result = $mysqli->query("SELECT * FROM user WHERE user_id=".$user_id);
    $result = $user_result->fetch_assoc();
    $user_image = $result['user_image'];

    //Change infor
    if (isset($_POST["submit"]))
    {
        $newfullname = $_POST["fullname"];
        $newusername = $_POST["username"];
        $newphone = $_POST["phone"];
        $newemail = $_POST["email"];
        $newaddress = $_POST["address"];
        $newpassword = $_POST["password"];

        if($newfullname == "" || $newusername == "" || $newphone == "" || $newemail == "" || $newaddress == ""|| $newpassword == "")
        {
            echo '<script language="javascript">alert("Please write the new information or rewrite the old information.");</script>';
        }
        else
        {
            $sql="UPDATE `user` SET `username`='$newusername',`fullname`='$newfullname',`password`='$newpassword',`address`='$newaddress',`phone`='$newphone',`email`='$newemail' WHERE `user_id`='$user_id'";
            if(mysqli_query($mysqli,$sql))
            {
                echo '<script language="javascript">alert("Edit profile successfully.");</script>';
            }
            else
            {
                echo '<script language="javascript">alert("Sign up error, plase try again.");</script>';
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <!-- Font awesome -->
        <script src="https://kit.fontawesome.com/a4088ee5a6.js" crossorigin="anonymous"></script>
        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
        <!-- Tailwindcss -->
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body{
            background-color: rgb(236, 236, 236);
            }
            .myaccount{
                border: 0px;
                width: 1400px;
                background-color: white;
                margin: 3% auto;
                
            }
            .column1{
                border: 0px;
                width: 160px;
                float: left;
                padding: 2%;
                background-color: white;
                height: 300px;
            }
            .column2{
                border: 0px;
                width: 1240px;
                background-color: white;
                padding: 2%;
                float: left;
                height: 300px;
            }
            .clear{
                clear: both;
            }
            table, th, td {
                border:0px;
            }
            .avata{
                width: 100px;
                height: 100px;
                background-color: white;
                border-radius: 50%;
                -moz-border-radius:50%;
                -webkit-border-radius: 50%;
            }
            .infor{
                text-align: right;
            }
            .infor1{
                font-weight: bold;
            }
            .button1{
                border: 0px;
                width: 700px;
                height: 150px;
                background-color: white;
                padding: 2%;
                float: left;
            }
            .button2{
                border: 0px;
                width: 700px;
                height: 150px;
                background-color: white;
                padding: 2%;
                float: right;
            }
            #modal-container{
                height: 100vh;
                width: 100%;
                background: rgba(0, 0, 0, 0.5);
                position: fixed;
                top: 0;
                left: 0;
                padding-top: 100px;
                padding-bottom: 100px;
                opacity: 0;
                pointer-events: none;
            }
            #modal-container.show{
                opacity: 1;
                pointer-events: all;
            }
            #modal{
                background: #fff;
                max-width: 1000px;
                position:relative;
                left: 50%;
                transform: translateX(-50%);
                padding-bottom: 30px;
            }
            #modal .modal-header{
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 25px 20px;
            }
            #btn-close{
                outline: none;
                border: none;
                background: none;
                font-size: 20px;
            }
            .modal-body{
                border: 2px solid black;
                width: 900px;
                margin: 3% auto;
                padding: 10px;
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
        <br><br><br><br><h1 class="font-bold text-3xl">&emsp;&emsp;My account</h1>
        <div class="myaccount">
            <div class="content"></div>
                <div class="column1">
                    <img class="avata" src="<?php echo $user_image;?>" alt="avata" width="300" height="50">
                </div>
                <div class="column2">
                    <br>
                    <table style="width:100%" class="text-2xl">
                        <tr>
                            <td class="infor1">Full name</td>
                            <td class="infor"><?php echo $result['fullname'];?></td>
                        </tr>
                        <tr>
                            <td class="infor1">Username</td>
                            <td class="infor"><?php echo $result['username'];?></td>
                        </tr>
                        <tr>
                            <td class="infor1">User type</td>
                            <td class="infor"><?php echo $result['user_type'];?></td>
                        </tr>
                        <tr>
                            <td class="infor1">Phone</td>
                            <td class="infor"><?php echo $result['phone'];?></td>
                        </tr>
                        <tr>
                            <td class="infor1">Email</td>
                            <td class="infor"><?php echo $result['email'];?></td>
                        </tr>
                        <tr>
                            <td class="infor1">Address</td>
                            <td class="infor"><?php echo $result['address'];?></td>
                        </tr>
                        </table>
                </div>
            <div class="buttons">
                <div class="button1 text-center">
                    <button id="btn-open" class="font-bold bg-black text-white w-48 h-18 py-2 my-3 text-center rounded-3xl cursor-pointer hover:bg-white hover:text-black shadow-lg transition ease-in text-2xl" >Edit profile</button>
                </div>
                <div class="button2 text-center">
                    <div class="inline-block font-bold bg-black text-white w-48 h-18 py-2 my-3 text-center rounded-3xl hover:text-black hover:bg-white">
                        <a href="./cart.php" class=" hover:text-black hover:bg-white rounded-full px-3 py-2 transition ease-in text-2xl">Go to card</a>
                    </div>
                </div>
            </div>
        </div>
        <p><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>&emsp;<br><br><br><br><br><br><br><br><br></p>
        <!-- Modal -->
        <div id="modal-container">
            <div id="modal">
                <div class="modal-header">
                    <h3 class="font-bold text-3xl">USER'S INFORMATION</h3>
                    <button id="btn-close"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" class="text-center">
                        <input class="input" type="text" name="fullname" placeholder="&emsp;Full name: <?php echo $result['fullname']?>"><br><br>
                        <input class="input" type="text" name="username" placeholder="&emsp;User name: <?php echo $result['username']?>"><br><br>
                        <input class="input" type="text" name="phone" placeholder="&emsp;Phone: <?php echo $result['phone']?>"><br><br>
                        <input class="input" type="text" name="email" placeholder="&emsp;Email: <?php echo $result['email']?>"><br><br>
                        <input class="input" type="text" name="address" placeholder="&emsp;Address: <?php echo $result['address']?>"><br><br>
                        <input class="input" type="text" name="password" placeholder="&emsp;Password: <?php echo $result['password']?>"><br><br>
                        <input type="submit" name="submit" value="Save change" class="font-bold bg-black text-white w-48 py-2 my-3 text-center rounded-2xl"><br><br>
                    </form>
                </div>
            </div>
        </div>
        <!-- end Modal -->
        <script>
            const btn_open = document.getElementById('btn-open');
            const btn_close = document.getElementById('btn-close');
            const modal_container = document.getElementById('modal-container');
            btn_open.addEventListener('click', ()=>{
                modal_container.classList.add('show');
            });
            btn_close.addEventListener('click', ()=>{
                modal_container.classList.remove('show');
            });
        </script>
    </body>
    
</html>
<?php include('./footer.php')?>

