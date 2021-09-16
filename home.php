<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

<script type="text/javascript">
window.history.forward();
function noBack(){
  window.history.forward();
}

</script>

</head>

<body>


</body>
</html>
<?php
session_start();
include 'connection.php';

if(!isset($_SESSION['user_num'])){
    header("Location:user_login.php");
  }

  
?>
<a href="logout.php">logout</a>
