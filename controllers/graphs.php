<?php
    $hostname = "127.0.0.1";
    $hostuser = "root";
    $hostpassword = "";
    $hostdatabase = "newsapp";

    $conn = mysqli_connect($hostname,$hostuser,$hostpassword,$hostdatabase);

    if($conn)
    {
        return "Connected";
    }
    else
    {
        return "NOT Connected";
    }
?>