<?php
include 'connection.php';

// function img_upload($img)
// {
//     $tmp_location = $img['tmp_name'];
//     $new_name = random_int(1, 99999) . $img['name'];

//     $new_location = "images/" . $new_name;

//     if(!move_uploaded_file($tmp_location, $new_location)){
//         header('location: Home.php?alert=img_upload');
//         exit;
//     }
//     else{
//         return $new_name;
//     }
// }

if (isset($_POST['addProduct'])) {
    session_start();
    $f_name = $_SESSION['name'];
    $f_email = $_SESSION['email'];
    $f_contact = $_SESSION['contact'];

    $product = $_POST['product'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $fname = $_FILES["image"]["name"];
    $ftmpname = $_FILES["image"]["tmp_name"];
    $path = "images/" . $fname;

    // $img_path =  img_upload($_FILES['image']);
    if (move_uploaded_file($ftmpname, $path)){

        $sql = "INSERT INTO `f_product`(`f_name`, `f_email`, `f_contact`, `product`, `price`, `description`, `image`) 
                VALUES ('$f_name', '$f_email', '$f_contact', '$product', '$price', '$description', '$fname')";
    if (mysqli_query($connection, $sql)) {
        header('location: Home.php?success=added');
    } else {
        header('location: Home.php?alert=add_failed');
    }
}
}
