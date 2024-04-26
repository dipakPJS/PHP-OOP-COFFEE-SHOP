<?php

// including header file

include "../templates/Header.php";

// including autoload file

include "../autoload/autoload2.php";

if (!isset($_SESSION['userId'])) {
	header("location: " . APP_URL . "");
}

$dataPost = new DataPost();

$id = $_SESSION['userId'];

// cart total

$cartTotal = $dataPost->cartTotal($_SESSION['userId']);

// proceed to checkout

if (isset($_POST['checkout'])) {
	$_SESSION['total_price'] = $_POST['total_price'];

	header("location: checkout.php");
}


?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?= APP_URL; ?>images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Cart</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
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
						<!-- php code starts -->

						<?php

						$showCart = $dataPost->showDataCart($id);


						if ($showCart) {

						?>

							<thead class="thead-primary">
								<tr class="text-center">
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>Product</th>
									<th>Price</th>
									<th>Size</th>
									<th>Quantity</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>

								<!-- php code here -->
								<?php foreach ((array) $showCart as $datas) {

								?>

									<tr class="text-center">
										<td class="product-remove"><a href="delete-product.php/?id=<?= $datas['id']; ?>"><span class="icon-close"></span></a></td>

										<td class="image-prod">
											<div class="img" style="background-image:url(<?= IMAGEPRODUCTS; ?>/<?= $datas['product_image']; ?>);"></div>
										</td>

										<td class="product-name">
											<h3><?= $datas['product_name']; ?></h3>
											<p><?= $datas['product_description']; ?></p>
										</td>

										<td class="price">$<?= $datas['price']; ?></td>
										<td class="price"><?= $datas['product_size']; ?></td>

										<td>
											<div class="input-group mb-3">
												<input disabled type="text" name="quantity" class="quantity form-control input-number" value=<?= $datas['product_quantity']; ?> min="1" max="100">
											</div>
										</td>

										<td class="total">$<?= $datas['price'] * $datas['product_quantity']; ?></td>
									</tr><!-- END TR-->
							<?php

								}
							} else {
								echo "<tr>
							<td><h1 class = 'text-danger'>Empty Cart</h1></td>
							</tr>";
							}
							?>
							<!-- php code ends -->

							</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h3>Cart Totals</h3>
					<p class="d-flex">
						<span>Subtotal</span>
						<!-- php code here -->
						<?php

						foreach ((array) $cartTotal as $datas) {
							if ($datas['total']) {
						?>
								<span><?= '$' . $datas['total'] . '.00'; ?></span>
							<?php
							} else {
							?>
								<span>$0.00</span>
							<?php
							}
							?>
					</p>
					<p class="d-flex">
						<span>Delivery</span>
						<?php
						
						if($datas['total'] > 0){
							?> 
						<span>$10.00</span>
						<?php
						} else {
							?> 
							<span>$0.00</span>
							<?php
						}
						
						?>
					</p>
					<p class="d-flex">
						<span>Discount</span>
						<?php
						
						if($datas['total'] > 0){
							?> 
						<span>$3.00</span>
						<?php
						} else {
							?> 
							<span>$0.00</span>
							<?php
						}
						
						?>
					</p>
					<hr>
					<p class="d-flex total-price">
						<span>Total</span>
						<?php
						
						if($datas['total'] > 0){
							?> 
						<span>$<?= $datas['total'] + 10 - 3 ?>.00</span>
						<?php
						} else {
							?> 
							<span>$0.00</span>
							<?php
						}
						
						?>
					</p>
				<?php
						}
				?>
				</div>
				<form action="cart.php" method="post">
					<input type="hidden" value=<?= $datas['total'] + 10 - 3 ?> name="total_price">
					<!-- php code here -->
					<?php 
					if($datas['total'] > 0) {

						?> 
					<button class="cart-btn btn btn-primary py-3 px-4" name="checkout" type="submit">
						<p class="text-dark">Proceed to checkout</p>
					</button>
					<?php

					}
					
					?>
				</form>
			</div>
		</div>
	</div>
</section>


<?php

// include footer template

include "../templates/Footer.php";

?>