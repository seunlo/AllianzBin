<?php
//session_start();
include "partials/header.php";
//require_once "guards/guard.php";
?>

<div class="container">
  <div class="row mt-5">
    <div class="col-md-9 mb-4 m-auto">
      <div class="card mb-4">
        <div class="card-header py-3 text-center bg-secondary">
          <h3 class="mb-0"><a href="index.php" class="text-decoration-none text-info fw-bold">DASHBOARD</a></h3>
        </div>
        <div class="mt-3 d-flex m-auto">
          <div>
            <div class="text-center">
              <a href="index.php?view_location" class="text-white text-decoration-none"><i
                  class="fa-solid fa-location-dot fa-3x text-danger"></i></a>
            </div>
            <p class="fw-bold">Locations</p>
          </div>
          <div class="mx-5">
            <div class="text-center">
              <a href="index.php?view_category" class="text-white text-decoration-none"><i
                  class="fa-solid fa-list fa-3x text-danger"></i></a>
            </div>
            <p class="fw-bold">Category</p>
          </div>
          <div>
            <div class="text-center">
              <a href="index.php?category_amount" class="text-white text-decoration-none"><i
                  class="fa-solid fa-money-check-dollar fa-3x text-danger"></i></a>
            </div>
            <p class="text-center fw-bold">Fees</p>
          </div>
          <div class="mx-5">
            <div class="text-center">
              <a href="index.php?view_complain" class="text-white text-decoration-none"><i
                  class="fa-solid fa-message fa-3x text-danger"></i></a>
            </div>
            <p class="text-center fw-bold">Message</p>
          </div>
          <div>
            <div class="text-center">
              <a href="index.php?view_payment" class="text-white text-decoration-none"><i
                  class="fa-solid fa-wallet fa-3x text-danger"></i></a>
            </div>
            <p class="fw-bold">All Payments</p>
          </div>
          <div class="mx-5">
            <div class="text-center">
              <a href="index.php?view_customers" class="text-white text-decoration-none"><i
                  class="fa-solid fa-users fa-3x text-danger"></i></a>
            </div>
            <p class="fw-bold">All Customers</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_GET['add_location'])) {
  include "add_location.php";
}
?>
<?php
if (isset($_GET['view_location'])) {
  include "view_location.php";
}
?>
<?php
if (isset($_GET['edit_location'])) {
  include "edit_location.php";
}
?>

<?php
if (isset($_GET['view_customers'])) {
  include "view_customers.php";
}
?>

<?php
if (isset($_GET['add_category'])) {
  include "add_category.php";
}
?>

<?php
if (isset($_GET['view_category'])) {
  include "view_category.php";
}
?>
<?php
if (isset($_GET['edit_category'])) {
  include "edit_category.php";
}
?>
<?php
if (isset($_GET['view_payment'])) {
  include "view_payment.php";
}
?>
<?php
if (isset($_GET['category_amount'])) {
  include "category_amount.php";
}
?>
<?php
if (isset($_GET['add_fee'])) {
  include "add_fee.php";
}
?>
<?php
if (isset($_GET['view_complain'])) {
  include "view_complain.php";
}
?>