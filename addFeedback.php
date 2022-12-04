<?php
include('./config.php');
// get the post records
$content = $_POST['content'];
$product_id = $_POST['product_id'];
$user_id = $_COOKIE['user_id'];
$created_date = date('Y-m-d');

$result = $mysqli->query("INSERT INTO feedback (product_id, user_id, content, created_date) VALUES ('$product_id', '$user_id', '$content','$created_date')");

//re-render #feedback
$result = $mysqli->query("SELECT * FROM feedback WHERE product_id=".$product_id);
$output = '';

while($rows = $result->fetch_assoc())
{
    $user_info = ($mysqli->query("SELECT * FROM user WHERE user_id=".$rows["user_id"]))->fetch_assoc();
    $user_avatar = $user_info["user_image"];
    $user_name = $user_info["username"];

    $re_render = '
        <div class="mx-14 my-5 rounded-2xl bg-gray-200 p-3">
            <img src="'.$user_avatar.'" alt="user-avatar" class="w-10 h-10 rounded-full overflow-hidden inline float-left">
            <div class="float-left mx-3 text-sm font-bold">
                <p>'.$user_name.'</p>
                <p>'.$rows['created_date'].'</p>
            </div>
            <p class="pt-10 pb-3 mt-2">
                '.$rows['content'].'
            </p>
        </div>
    ';
    $output .= $re_render;
}
echo $output;

?>