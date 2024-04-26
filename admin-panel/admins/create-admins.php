<?php 
// including header file
include "../layouts/Header.php";

// including autoload file

include "../../autoload/autoload3.php";

if(!isset($_SESSION['adminName'])){
  header("location: ".APP_URL."");
}

$dataPost = new DataPost();

if(isset($_POST['create_admin'])){
  $name = $_POST['admin_name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['admin_password'], PASSWORD_DEFAULT);

  $dataPost->createAdmins($name, $email, $password);

}

?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="create-admins.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" required/>
                 
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="admin_name" id="form2Example1" class="form-control" placeholder="username" required/>
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="admin_password" id="form2Example1" class="form-control" placeholder="password" required/>
                </div>

            
                <!-- Submit button -->
                <button type="submit" name="create_admin" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
        <?php 
// including footer file
include "../layouts/Footer.php";
?>