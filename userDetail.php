<?php
include('./header-member.php');
if (!isset($_COOKIE['user_id'])) {
    header('Location: login.php');
}
//include('./config.php');
$user_id = $_COOKIE['user_id'];
$user_result = $mysqli->query("SELECT * FROM user WHERE user_id=" . $user_id);
$result = $user_result->fetch_assoc();
$user_image = $result['user_image'];

//Change infor
if (isset($_POST["submit"])) {
    $newfullname = $_POST["fullname"];
    $newusername = $_POST["username"];
    $newphone = $_POST["phone"];
    $newemail = $_POST["email"];
    $newaddress = $_POST["address"];
    $newpassword = $_POST["password"];

    if ($newfullname == "" || $newusername == "" || $newphone == "" || $newemail == "" || $newaddress == "" || $newpassword == "") {
        echo '<script language="javascript">alert("Please write the new information or rewrite the old information.");</script>';
    } else {
        $sql = "UPDATE `user` SET `username`='$newusername',`fullname`='$newfullname',`password`='$newpassword',`address`='$newaddress',`phone`='$newphone',`email`='$newemail' WHERE `user_id`='$user_id'";
        if (mysqli_query($mysqli, $sql)) {
            echo '<script language="javascript">alert("Edit profile successfully.");</script>';
        } else {
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
        #modal-container {
            width: 100%;
            background: rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 0;
            left: 0;
            opacity: 0;
            pointer-events: none;
        }

        #modal-container.show {
            opacity: 1;
            pointer-events: all;
        }

        #modal {
            background: #fff;
            max-width: 1000px;
            position: relative;
            left: 50%;
            transform: translateX(-50%);
            padding-bottom: 30px;
        }

        /* .modal-body{
                border: 2px solid black;
                width: 900px;
                margin: 3% auto;
                padding: 10px;
            } */
        .input{
                width: 70%;
            }
    </style>
</head>

<body class="bg-gray-200">
    <h1 class="font-bold text-3xl pt-20 ml-10">My account</h1>
    <div class="bg-white shadow-lg lg:ml-20 lg:mr-20 md:ml-5 md:mr-5 mt-10 mb-10">
        <div class="grid grid-cols-2 p-10">
            <div class="column1">
                <img class="mx-auto w-1/2 my-auto" src="<?php echo $user_image; ?>" alt="avata">
            </div>
            <div class="flex flex-1 gap-9 lg:text-xl md: text-base leading-10 my-auto">
                <div class="font-bold">
                    <p>Fullname</p>
                    <p>Username</p>
                    <p>User Type</p>
                    <p>Phone</p>
                    <p>Email</p>
                    <p>Address</p>
                </div>
                <div>
                    <p class="break-all"><?php echo $result['fullname']; ?></p>
                    <p class="break-all"><?php echo $result['username']; ?></p>
                    <p class="break-all"><?php echo $result['user_type']; ?></p>
                    <p class="break-all"><?php echo $result['phone']; ?></p>
                    <p class="break-words"><?php echo $result['email']; ?></p>
                    <p class="break-all"><?php echo $result['address']; ?></p>
                </div>
            </div>
        </div>
        <div class="flex justify-center gap-9 pb-5">
            <div class="">
                <button id="btn-open" class="font-bold bg-black text-white w-48 h-18 py-2 my-3 text-center rounded-3xl cursor-pointer hover:bg-white hover:text-black shadow-lg transition ease-in lg:text-2xl md:text-xl">Edit profile</button>
            </div>
            <div class="">
                <a href="./cart.php">
                    <button class="inline-block font-bold bg-black text-white lg:text-2xl md:text-xl w-48 h-18 py-2 px-3 my-3 text-center rounded-3xl hover:text-black hover:bg-white transition ease-in shadow-lg">Go to cart</button>
                </a>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="modal-container" class=" transition ease-in lg:pt-24 lg:pb-40 md:pt-20 md:pb-10">
        <div id="modal" class="shadow-lg rounded-3xl lg:w-full md:w-4/5 ">
            <div class="flex justify-between pt-5">
                <h3 class="font-bold lg:text-3xl md:text-xl pl-5">Edit user info</h3>
                <button id="btn-close"><i class="fa-solid fa-xmark mr-5 p-5 rounded-full hover:bg-gray-200 transition ease-in"></i></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="text-center">
                    <div class="mb-5">
                        <input class="bg-gray-100 rounded-xl pl-5 leading-9 input" type="text" name="fullname" placeholder="Full name: <?php echo $result['fullname'] ?>">
                    </div>
                    <div class="mb-5">
                        <input class="bg-gray-100 rounded-xl pl-5 leading-9 input" type="text" name="username" placeholder="Username: <?php echo $result['username'] ?>">
                    </div>
                    <div class="mb-5">
                        <input class="bg-gray-100 rounded-xl pl-5 leading-9 input" type="text" name="phone" placeholder="Phone: <?php echo $result['phone'] ?>">
                    </div>
                    <div class="mb-5">
                        <input class="bg-gray-100 rounded-xl pl-5 leading-9 input" type="text" name="email" placeholder="Email: <?php echo $result['email'] ?>">
                    </div>
                    <div class="mb-5">
                        <input class="bg-gray-100 rounded-xl pl-5 leading-9 input" type="text" name="address" placeholder="Address: <?php echo $result['address'] ?>">
                    </div>
                    <div class="mb-5">
                        <input class="bg-gray-100 rounded-xl pl-5 leading-9 input" type="text" name="password" placeholder="New password">
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Save changes" class="mt-5 font-bold bg-black text-white w-48 py-2 my-3 text-center rounded-2xl hover:bg-white hover:text-black transition ease-in shadow-lg cursor-pointer" />
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- end Modal -->
    <script>
        const btn_open = document.getElementById('btn-open');
        const btn_close = document.getElementById('btn-close');
        const modal_container = document.getElementById('modal-container');
        btn_open.addEventListener('click', () => {
            modal_container.classList.add('show');
        });
        btn_close.addEventListener('click', () => {
            modal_container.classList.remove('show');
        });
    </script>
</body>

</html>
<?php include('./footer.php') ?>