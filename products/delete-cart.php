<?php 
include "../templates/Header.php";
include "../autoload/autoload2.php";

$dataPost = new DataPost();


if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header("location: http://localhost/coffee-blend/index.php");
    exit;
}

if (!isset($_SESSION['userId'])) {
    header("location: " . APP_URL . "");
}

$dataPost->deleteCart($_SESSION['userId']);

header("location: cart.php");

?>