<?php 

session_start();

if(!isset($_SESSION['adminName'])){
    header("location: ".APP_URL."");
  }

session_unset();
session_destroy();

header("location: http://localhost/coffee-blend/admin-panel/admins/login-admins.php");

?>