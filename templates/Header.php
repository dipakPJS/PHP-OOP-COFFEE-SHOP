<?php

// starting the session

session_start();

$_SESSION['putho'] = "turi";

// global url;

define("APP_URL", "http://localhost/coffee-blend/");

define("IMAGEPRODUCTS", "http://localhost/coffee-blend/admin-panel/products-admins/images");





?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>PHP OOP coffee shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

  <link rel="stylesheet" href="<?= APP_URL; ?>css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="<?= APP_URL; ?>css/animate.css">

  <link rel="stylesheet" href="<?= APP_URL; ?>css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= APP_URL; ?>css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= APP_URL; ?>css/magnific-popup.css">

  <link rel="stylesheet" href="<?= APP_URL; ?>css/aos.css">

  <link rel="stylesheet" href="<?= APP_URL; ?>css/ionicons.min.css">

  <link rel="stylesheet" href="<?= APP_URL; ?>css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="<?= APP_URL; ?>css/jquery.timepicker.css">


  <link rel="stylesheet" href="<?= APP_URL; ?>css/flaticon.css">
  <link rel="stylesheet" href="<?= APP_URL; ?>css/icomoon.css">
  <link rel="stylesheet" href="<?= APP_URL; ?>css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="<?= APP_URL; ?>index.php">Coffee<small>
          <?php

          if (isset($_SESSION['userName'])) {
            echo $_SESSION['userName'];
          } else {
            echo "Shop";
          }

          ?>
        </small></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="<?= APP_URL; ?>index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="<?= APP_URL; ?>menu.php" class="nav-link">Menu</a></li>
          <li class="nav-item"><a href="<?= APP_URL; ?>services.php" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="<?= APP_URL; ?>about.php" class="nav-link">About</a></li>

          <li class="nav-item"><a href="<?= APP_URL; ?>contact.php" class="nav-link">Contact</a></li>

          <?php

          if (isset($_SESSION['userName'])) {

          ?>
            <li class="nav-item cart"><a href="<?= APP_URL; ?>products/cart.php" class="nav-link"><span class="icon icon-shopping_cart"></span></a>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php
                echo $_SESSION['userName'];
                ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?= APP_URL; ?>users/bookings.php">Your Bookings</a></li>
                <li><a class="dropdown-item" href="<?= APP_URL; ?>users/orders.php">Your Orders</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="<?= APP_URL; ?>auth/logout.php">Logout</a></li>
              </ul>
            </li>

          <?php

          } else {
          ?>
            <li class="nav-item"><a href="<?= APP_URL; ?>auth/login.php" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="<?= APP_URL; ?>auth/register.php" class="nav-link">Register</a></li>

          <?php
          }

          ?>







        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->