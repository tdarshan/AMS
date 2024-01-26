<?php
include "connection.php";
session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="components/bootstrap.min.css">
    <link rel="stylesheet" href="components/bootstrap.css">
    <title>Rent | AgroProject</title>
    <style>
        sup {
            color: red;
            cursor: pointer;
        }

        sup:hover::after {
            content: "Not required";
        }
    </style>
</head>

<body>

    <div class="our-Home-Navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="Home.php">AgroProject</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="Home.php">Goods</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="rent_equip.php">Rent-equipments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="f_dashboard/f_dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="f_dashboard/f_profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-danger text-secondary" href="logout.php">Logout</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <a class="btn btn-outline-success" href="f_dashboard/f_dashboard.php"> <?php echo $_SESSION['name']; ?> </a>
                    </form>
                </div>
            </div>
        </nav>
    </div>


    <div class="container container-fluid bg-dark text-light p-3 rounded my-2">
        <div class="d-flex align-items-center justify-content-between px-2">
            <a href="Home.php" class="text-white text-decoration-none">
                <h2><i class="bi bi-bar-chart-fill"></i> AgroProject </h2>
            </a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add Equipment
            </button>
        </div>
    </div>
    <!-- modal  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add equipments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="rent_equip.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input type="text" name="pname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Cost</label>
                            <input type="text" name="pcost" class="form-control" id="exampleInputPassword1" placeholder="Product Cost">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Date</label>
                            <input type="date" name="psdate" class="form-control" id="exampleInputPassword1" placeholder="Choose available date">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Period of time <span><sup>*</sup></span> </label>
                            <input type="date" name="pldate" class="form-control" id="exampleInputPassword1" placeholder="Period of time (* not required)">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <input type="text" name="pdesc" class="form-control" id="exampleInputPassword1" placeholder="discription">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Image</label>
                            <input type="file" name="pimg" class="form-control" id="exampleInputPassword1" placeholder="Image">
                        </div>
                        <button type="submit" class="btn btn-primary" name="putOnRent">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container container-fluid bg-light text-dark p-3 rounded my-2">
    <table class="table table-secondary table-hover text-center">
            <thead class="">
                <tr>
                    <th width="10%" scope="col">Owner Name</th>
                    <th width="10%" scope="col">Contact</th>
                    <th width="10%" scope="col">Product</th>
                    <th width="10%" scope="col">Cost</th>
                    <th width="10%" scope="col">Date available</th>
                    <th width="15%" scope="col">Description</th>
                    <th width="30%" scope="col">Image</th>
                    <th width="5%"> Action </th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <?php
                $sql = "SELECT * FROM `rent_equip` WHERE `status`='0'";
                $result = mysqli_query($connection, $sql);
                $i = 1;
                $fetch_src = "equipmentImg/";
                while ($fetch = mysqli_fetch_assoc($result)) {
                    $id = $fetch['id'];
                    $img = $fetch['pimg'];
                ?>
                    <tr class="align-middle">
                         <td class=" align-middle"> <?php echo $fetch['f_name']; ?> </td> 
                        <td class=" align-middle"> <?php echo $fetch['f_contact']; ?> </td>
                        <td class=" align-middle"> <?php echo $fetch['pname']; ?> </td>
                        <td class=" align-middle"> <?php echo $fetch['pcost']; ?> </td>
                        <td class=" align-middle"> <?php echo $fetch['psdate']. " - " .$fetch['pldate']; ?> </td>
                        <td class=" align-middle"> <?php echo $fetch['pdesc']; ?> </td>
                        <td class=" align-middle"> <?php echo '<img src=' . $fetch_src . $img . ' width="200px">' ?> </td>
                        <td> 
                            
                                <a href="getOnRent.php?id=<?php echo $id; ?>" class="btn btn-info">Get</a>
                            
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST['putOnRent'])) {
    $pname = $_POST['pname'];
    $pcost = $_POST['pcost'];
    $psdate = $_POST['psdate'];
    $pldate = $_POST['pldate'];
    $pdesc = $_POST['pdesc'];

    $fname = $_FILES["pimg"]["name"];
    $ftmpname = $_FILES["pimg"]["tmp_name"];
    $path = "equipmentImg/" . $fname;

    if (move_uploaded_file($ftmpname, $path)) {
        $f_name = $_SESSION['name'];
        $f_email = $_SESSION['email'];
        $f_contact = $_SESSION['contact'];

        $sql = "INSERT INTO `rent_equip`(`f_name`, `f_email`, `f_contact`, `pname`, `pcost`, `psdate`, `pldate`, `pdesc`, `pimg`) VALUES ('$f_name','$f_email','$f_contact','$pname','$pcost','$psdate','$pldate','$pdesc','$fname')";

        $result = mysqli_query($connection, $sql);
        if($result){
            
        }
        else{
            
        }
    } else {
        echo "cant upload";
    }
}

?>