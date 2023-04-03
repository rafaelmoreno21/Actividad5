<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "clean";

$conn = mysqli_connect($host, $user, $pass, $db);

if(mysqli_connect_errno()){
    echo "Error de conexion " . mysqli_connect_error();
}else{
    //echo "conectada";
}

?>

