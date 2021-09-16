<?php
session_start();

echo "logout successfully";
session_destroy();
header("Location:user_login.php");

?>