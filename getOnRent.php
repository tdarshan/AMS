<?php 

 include 'connection.php';
 session_start();

 $rName = $_SESSION['email'];
 $id = $_GET['id'];

    $sqlDEL = "UPDATE rent_equip SET `status`='1',`rName`='$rName'  WHERE `id`='$id'";
    $result = mysqli_query($connection, $sqlDEL);

    header('Location: rent_equip.php');

?>