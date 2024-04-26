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

    $showAdminProducts = $dataPost->selectAdminProducts($id);

    // deleting the image from image folder
  
    foreach((array) $showAdminProducts as $data){
        unlink("images/".$data['product_image']."");
    }
   

    $dataPost->deleteAdminProducts($id);

    header("location: ".APP_URL."products-admins/show-products.php");
}

?>

<?php
  // including footer file
  include "../layouts/Footer.php";
  ?>