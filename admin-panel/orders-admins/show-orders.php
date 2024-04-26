<?php
// including header file
include "../layouts/Header.php";

// including autoload file

include "../../autoload/autoload3.php";

if(!isset($_SESSION['adminName'])){
  header("location: ".APP_URL."");
}

$dataPost = new DataPost();

$showOrders = $dataPost->showAdminOrders();

?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Orders</h5>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">first_name</th>
              <th scope="col">State</th>
              <th scope="col">City</th>
              <th scope="col">zip_code</th>
              <th scope="col">phone</th>
              <th scope="col">street_address</th>
              <th scope="col">total_price</th>
              <th scope="col">status</th>
              <th scope="col">Change Status</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            <!-- php code here -->
            <?php 
            
                if($showOrders){
                 

                  foreach ( (array) $showOrders as $data){

                    ?> 
                    
            <tr>
         
              <td><?= $data['first_name']; ?></td>
              <td><?= $data['states']; ?></td>
              <td><?= $data['city']; ?></td>
              <td><?= $data['zip_code']; ?></td>
              <td><?= $data['phone']; ?></td>
              <td><?= $data['street_address']; ?></td>
              <td><?= $data['total_price']; ?></td>
              <td><?= $data['current_status']; ?></td>
              
              <td><a href="<?= APP_URL; ?>orders-admins/change-status.php/?id=<?= $data['id']; ?>" class="btn btn-warning text-white text-center ">Update</a></td>
              <td><a href="<?= APP_URL; ?>orders-admins/delete-orders.php/?id=<?= $data['id']; ?>" class="btn btn-danger  text-center ">Delete</a></td>
            </tr>
                    <?php
                  }

                } else {
                  echo "<tr><h2 class = 'text-danger'>No orders now</h2></tr>";
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