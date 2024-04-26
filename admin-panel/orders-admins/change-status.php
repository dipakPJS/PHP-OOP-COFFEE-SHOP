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

    if(isset($_POST['update_status'])){
        
        $status = $_POST['status'];

        $dataPost->updateStatus($id, $status);

        header("location: ".APP_URL."orders-admins/show-orders.php");
    }
}

?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Status</h5>
          <form method="POST" action="change-status.php/?id=<?= $id; ?>" enctype="multipart/form-data">
                <!-- select status -->
                <div class="form-outline mb-4 mt-4">
                <select name="status" class="form-select  form-control" aria-label="Default select example">
              <option selected>Choose Status</option>
              <option value="Pending">Pending</option>
              <option value="Delivered">Delivered</option>
            </select>
          </div>

                </div>
            
                <!-- Submit button -->
                <button type="submit" name="update_status" class="btn btn-primary  mb-4 text-center">Update</button>

          
              </form>

            </div>
          </div>
        </div>
        <?php 
// including footer file
include "../layouts/Footer.php";
?>