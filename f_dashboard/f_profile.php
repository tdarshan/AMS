<?php
include '../connection.php';
session_start();

if (!$_SESSION['loggedin']) {
    header('location: index.php');
    // echo $_SESSION['name'];
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <title>Profile</title>
</head>

<body>
    <div class="navbar-container">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="../Home.php">AgroProject</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../Home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="f_dashboard.php">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="main-container my-5">
        <div class="container bg-light">
            <p class="h2 text-info my-2 p-3">Personal details</p>
            <div class="container">
                <div class="row">
                    <div class="col-3 text-center">
                        <img src="../images/Profile.jpg" class="">
                    </div>
                    <div class="col-9">
                        <div>
                            <fieldset>
                                <!-- <legend> <span>Name</span> </legend> -->
                                <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-formControl">
                                    <fieldset aria-hidden="true" class="m-1 jss369 MuiOutlinedInput-notchedOutline">
                                        <legend class="h5 jss371 jss372"><span>Name</span></legend>
                                        <p class="text-primary h4 p-1"> <?php echo $_SESSION['name']; ?> </p>
                                    </fieldset>
                                </div>
                                <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-formControl">
                                    <fieldset aria-hidden="true" class="m-1 jss369 MuiOutlinedInput-notchedOutline">
                                        <legend class="h5 jss371 jss372"><span>Email</span></legend>
                                        <p class="text-primary h4 p-1"> <?php echo $_SESSION['email']; ?> </p>
                                    </fieldset>
                                </div>
                                <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-formControl">
                                    <fieldset aria-hidden="true" class="m-1 jss369 MuiOutlinedInput-notchedOutline">
                                        <legend class="h5 jss371 jss372"><span>Contact</span></legend>
                                        <p class="text-primary h4 p-1"> <?php echo $_SESSION['contact']; ?> </p>
                                    </fieldset>
                                </div>
                                <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-formControl">
                                    <fieldset aria-hidden="true" class="m-1 jss369 MuiOutlinedInput-notchedOutline">
                                        <legend class="h5 jss371 jss372"><span>District</span></legend>
                                        <p class="text-primary h4 p-1"> <?php echo $_SESSION['district']; ?> </p>
                                    </fieldset>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>