<?php
session_start();
//require_once("guards/customer_guard.php");

require_once "classes/Customer.php";


if (isset($_SESSION["cust_id"])) {
  $cust_id = $_SESSION["cust_id"];
  $customer = new Customer();
  $response = $customer->retrieveCustomer($cust_id);
  // echo "<pre>";
  // print_r($response);
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

  <nav class="navbar navbar-expand-md bg-info">
    <div class="container">
      <a href="#"><img src="assets/images/logo.png" alt="logo_image" class="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarScroll">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-danger" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="testimonial.php">Testimonials</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="aboutus.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <h5 class="mb-0 text-success fw-bold">
              <?php
              if (!empty($response['cust_full_name'])) {
                echo $response["cust_full_name"];
              } ?>
            </h5>
          </li>
          <li class="nav-item">
            <?php
            if (!empty($cust_id)) {
              ?>
            <a class="nav-link ms-5 text-danger" href="sign_out.php">Logout</a>
            <?php } ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>