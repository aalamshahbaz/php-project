
<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['user_num'])) {
    header("Location:user_login.php");
  }
   

$user_num=$_SESSION['user_num'];
$name=$_SESSION['name'];

// $sql= "SELECT ur.name,up.gender,up.age,up.job
// FROM user_register INNER JOIN user_profile
// ON user_register.user_num=user_profile.user_num";

// we can use temperory name for coulm name as below i have used ur for user_register and up for user_profile

$sql= "SELECT ur.name,up.gender,up.age,up.job,ur.user_num
FROM user_register ur INNER JOIN user_profile up
ON ur.user_num=up.user_num WHERE ur.user_num <> $user_num";
$result= mysqli_query($conn,$sql);



?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user_profile</title>

    <style>
table ,th , td{

    border: 2px solid black;
    width: 50%;
    margin: auto;
    border-collapse: collapse;
}
th{
    padding: 15px;
}

    </style>
</head>
<title>Submit your profile details</title>
<body>
   <?php echo " <br><br>Welcome  " . $name; ?> <span> <button><a href="logout.php">log out</a></button></span><br> <br>
    <header>
       
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>job</th>
                    <th>Action</th>
                </tr>
 <?php
 include 'connection.php';
 

while ($data = mysqli_fetch_assoc($result)){

      echo "<tr>";
          echo "<td>".$data['name']."</td>";
          echo "<td>".$data['gender']."</td>";
          echo "<td>".$data['age']."</td>";
          echo "<td>".$data['job']."</td>";
        //   echo "<td>".$data['user_num']."</td>";
         echo '<td><form action="request.php" method="post"><input type="hidden" name="user_num" value='.$data['user_num'].'><input type="submit" name="submit" value="send request"></form></td>';
         
        
      echo "</tr>";
     

}
?>

            </thead>
        
        </table>
    
    </header>

</body>

</html>