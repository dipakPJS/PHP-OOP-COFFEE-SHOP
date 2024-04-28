<?php
// including header file
include "../layouts/Header.php";

// including autoload file
include "../../autoload/autoload3.php";

if (!isset($_SESSION['adminName'])) {
  header("location: " . APP_URL . "");
}

$dataPost = new DataPost();

// updating products section starts

if(isset($_POST['update_product'])){

  $id = $_GET['id'];
  $product_name = $_POST['product_name'];
  $image = $_FILES['product_image']['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $type = $_POST['type'];

  // Retrieve the existing image file name
  $existingProductImage = $dataPost->showProductImage($id)['product_image'];

  // Checking if a new image was uploaded
  if(!empty($image)){
    // Removing the existing image file from the directory
    $dir = 'images/'. $existingProductImage;
    if(file_exists($dir)){
      unlink($dir);
    }

    // Moving the new image file to the desired directory
    $targetDirectory = 'images/';
    $targetFile = $targetDirectory.basename($image);
    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $targetFile)) {
      // File upload successful
      $dataPost->updateAdminProducts($id, $product_name, $image, $description, $price, $type);
    } else {
      // File upload failed
      echo "<script>alert('Sorry, there was an error uploading your file');</script>";
    }
  } else {
    // No new image uploaded, update only the other fields in the database
    $dataPost->updateAdminProducts($id, $product_name, $existingProductImage, $description, $price, $type);
  }

  header("location: " . APP_URL . "products-admins/show-products.php");
}

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $showUpdateAdminProducts = $dataPost->showAdminUpdateProducts($id);
}
?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Update Product</h5>

        <?php foreach ((array) $showUpdateAdminProducts as $data) { ?>
          <form method="POST" action="update-products.php/?id=<?= $data['id']; ?>" enctype="multipart/form-data">
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="product_name" id="form2Example1" value="<?= $data['product_name']; ?>" class="form-control" placeholder="name" required />
            </div>

            <div class="form-outline mb-4 mt-4">
              <input type="text" name="price" id="form2Example1" value="<?= $data['price']; ?>" class="form-control" placeholder="price" required />
            </div>

            <div class="form-outline mb-4 mt-4">
              <input type="file" name="product_image" id="form2Example1" class="form-control" required />
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Description</label>
              <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required><?= $data['description']; ?></textarea>
            </div>

            <div class="form-outline mb-4 mt-4">
              <select name="type" class="form-select form-control" aria-label="Default select example" required>
                <option value="drink" <?php if($data['type'] == 'drink') echo 'selected'; ?>>Drink</option>
                <option value="dessert" <?php if($data['type'] == 'dessert') echo 'selected'; ?>>Dessert</option>
              </select>
            </div>

            <br>

            <!-- Submit button -->
            <button type="submit" name="update_product" class="btn btn-success mb-4 text-center">Update Product</button>
            <a href="<?= APP_URL ?>products-admins/show-products.php" class="btn btn-dark mb-4 ms-2 text-center">Cancel</a>
          </form>
        <?php } ?>

      </div>
    </div>
  </div>
</div>

<?php
// including footer file
include "../layouts/Footer.php";
?>
