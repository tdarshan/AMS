<?php
include 'connection.php';
session_start();

if ($_SESSION['loggedin']) {
    // echo $_SESSION['name'];
} else {
    // echo 'login required';
    header('location: index.php');
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
    <link rel="stylesheet" href="components/bootstrap.min.css">
    <link rel="stylesheet" href="components/bootstrap.css">

    <title>Home</title>
</head>

<body class="bg-light">
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
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProduct">
                <i class="bi bi-plus-lg"></i> Add Product
            </button>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="f_addProduct.php" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" class="form-control" placeholder="Product Name" name="product" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Price</span>
                            <input type="text" class="form-control" name="price" placeholder="Product Price Per unit" min="1" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Description</span>
                            <textarea class="form-control" name="description" placeholder="Some details about Product" required></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image" accept=".jpg, .jpeg, .png, .svg" required>
                            <label class="input-group-text">Image</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="addProduct" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal -->

    <div class="container mt-5 p-0">
        <table class="table table-secondary table-hover text-center">
            <thead class="">
                <tr>
                    <!-- <th width="5%" scope="col">Index</th> -->
                    <th width="10%" scope="col">Seller Name</th>
                    <th width="10%" scope="col">Product</th>
                    <th width="20%" scope="col">Image</th>
                    <th width="10%" scope="col">Price</th>
                    <th width="25%" scope="col">Description</th>
                    <!-- <th width="20%" scope="col">Action</th> -->
                </tr>
            </thead>
            <tbody class="bg-white">
                <?php
                $sql = "SELECT * FROM `f_product` WHERE `verified`='1'";
                $result = mysqli_query($connection, $sql);
                $i = 1;
                $fetch_src = "images/";
                while ($fetch = mysqli_fetch_assoc($result)) {
                    $img = $fetch['image'];
                ?>
                    <tr class="align-middle">
                        <!-- <td> <?php echo $fetch['id']; ?> </td> -->
                        <td> <?php echo $fetch['f_name']; ?> </td>
                        <td> <?php echo $fetch['product']; ?> </td>
                        <td> <?php echo '<img src=' . $fetch_src . $img . ' width="150px">' ?> </td>
                        <td> <?php echo $fetch['price']; ?> </td>
                        <td> <?php echo $fetch['description']; ?> </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    
</body>

</html>