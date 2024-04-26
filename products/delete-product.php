<?php 

// including header file

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

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $dataPost->deleteProduct($id);
  
    header("location: ../cart.php");
}

// including footer file

include "../templates/Footer.php";

?>