<?php
    include '../connection.php';

    if(isset($_POST['loginBtn'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `admin` WHERE email='$email' AND password='$password'";
        $result = mysqli_query($connection, $sql);
        if($result){
            session_start();
            $_SESSION['email']=$email;
            $_SESSION['password']=$password;
            $_SESSION['loggedin']=true;
            header('location: adminIndex.php');
        }
    }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../components/bootstrap.css">
    <link rel="stylesheet" href="../components/bootstrap.min.css">
    <title>AgroProject - Admin</title>
</head>

<body class="bg-light bg-gradient">
    <div class="container container-fluid m-5 p-5">
        <form method="POST" action="adminLogin.php" class="m-5 p-5">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control shadow-none" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control shadow-none" id="exampleInputPassword1">
            </div>
            <button type="submit" name="loginBtn" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>