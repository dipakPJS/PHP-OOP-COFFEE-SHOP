<!-- including header file -->
<?php 

include 'templates/Header.php';

// including autoload file

include "autoload/autoload.php";

?>


<section class="home-slider owl-carousel">

<div class="slider-item" style="background-image: url(<?= APP_URL; ?>images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
                <h1 class="mb-3 mt-5 bread">404 Page Not Found</h1>
                <a href="<?= APP_URL; ?>" class="btn btn-primary py-3 px-4"><p class="text-dark">Go Home</p></a>
              
            </div>
          
        </div>
    </div>
</div>

</section>

<!-- including footer file -->

<?php 

include "templates/Footer.php";

?>