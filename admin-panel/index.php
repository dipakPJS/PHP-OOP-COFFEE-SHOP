<!-- including header file -->
<?php 

include "layouts/Header.php";

// including autoload file

include "../autoload/autoload2.php";

if(!isset($_SESSION['adminName'])){
  header("location: ".APP_URL."admins/login-admins.php");
}

$dataPost = new DataPost();

$countProducts = $dataPost->countProduct();
$countOrders = $dataPost->countOrders();
$countBookings = $dataPost->countBookings();
$countAdmins = $dataPost->countAdmins();

?>
            
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Products</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of products: <?php foreach((array) $countProducts as $data){ echo $data['count_product'];} ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Orders</h5>
              
              <p class="card-text">number of orders: <?php foreach((array) $countOrders as $data){ echo $data['count_orders'];} ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bookings</h5>
              
              <p class="card-text">number of bookings: <?php foreach((array) $countBookings as $data){ echo $data['count_bookings'];} ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php foreach((array) $countAdmins as $data){ echo $data['count_admins'];} ?></p>
              
            </div>
          </div>
        </div>
      </div>
  
      <!-- including footer file -->
      <?php 
      
      include "layouts/Footer.php";
      
      ?>