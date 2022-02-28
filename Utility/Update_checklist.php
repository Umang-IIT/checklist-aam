<?php include '../connection.php' ?>

<?php

    $momento = $_GET['Momento'];
    $mobile = $_GET['Mobile'];
    $regkit = $_GET['Regkit'];
    $room = $_GET['Room'];
    $roomnum = $_GET['RoomNo'];
    if($roomnum == NULL) $roomnum = -1;
    $sql = "UPDATE checklist SET Momento = $momento, Regkit = $regkit, Room = $room, RoomNo = $roomnum WHERE Mobile = $mobile";
    echo $roomnum;
    echo $mobile;

    mysqli_query($conn, $sql);

?>