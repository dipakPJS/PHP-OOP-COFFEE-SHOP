<?php
// including header file
include "../layouts/Header.php";

// including autoload file

include "../../autoload/autoload3.php";

if(!isset($_SESSION['adminName'])){
    header("location: ".APP_URL."");
  }

$dataPost = new DataPost();

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $dataPost->deleteBookings($id);

    header("location: ".APP_URL."bookings-admins/show-bookings.php");
}

?>

<?php
  // including footer file
  include "../layouts/Footer.php";
  ?>