<?php
include '../connection.php';
session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../components/bootstrap.css">
    <link rel="stylesheet" href="../components/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>AgroProject - Admin</title>
</head>

<body>
    <ul class="nav justify-content-center bg-success bg-gradient">
        <li class="nav-item h3">
            <a class="nav-link text-dark" aria-current="page" href="adminIndex.php">AgroProject</a>
        </li>
        <li class="nav-item h3">
            <a class="nav-link text-dark" href="adminIndex.php">Home</a>
        </li>
        <li class="nav-item h3">
            <a class="nav-link active text-dark" href="verifyProduct.php">Products</a>
        </li>
        <li class="nav-item h3">
            <a class="nav-link text-dark" href="adminQueries.php">Queries</a>
        </li>
        <li class="nav-item h3">
            <a class="nav-link text-dark" href="#">Profile</a>
        </li>
        <li class="nav-item h5">
            <a class="nav-link text-danger" href="adminLogout.php">Log-out</a>
        </li>
    </ul>

    <div class="container container-fluid m-3 py-2">
        <table class="table table-striped table-hover">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Query</th>
                <th>Call</th>
            </tr>

            <?php
            $sql = "SELECT * FROM `userquery`";
            $result = mysqli_query($connection, $sql);

            while ($fetch = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $fetch['name']; ?></td>
                    <td><?php echo $fetch['email']; ?></td>
                    <td><?php echo $fetch['contact']; ?></td>
                    <td><?php echo $fetch['query']; ?></td>
                    <td> <a href="tel: <?php echo $fetch["contact"]; ?>">call</a> </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>