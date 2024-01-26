<?php 

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "agroproject";

    $connection = mysqli_connect($host, $user, $pass, $db);

    if($connection)
    {
        // echo "connection Successful";
    }
    else
    {
        // echo "error in connecting database " . mysqli_connect_error($connection);
    }

    define("UPLOAD_SRC", $_SERVER["DOCUMENT_ROOT"]."/AAA/f_product_uploads/");

    define("FETCH_SRC", "http://127.0.0.1/AAA/f_product_uploads/");

    // print_r($_SERVER['DOCUMENT_ROOT']);

?>