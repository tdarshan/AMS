<?php


$login = false;
$showErr = false;


if (isset($_POST['submit'])) {
    include 'connection.php';
    // mysqli_select_db($connection, 'givemeway');
    $Email = $_POST['email'];
    $Password = $_POST['password'];


    $sql = "Select * from f_register where email='$Email' AND password='$Password'";

    $result = mysqli_query($connection, $sql);

    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $row = mysqli_fetch_assoc($result);
        $tb_name = $row['name'];
        $tb_contact = $row['contact'];
        $tb_email = $row['email'];
        $tb_password = $row['password'];
        $tb_district = $row['district'];


        // print_r($row);
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $tb_name;
        $_SESSION['contact'] = $tb_contact;
        $_SESSION['email'] = $tb_email;
        $_SESSION['password'] = $tb_password;
        $_SESSION['district'] = $tb_district;
        $_SESSION['loggedin'] = true;
        header('location: Home.php');
    } else {
        $showErr = "invalid Credentials";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="components/bootstrap.min.css">
    <link rel="stylesheet" href="components/f_login.css">

    <title>DE | Login</title>
</head>

<body>

    

    <?php
    if ($showErr) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Error ! </strong> ' . $showErr . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    ?>

    <div class="container-fluid bg">
        <h1> <- </h1>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <form method="POST" action="f_login.php" class="form-container" style="font-weight: bold;">
                    <h2 style="text-align: center; color: #3af2f2;">Login here</h2>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <input type="submit" name="submit" class="btn btn-outline-info btn-lg" value="Submit">
                </form>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>