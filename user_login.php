<?php
session_start();
include 'connection.php';
// checking if user is already logged in if logged in then it will redirect to user_profile

// if(isset($_SESSION['user_num'])){
//     header("Location:user_profile.php");
// }


if(isset($_POST['login'])) {
      
    $password=$_POST['password'];
    $email=$_POST['email'];

    $sql= "SELECT * FROM user_register WHERE email='$email' AND password='$password'";
    $result= mysqli_query($conn,$sql);
    $row=mysqli_num_rows($result);
    if ($row==1) {

        // use this to descript password
        // $verify= password_verify($password,$row['password']); 
        
        // creating variable to use in another page
        
        while ($result1=mysqli_fetch_assoc($result)){


            $user_num=$result1['user_num'];
            $_SESSION['user_num']= $user_num;
           $name=$result1['name'];
           $_SESSION['name']=$name;
           if (isset($_SESSION['user_num'])) {
            header('Location:user_profile.php');
           }
               
         
        }
        
    }
    
    if ($row<1) {
        echo "Username not found";
    }
    else 
    {
        echo "Failed------->>>". mysqli_error($conn);

    }

}

?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>

  </head>
  <body>
    <div class="container">
        <header>
            <form action="" method="POST">
               
                <div>
                    <h1>Welcome to Shaadi DOT Com</h1> <br>
                    <h3>login Here</h3>
                   
                    <label for="email" >Email address</label> 
                    <input type="email" name="email" value="" placeholder="Enter your Email"><br><br>
                    <label for="password">password</label> 
                    <input type="password" name="password" value="" placeholder="Enter password"><br><br>
                    <input type="submit" name="login" value="Login"> <br><br><br>

                    <a href="user_register.php">no account? Sign UP here</a>
    
                </div>
            </form>
        </header>
    </div>
</body>
</html>