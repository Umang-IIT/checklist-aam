<?php
$servername = "db4free.net:3306";
$username = "umangsingla617";
$password = "12345678";
    $dbname = "grandreunion";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


?>
