<?php
include_once "classes/Customer.php";
$customer = new Customer();
$allcustomers = $customer->retrieveCustomer($cust_id);
// echo "<pre>";
// print_r($allcustomers);
?>

<div class="container">
  <div class="row mt-3">
    <div class="col-md-9 mb-4 m-auto">
      <div class="card mb-4">
        <div class="card-header py-3 text-center bg-info">
          <h5 class="mb-0">
            <?php echo $response["cust_full_name"]; ?>
          </h5>
        </div>
        <div class="row">
          <div class="col text-center pt-3">
            <h3>View Profile</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 text-center mt-3">
            <div class="card-header bg-info">
              <h6>Full Name</h6>
            </div>
            <p class="bg-secondary text-light">
              <?php echo $allcustomers['cust_full_name']; ?>
            </p>
          </div>
          <div class="col-md-6 text-center mt-3">
            <div class="card-header bg-info">
              <h6>Email Address</h6>
            </div>
            <p class="bg-secondary text-light">
              <?php echo $allcustomers['cust_email']; ?>
            </p>
          </div>
          <div class="col-md-6 text-center">
            <div class="card-header bg-info">
              <h6>User Name</h6>
            </div>
            <p class="bg-secondary text-light">
              <?php echo $allcustomers['cust_user_name']; ?>
            </p>
          </div>
          <div class="col-md-6 text-center">
            <div class="card-header bg-info">
              <h6>Phone Number</h6>
            </div>
            <p class="bg-secondary text-light">
              <?php echo $allcustomers['cust_phone_number']; ?>
            </p>
          </div>
          <div class="col-md-6 text-center">
            <div class="card-header bg-info">
              <h6>Home Address</h6>
            </div>
            <p class="bg-secondary text-light">
              <?php echo $allcustomers['cust_home_address']; ?>
            </p>
          </div>
          <div class="col-md-6 text-center">
            <div class="card-header bg-info">
              <h6>Location</h6>
            </div>
            <p class="bg-secondary text-light">
              <?php echo $allcustomers['cust_location']; ?>
            </p>
          </div>
          <div class="col-md-6 text-center">
            <div class="card-header bg-info">
              <h6>Category</h6>
            </div>
            <p class="bg-secondary text-light">
              <?php echo $allcustomers['cust_category']; ?>
            </p>
          </div>
          <div class="col-md-6 text-center">
            <div class="card-header bg-info">
              <h6>Reg Date</h6>
            </div>
            <p class="bg-secondary text-light">
            <?php echo $allcustomers['cust_registration_date']; ?>
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>