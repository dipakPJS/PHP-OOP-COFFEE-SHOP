<?php
// including header file
include "../layouts/Header.php";

// including autoload file

include "../../autoload/autoload3.php";

if(!isset($_SESSION['adminName'])){
  header("location: ".APP_URL."");
}

$dataPost = new DataPost();

$showProducts = $dataPost->showAdminProducts();



?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Foods</h5>
        <a href="create-products.php" class="btn btn-primary mb-4 text-center float-right">Create Products</a>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">image</th>
              <th scope="col">price</th>
              <th scope="col">type</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            <!-- php code here -->
            <?php 
            
            if($showProducts){

              $i = 1;

              foreach( (array) $showProducts as $data){

                ?> 
          
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $data['product_name']; ?></td>
              <td><img src="images/<?= $data['product_image']; ?>" style = "width: 60px; height: 60px" alt="product-image"></td>
              <td>$<?= $data['price']; ?></td>
              <td><?= $data['type']; ?></td>
              <td><a href="delete-products.php/?id=<?= $data['id']; ?>" class="btn btn-danger  text-center ">Delete</a></td>
            </tr>
            <!-- php code ends here -->
                <?php

              }
            } else {
              echo "<tr><h2 class = 'text-danger text-center'>Empty Products</h2></tr>";
            }

            ?>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php
  // including footer file
  include "../layouts/Footer.php";
  ?>