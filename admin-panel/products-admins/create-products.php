<?php
// including header file
include "../layouts/Header.php";

// including autoload file

include "../../autoload/autoload3.php";

if (!isset($_SESSION['adminName'])) {
  header("location: " . APP_URL . "");
}

$dataPost = new DataPost();

if (isset($_POST['create_product'])) {

  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $type =  $_POST['type'];

  $image = $_FILES['product_image']['name'];

  $dir = "images/" . basename($image);

  $dataPost->insertProduct($name, $image, $description, $price, $type);

  if (move_uploaded_file($_FILES['product_image']['tmp_name'], $dir)) {
    header("location: " . APP_URL . "products-admins/show-products.php");
  }
}


?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Create Product</h5>
        <form method="POST" action="create-products.php" enctype="multipart/form-data">
          <!-- Email input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" required />

          </div>

          <div class="form-outline mb-4 mt-4">
            <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" required />

          </div>
          <div class="form-outline mb-4 mt-4">
            <input type="file" name="product_image" id="form2Example1" class="form-control" required />

          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required></textarea>
          </div>

          <div class="form-outline mb-4 mt-4">

            <select name="type" class="form-select  form-control" aria-label="Default select example" required>
              <option selected value="">Choose Type</option>
              <option value="drink">drink</option>
              <option value="dessert">dessert</option>
            </select>
          </div>

          <br>



          <!-- Submit button -->
          <button type="submit" name="create_product" class="btn btn-primary  mb-4 text-center">Create Product</button>


        </form>

      </div>
    </div>
  </div>

  <?php
  // including footer file
  include "../layouts/Footer.php";
  ?>