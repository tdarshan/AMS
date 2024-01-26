<?php
    include '../connection.php';

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $query = $_POST['query'];

        $sql = "INSERT INTO `userquery` (`name`, `email`, `contact`, `query`) VALUES ('$name', '$email', '$contact', '$query');";
        $result = mysqli_query($connection, $sql);

        header('location: ../index.php');
    }

?>