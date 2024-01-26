<?php

include "connection.php";

$showErr = false;
$showAlert = false;

if (isset($_POST['submit'])) {
    $Uname = $_POST['name'];
    $Cnum = $_POST['num'];
    $mail = $_POST['email'];
    $pass = $_POST['pass'];
    $dist = $_POST['dist'];

    $checkDupl = "SELECT * FROM f_register WHERE email='$mail' OR contact='$Cnum'";
    $checkResult = mysqli_query($connection, $checkDupl);
    $numExitsRow = mysqli_num_rows($checkResult);

    if ($numExitsRow > 0) {
        $showErr = true;
        echo "<script> alert('Email OR mobile no. already exists'); </script>";
    } else {
        //insert in database query
        $sql = "INSERT INTO `f_register` (`name`, `contact`, `email`, `password`, `district`) VALUES ('$Uname', '$Cnum', '$mail',
                '$pass', '$dist')";

        $insert_rec = mysqli_query($connection, $sql);
        if ($insert_rec) {
            $showAlert = true;
            echo "<script> alert('account created sucessfully! login to access'); </script>";
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
    <!-- <link rel="stylesheet" href="components/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="components/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="components/f_registerStyle.css">
    <title>AgroCare | Register</title>
</head>

<body>
    <h1>
        <a href="index.php" style="text-decoration: none; color: orange;"> <i class="bi bi-arrow-left-square-fill"></i> </a>
    </h1>
    <div class="background" style="display: flex; justify-content: center; align-items: center; height: 90vh;">
        <div class="form-name">
            <form action="f_register.php" method="POST">

                <div class="input">
                    <h2>Register Here | Farmer</h2>
                    <input type="text" name="name" id="" placeholder="Enter Name">
                    <input type="number" name="num" id="num" placeholder="Enter Mobile number">
                    <input type="email" name="email" placeholder="Enter Email Here">
                    <input type="password" name="pass" placeholder="Enter Your password">
                    <input type="text" name="dist" placeholder="Enter Your District">
                    <input type="submit" value="submit" name="submit" id="submit-btn">
                </div>

            </form>
        </div>
    </div>

    <!-- <div class="our-footer-container">
        <footer>
            <p class="p-3 bg-dark text-white text-center">@AgroProject</p>
        </footer>
    </div> -->
</body>

</html>