 <!-- including header file -->
 <?php
    require "../templates/Header.php";

    //  including autoload file
    require "../autoload/autoload2.php";

    if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        header("location: http://localhost/coffee-blend/index.php");
        exit;
    }

    if (!isset($_SESSION['userId'])) {
		header("location: " . APP_URL . "");
	}


    ?>

 <section class="home-slider owl-carousel">

     <div class="slider-item" style="background-image: url(<?= APP_URL; ?>images/bg_3.jpg);" data-stellar-background-ratio="0.5">
         <div class="overlay"></div>
         <div class="container">
             <div class="row slider-text justify-content-center align-items-center">

                 <div class="col-md-7 col-sm-12 text-center ftco-animate">
                     <h1 class="mb-3 mt-5 bread">Pay with PayPal</h1>
                     <p class="breadcrumbs"><span class="mr-2"><a href="<?= APP_URL; ?>index.php">Home</a></span> <span>Payment</span></p>
                 </div>
               
             </div>
         </div>
     </div>
     
 </section>
 <div class="container mt-5">
                     <!-- Replace "test" with your own sandbox Business account app client ID -->
                     <script src="https://www.paypal.com/sdk/js?client-id=Ac_usQR6zby30kNy8hOCgsDoH7iZxWF2l3x3cAsZc7QpoXFIJu00laq7jkf7MdgvGZlvghtgFRJYrOdv&currency=USD"></script>
                     <!-- Set up a container element for the button -->
                     <div id="paypal-button-container"></div>
                     <script>
                         paypal.Buttons({
                             // Sets up the transaction when a payment button is clicked
                             createOrder: (data, actions) => {
                                 return actions.order.create({
                                     purchase_units: [{
                                         amount: {
                                             value: '<?= $_SESSION['total_price']; ?>' // Can also reference a variable or function
                                         }
                                     }]
                                 });
                             },
                             // Finalize the transaction after payer approval
                             onApprove: (data, actions) => {
                                 return actions.order.capture().then(function(orderData) {

                                     window.location.href = 'delete-cart.php';
                                 });
                             }
                         }).render('#paypal-button-container');
                     </script>


                 </div>

 <!-- including footer file -->
 <?php 
 
 require "../templates/Footer.php";
 
 ?>