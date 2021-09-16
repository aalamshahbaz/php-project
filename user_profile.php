<?php
session_start();
include 'connection.php';

if(!isset($_SESSION['user_num'])){
    header("Location:user_login.php");
 
  
if ($_SERVER['REQUEST_METHOD']=='POST') {
   

    $gender=$_POST['gender'];
    $city=$_POST['city'];
    $district=$_POST['district'];
    $address=$_POST['address'];
    $pin=$_POST['pin_code'];
    $job=$_POST['job'];
    $height=$_POST['height'];
    $hobby=$_POST['hobby'];
    $fmember=$_POST['fmember'];
    $age=$_POST['age'];


    $user_num=$_SESSION['user_num'];


   
   $sql= "INSERT INTO user_profile(gender,city,district,address,pin_code,job,height,hobby,fmember,age,user_num)
    VALUES ('$gender','$city','$district','$address',$pin,'$job',$height,'$hobby',$fmember,$age,$user_num)";
   $result=mysqli_query($conn,$sql);
//    $row= mysqli_num_rows($result);
   if ($result) {
       echo "Profile details submitted";
   } else {
      echo "Failed------>>>". mysqli_error($conn);
   }
   
}
}



?>
<!-- filling your profile details -->

<body>
    <?php
$user_name=$_SESSION['name'];

    echo "<br>Welcome ". $user_name; ?> <span> <button><a href="logout.php">log out</a></button></span><br> <br>
    <a href="friend.php">Check Friend Request</a> <br> <br>
    <a href="mainpage.php">click here yo check users</a> <br> <br>
    
    <div class="container">
        <header>
            <h1>Shaaadi DOT Com</h1> <br>
           
            <h3>Fill your profile details</h3>

            <form action="" method="POST">
                <div class="cont">
                   
                    <label for="name" >gender</label> 
                    <input type="text" name="gender" value="" <br><br>
                    <label for="number" >city</label> 
                    <input type="text" name="city" value="" <br><br>
                    <label for="email" >District</label> 
                    <input type="text" name="district" value="" <br><br>
                    <label for="password">address</label> 
                    <input type="text" name="address" value=""<br><br>
                    <label for="password">pin code</label> 
                    <input type="text" name="pin_code" value=""<br><br>
                    <label for="password">job</label> 
                    <input type="text" name="job" value=""<br><br>
                    <label for="password">height"</label> 
                    <input type="text" name="height" value=""<br><br>
                    <label for="password">hobby</label> 
                    <input type="text" name="hobby" value=""<br><br>
                    <label for="password">family members</label> 
                    <input type="text" name="fmember" value="" <br><br>
                    <label for="password">Age</label> 
                    <input type="text" name="age" value="" <br><br>
                    <input type="submit" name="submit" value="submit">
                </div>
            </form>
        </header>

