<?php  
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "litratos_db";
    $conn = new mysqli($servername, $username, $password, $database, 3306);

    if($conn->connection_error) {
        die("Connection failed: ".$conn->connect_error);
    }
    // else {
    //     echo "<script> alert('SUX.');</script>";
    // }

    echo "";
?>