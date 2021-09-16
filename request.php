<?php
session_start();
if (!isset($_SESSION['user_num'])) {
  header("Location:user_login.php");
}
 
include 'connection.php';

$userto=$_POST['user_num'];

$user_from= $_SESSION['user_num'];


$sql= "INSERT INTO request (user_from,user_to) values ($user_from,$userto)";
$result=mysqli_query($conn,$sql);
if ($result) {
  echo "Friend request sent ";

} else {
    echo "Failed----->>>". mysqli_error($conn);
}


?>