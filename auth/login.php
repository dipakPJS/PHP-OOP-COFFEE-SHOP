<?php
// including header file

include "../templates/Header.php";

//  including autoload file

include "../autoload/autoload2.php";

$dataPost = new DataPost();

// protecting routes

if(isset($_SESSION['userName'])){
  header("location: http://localhost/coffee-blend/index.php");
}

?>

<section class="home-slider owl-carousel">

  <div class="slider-item" style="background-image: url(<?= APP_URL; ?>images/bg_1.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Login</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="<?= APP_URL; ?>index.php">Home</a></span> <span>Login</span></p>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <?php
        if (isset($_POST["login"])) {
          $userEmail = $_POST['email'];
          $userPassword = $_POST['userPassword'];

          $dataPost->loginUser($userEmail, $userPassword);
        }

        ?>
        <form action="login.php" class="billing-form ftco-bg-dark p-3 p-md-5" method="post">
          <h3 class="mb-4 billing-heading">Login</h3>
          <div class="row align-items-end">
            <div class="col-md-12">
              <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" name="userPassword" class="form-control" placeholder="Password">
              </div>

            </div>
            <div class="col-md-12">
              <div class="form-group mt-4">
                <div class="radio">
                  <button name="login" class="btn btn-primary py-3 px-4">Login</button>
                </div>
              </div>
            </div>


        </form><!-- END -->
      </div> <!-- .col-md-8 -->
    </div>
  </div>
  </div>
</section> <!-- .section -->

<!-- including footer file-->

<?php 

include "../templates/Footer.php";

?>