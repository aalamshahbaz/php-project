<?php

$hostname="localhost";
$username="john";
$password="john123";
$database="wedding";


$conn= mysqli_connect("$hostname", "$username", "$password", "$database");

if (!$conn) {
   echo "connection failed". mysqli_connect_error($conn);
} else {
    echo "connected succesfully";
}


?>