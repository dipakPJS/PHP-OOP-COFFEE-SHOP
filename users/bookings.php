<?php

// including header file

include "../templates/Header.php";

// including autoload file

include "../autoload/autoload2.php";


if (!isset($_SESSION['userId'])) {
	header("location: " . APP_URL . "");
}


$dataPost = new DataPost();

$allBookings = $dataPost->showBooking($_SESSION['userId']);

?>

<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(<?= APP_URL; ?>images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Your Bookings</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Your Bookings</span></p>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">

                    <!-- php code here -->
                    <?php 

                            if ($allBookings) {
                    
                    ?>

                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Write Review</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- fetching booking data -->
                            <?php
                                foreach ((array) $allBookings as $data) {
                            ?>

                                    <tr class="text-center">
                                        <td class="product-remove"><?= $data['first_name']; ?></td>

                                        <td class="image-prod">
                                            <?= $data['last_name']; ?>
                                        </td>

                                        <td class="product-name">
                                            <?= $data['booking_date']; ?>
                                        </td>
                                        <td>
                                        <p><?= $data['booking_time']; ?></p>
                                        </td>

                                        <td class="product-name"><?= $data['phone']; ?></td>
                                      

                                        <td>
                                        <?= $data['messages']; ?>
                                        </td>

                                        <td class = "text-warning">
                                        <?= $data['status']; ?>
                                        </td>
                                        <!-- php code here -->
                                        <!-- checking for status -->
                                        <?php 
                                        
                                        if($data['status'] == "Done"){
                                            
                                       ?> 
                                        <td class="price text-warning"><a class="btn btn-primary" href="<?= APP_URL; ?>/reviews/write-review.php"> Write Review</a></td>
                                        <?php }
                                        
                                        ?>


                                    </tr><!-- END TR-->

                            <?php
                                }
                            } else {
                                echo "<tr><h1 class = 'text-danger text-center'>
                               You do not have any bookings for now</h1></tr>";
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- including footer file -->
<?php include "../templates/Footer.php" ?>