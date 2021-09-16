<?php

include 'connection.php';


if($_SERVER["REQUEST_METHOD"] == "POST") {
      

    $name= $_POST["name"];
    $number= $_POST["number"];
    $email= $_POST["email"];
    $password=$_POST["password"];
    $cpassword= $_POST["cpassword"]; 

if ($password=$cpassword) {
    // USE THIS FOR PASSWORD ENSCRYPTION
    // $securepass=password_hash($password,PASSWORD_DEFAULT);

    // NOW INSERT QUERY TO  INSERT USER REGISTRATION DETAILS INTO DATABASE
 
    $SQL= "INSERT INTO user_register(user_num,name,number,email,password) SELECT MAX(user_num)+1,'$name','$number','$email','$password' from user_register";

    $result= mysqli_query($conn,$SQL);
    
    if ($result) {
        echo"Sign up successfull";
    }
    else {
        echo"failed---->" . mysqli_error($conn);
    }
    
    // / if ($row==0) {

    //    $SQL="INSERT INTO user_register(user_num,name,number,email,password) VALUES( 1,'$name',$number','$email','$password')";
    //    $result= mysqli_query($conn,$sql);
    // // }

// }

}
}
?>
<div class="container">
        <header>
            <form action="user_register.php" method="POST">
               
                <div>
                    <h1>Shaaadi DOT Com</h1> <br>
                    <h3>Sign Up Here</h3>
                    <label for="name" >Full Name</label> 
                    <input type="text" name="name" value="" placeholder="Enter your name"><br><br>
                    <label for="number" >mobile number</label> 
                    <input type="text" name="number" value="" placeholder="Enter your number"><br><br>
                    <label for="email" >Enter your email</label> 
                    <input type="email" name="email" value="" placeholder="Enter your Email"><br><br>
                    <label for="password">password</label> 
                    <input type="text" name="password" value="" placeholder="Enter password"><br><br>
                    <label for="password">Re-password</label> 
                    <input type="text" name="cpassword" value="" placeholder="re-Enter password"><br><br>
                    <input type="submit" name="signup" value="signup"> <br><br><br>
                    <a href="user_login.php">Already account? Login Here</a>
    
                </div>
            </form>
        </header>
    </div>


