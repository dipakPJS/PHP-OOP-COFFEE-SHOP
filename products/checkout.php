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

	if (isset($_POST['place_order'])) {
		$firstName = $_POST['first_name'];
		$lastName = $_POST['last_name'];
		$state = $_POST['states'];
		$street_address = $_POST['street_address'];
		$city = $_POST['city'];
		$zip = $_POST['zip_code'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$user_id = $_SESSION['userId'];
		$status = "Pending";
		$total_price = $_SESSION['total_price'];

		$dataPost->orderProduct(
			$firstName,
			$lastName,
			$state,
			$street_address,
			$city,
			$zip,
			$phone,
			$email,
			$user_id,
			$status,
			$total_price
		);

		header("location: pay.php");
	}



	?>

 <section class="home-slider owl-carousel">

 	<div class="slider-item" style="background-image: url(<?= APP_URL; ?>images/bg_3.jpg);" data-stellar-background-ratio="0.5">
 		<div class="overlay"></div>
 		<div class="container">
 			<div class="row slider-text justify-content-center align-items-center">

 				<div class="col-md-7 col-sm-12 text-center ftco-animate">
 					<h1 class="mb-3 mt-5 bread">Checkout</h1>
 					<p class="breadcrumbs"><span class="mr-2"><a href="<?= APP_URL; ?>index.php">Home</a></span> <span>Checout</span></p>
 				</div>

 			</div>
 		</div>
 	</div>
 </section>

 <section class="ftco-section">
 	<div class="container">
 		<div class="row">
 			<div class="col-md-12 ftco-animate">
 				<form action="checkout.php" method="post" class="billing-form ftco-bg-dark p-3 p-md-5">
 					<h3 class="mb-4 billing-heading">Billing Details</h3>
 					<div class="row align-items-end">
 						<div class="col-md-6">
 							<div class="form-group">
 								<label for="firstname">Firt Name</label>
 								<input type="text" name="first_name" class="form-control" required>
 							</div>
 						</div>
 						<div class="col-md-6">
 							<div class="form-group">
 								<label for="lastname">Last Name</label>
 								<input type="text" name="last_name" class="form-control" required>
 							</div>
 						</div>
 						<div class="w-100"></div>
 						<div class="col-md-12">
 							<div class="form-group">
 								<label for="country">State Address</label>
 								<div class="select-wrap">
 									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
 									<select name="states" id="country" class="form-control" required>
 										<option value="">Select your State</option>
 										<option value="Province No. 1">Province No. 1</option>
 										<option value="Province No. 2">Province No. 2</option>
 										<option value="Bagmati Province">Bagmati Province</option>
 										<option value="Gandaki Province">Gandaki Province</option>
 										<option value="Lumbini Province">Lumbini Province</option>
 										<option value="Karnali Province">Karnali Province</option>
 										<option value="Sudurpashchim Province">Sudurpashchim Province</option>
 									</select>
 								</div>
 							</div>
 						</div>
 						<div class="w-100"></div>
 						<div class="col-md-12">
 							<div class="form-group">
 								<label for="streetaddress">Street Address</label>
 								<input type="text" name="street_address" class="form-control" placeholder="House number and street name" required>
 							</div>
 						</div>

 						<div class="w-100"></div>
 						<div class="col-md-6">
 							<div class="form-group">
 								<label for="towncity">Town / City</label>
 								<input type="text" name="city" class="form-control" placeholder="" required>
 							</div>
 						</div>
 						<div class="col-md-6">
 							<div class="form-group">
 								<label for="postcodezip">Postcode / ZIP *</label>
 								<input type="text" name="zip_code" class="form-control" placeholder="eg: 32903" required>
 							</div>
 						</div>
 						<div class="w-100"></div>
 						<div class="col-md-6">
 							<div class="form-group">
 								<label for="phone">Phone</label>
 								<input type="text" name="phone" class="form-control" placeholder="" required>
 							</div>
 						</div>
 						<div class="col-md-6">
 							<div class="form-group">
 								<label for="emailaddress">Email Address</label>
 								<input type="email" name="email" class="form-control" placeholder="putho@gmail.com" required>
 							</div>
 						</div>
 						<div class="w-100"></div>
 						<div class="col-md-12">
 							<div class="form-group mt-4">
 								<div class="radio">
 									<button type="submit" name="place_order" class="cart-btn btn btn-primary py-2 px-5">
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