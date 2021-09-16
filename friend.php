<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['user_num'])) {
   header("Location:user_login.php");
 }
  
$user_to=$_SESSION['user_num'];
$name=$_SESSION['name'];




// USING INNER JOINS

$sql="SELECT ur.name,up.age,up.city ,r.status,r.user_from
from user_register ur
INNER JOIN user_profile up
ON ur.user_num=up.user_num
INNER JOIN request r
ON r.user_from=up.user_num
WHERE user_to=$user_to";


$result = mysqli_query($conn,$sql);

 ?>
 <?php echo $name; ?> 
<span> <button><a href="logout.php">log out</a></button></span><br> <br>
   <table>
      <thead>
         <tr>
          
            <th>NAME</th>
            <th>AGE</th>
            <th>CITY</th>
            <th>STATUS</th>
            <th>ACTION</th>
            <th>MESSAGE</th>
<?php

while ($data=mysqli_fetch_assoc($result)) {

         echo "<tr>";
          echo "<td>".$data['name']."</td>";
          echo "<td>".$data['age']."</td>";
          echo "<td>".$data['city']."</td>";
          echo "<td>".$data['status']."</td>";
        
         echo '<td><form action="request_action.php" method="post">
            <input type="hidden" name="user_from" value='.$data['user_from'].'> 
            <input type="hidden" name="name" value='.$data['name'].'> 
            <button name="accept" value="A">Accept</button>
            <button name="reject" value="R">Reject</button>
         </form></td>';

         echo '<td><form action="request_action.php" method="post">
         <textarea name="message" cols="6" rows="4">hi how are you?</textarea> <button type="submit" value="submit" name="send" >send message</button><input type="hidden" name="user_from" value='.$data['user_from'].'> 
         </form></td>';
         
        //NOTE- ABOVE I HAVE USED HIDDEN BUTTON to send value from this page to another page
      echo "</tr>";
      
   
   }
  //coding for message//


     ?>
      </thead>
   </table>
</body>
</html>

