<?php
session_start();
//require_once("guards/customer_guard.php");

require_once "./classes/Customer.php";


if (isset($_SESSION["cust_id"])) {
  $cust_id = $_SESSION["cust_id"];
  $customer = new Customers();
  $response = $customer->retrieveCustomer($cust_id);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="assets/images/logo.png">
  <link rel="stylesheet" href="assets/CSS/animate.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="assets/CSS/allianz.css">
  <link rel="stylesheet" href="assets/CSS/login.css">
  <link rel="stylesheet" href="assets/font_awesome/css/all.css">
  <title>MainPage</title>
</head>

<body>
  <!-----------------------------HEADER SECTION STARTS HERE--------------------->
  <nav class="navbar navbar-expand-md bg-secondary">
    <div class="container">
      <a href="#"><img src="assets/images/logo.png" alt="logo_image" class="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarScroll">
            <ul class="navbar-nav mx-5 my-2 my-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="testimonial.php">Testimonials</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutus.php">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
            </ul>
          </div>
          <div class="mx-5">
            <h5 class="mb-0 text-light fw-bold">
              <?php
              if (!empty($response["cust_full_name"])) {
                echo $response["cust_full_name"];
              } ?>

              <?php
              if (!empty($cust_id)) {
                ?>
              (Admin)
              <?php
              }
              ?>
            </h5>
          </div>
          <ul class="navbar-nav">
            <li>
              <?php
              if (!empty($cust_id)) {
                ?>
              <a class="nav-link bg-danger rounded-3 text-light text-danger" href="sign_out.php">Logout</a>
              <?php
              }
              ?>

            </li>
          </ul>
        </nav>
      </div>
    </div>
    </div>