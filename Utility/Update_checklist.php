<?php include '../connection.php' ?>

<?php

    $momento = $_GET['Momento'];
    $mobile = $_GET['Mobile'];
    $regkit = $_GET['Regkit'];
    $room = $_GET['Room'];

    $sql = "UPDATE checklist SET Momento = $momento, Regkit = $regkit, Room = $room WHERE Mobile = $mobile";

    echo $mobile;

    mysqli_query($conn, $sql);

?>