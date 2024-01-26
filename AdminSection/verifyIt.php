<?php
    include '../connection.php';

    $id = $_GET['id'];

    $verifyIt = "UPDATE f_product SET `verified`='1' WHERE `id`='$id'";
    $result = mysqli_query($connection, $verifyIt);

    header('location: verifyProduct.php');

?>