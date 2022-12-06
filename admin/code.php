<?php

require '../config.php';





if (isset($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($mysqli, $_GET['user_id']);

    $query = "SELECT * FROM user WHERE user_id='$user_id'";
    $query_run = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'user Fetch Successfully by id',
            'data' => $student
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'user Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_GET['product_id'])) {
    $product_id = mysqli_real_escape_string($mysqli, $_GET['product_id']);

    $query = "SELECT * FROM product WHERE product_id='$product_id'";
    $query_run = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'user Fetch Successfully by id',
            'data' => $student
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'user Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}


if (isset($_POST['delete_product'])) {
    $product_id = mysqli_real_escape_string($mysqli, $_POST['product_id']);

    $query = "DELETE FROM product WHERE product_id='$product_id'";
   

    $query_run = mysqli_query($mysqli, $query);
 


    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Product Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Product Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}




if (isset($_POST['delete_user'])) {
    $user_id = mysqli_real_escape_string($mysqli, $_POST['user_id']);

    $query = "DELETE FROM user WHERE user_id='$user_id'";
    $query2 = "DELETE FROM feedback WHERE user_id='$user_id'";
    $query3 = "DELETE FROM `order` WHERE user_id='$user_id'";

    $query_run = mysqli_query($mysqli, $query);
    $query_run2 = mysqli_query($mysqli, $query2);
    $query_run3 = mysqli_query($mysqli, $query3);


    if ($query_run && $query_run2 && $query_run3) {
        $res = [
            'status' => 200,
            'message' => 'user Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'user Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}


if (isset($_POST['submit'])) {

    $sql = "INSERT INTO product (product_id,product_name,description,price,quantity,product_image) VALUES ('','$product_name','$desc','$price','$quantity','$image')";
    $query = mysqli_query($mysqli, $sql);
    header('location:manageProducts.php');
    
}
