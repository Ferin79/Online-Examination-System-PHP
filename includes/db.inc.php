<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "online_exam";

    $conn = mysqli_connect($servername,$username,$password,$databasename);

    if(!$conn)
    {
        die("Connection Failed :".mysqli_connect_error());
    }
?>