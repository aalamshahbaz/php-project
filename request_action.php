<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['user_num'])){
   header("Location:user_login.php");
 }
  
// taking data from another page using session
$user_to=$_SESSION['user_num'];

// taking variable using hidden post method
$userfrom=$_POST['user_from'];
$name=$_POST['name'];


//Query for friend request accept/reject

if (isset($_POST['accept'])) {
    $accept=$_POST['accept'];
    
    $sql="UPDATE request
    SET status= '$accept'
    WHERE user_to=$user_to AND user_from=$userfrom";

    $result=mysqli_query($conn,$sql);
    if ($result) {
       echo "You are now friend with " . $name;
    } else {
       echo "failed------>>>" . mysqli_error($conn);
    }
}   
if (isset($_POST['reject'])) {
    $reject=$_POST['reject'];

    $sql="UPDATE request
    SET status= '$reject'
    WHERE user_to=$user_to AND user_from=$userfrom";

    $result=mysqli_query($conn,$sql);

if ($result) {
    echo "You have rejected " . $names;
 } else {
    echo "failed------>>>".mysqli_error($conn);
 }

}



//query to send message


if (isset($_POST['send'])) {

// taking variable using hidden post method
   $user_to=$_POST['user_from'];
   $message= $_POST['message'];
   
// taking data from another page using session

   $userfrom=$_SESSION['user_num'];

   

   $sql= "INSERT INTO chat (user_from,user_to,message) values('$userfrom','$user_to','$message')";

   $result=mysqli_query($conn,$sql);

   if ($result) {
      echo "message sent";
   }
   else{
      echo "Failed------>>". mysqli_error($conn);
   }

}



?>