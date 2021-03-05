<?php
$hostname = "127.0.0.1";
$hostuser = "root";
$hostpassword = "";
$hostdatabase = "newsapp";

$connection = mysqli_connect($hostname,$hostuser,$hostpassword,$hostdatabase);

/*
if($connection){
    echo "You're connected";
}else{
    echo "Sorry, not connected";
}*/

//Get data for reservation form";
if ($connection) {
// Get Variables
$user_name = $_GET['user_name'];
$user_password = $_GET['user_password'];

// Create connection
$selectLogin = "SELECT user_name, user_password FROM user_info WHERE user_name =" + $user_name +"AND user_password = " + $user_password;
if($selectLogin->num_rows > 0)
{
    echo "Sucessful login";
}
else
{
    echo "No username found with that info";
}
}
 else {
    echo "Problema con conexión";
}

?>  