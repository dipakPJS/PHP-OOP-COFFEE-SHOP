<?php

//  including header file

include "../templates/Header.php";

//  including autoload file

include "../autoload/autoload2.php";

// validating the page

if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    header("location: http://localhost/coffee-blend/index.php");
    exit;
}

if (!isset($_SESSION['userId'])) {
    header("location: " . APP_URL . "");
}

$dataPost = new DataPost();

if (isset($_POST['review'])) {
    $review = $_POST['write_review'];
    $userName = $_SESSION['userName'];
    
    $dataPost->createReview($review, $userName);
    
}



?>

<section class="home-slider owl-carousel">

 <div class="slider-item" style="background-image: url(<?= APP_URL; ?>images/bg_3.jpg);" data-stellar-background-ratio="0.5">
     <div class="overlay"></div>
     <div class="container">
         <div class="row slider-text justify-content-center align-items-center">

             <div class="col-md-7 col-sm-12 text-center ftco-animate">
                 <h1 class="mb-3 mt-5 bread">Write Review</h1>
                 <p class="breadcrumbs"><span class="mr-2"><a href="<?= APP_URL; ?>index.php">Home</a></span> <span>Write Review</span></p>
             </div>

         </div>
     </div>
 </div>
</section>

<section class="ftco-section">
 <div class="container">
     <div class="row">
         <div class="col-md-12 ftco-animate">
             <form action="write-review.php" method="post" class="billing-form ftco-bg-dark p-3 p-md-5">
                 <h3 class="mb-4 billing-heading">Write Review</h3>
                 <div class="row align-items-end">
                     <div class="col-md-12">
                         <div class="form-group">
                             <label for="review">Review</label>
                             <input type="text" name="write_review" class="form-control" required>
                         </div>
                     </div>
                      
                     <div class="w-100"></div>
                     <div class="col-md-12">
                         <div class="form-group mt-4">
                             <div class="radio">
                                 <button type="submit" name="review" class="cart-btn btn btn-primary px-5 py-2">
                                     <h5 class="mt-2">Save</h5>
                                 </button>

                             </div>
                         </div>
                     </div>
                 </div>
             </form><!-- END -->

         </div>
     </div>
 </div> <!-- .col-md-8 -->


 </div>

 </div>
 </div>
</section> <!-- .section -->

<?php
// including footer template
include "../templates/Footer.php";

?>