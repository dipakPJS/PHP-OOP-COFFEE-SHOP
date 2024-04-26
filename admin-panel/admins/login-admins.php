 <!-- including header file -->

 <?php 
 
 include "../layouts/Header.php";
 include "../../autoload/autoload3.php";

 if(isset($_SESSION['adminName'])){
  header("location: ".APP_URL."");
 }

 $dataPost = new DataPost();
 
 if(isset($_POST['loginUser'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $dataPost->loginAdmin($email, $password);
 }

 ?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>
              <form method="POST" class="p-auto" action="login-admins.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="loginUser" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>

            </div>
       </div>
     </div>

 <!-- including footer file -->

 <?php 
 
 include "../layouts/Footer.php";
 
 ?>
