<?php
    include '../connection.php';

    // function remove_img($img){
    //     if(!unlink(UPLOAD_SRC . $img)){
    //         header('location: f_dashboard.php?alert=img_del_failed');
    //         exit;

    //     }
    // }

    if(isset($_GET['del']) && $_GET['del'] > 0){
        $sql = "SELECT * from `f_product` where `id` = '$_GET[del]'";
        $result = mysqli_query($connection, $sql);
        $fetch = mysqli_fetch_assoc($result);

        // remove_img($fetch['image']);

        $sql = "DELETE FROM `f_product` where `id` = '$_GET[del]'";
        $result = mysqli_query($connection, $sql);
        if($result){
            header('location: f_dashboard.php?success=removed');
        }
        else{
            header('location: f_dashboard.php?alert=remove_failed');
        }
    }

?>