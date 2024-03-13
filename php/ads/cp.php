<?php
    $severname="127.0.0.1:3366";
    $username="admin";
    $password="0000";
    $database="btl";

    $conn = new mysqli($severname,$username,$password,$database);
    if(mysqli_connect_errno()){
        echo "loi ket noi".mysqli_connect_error();
        exit();
    }
?>