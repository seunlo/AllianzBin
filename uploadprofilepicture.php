<?php
session_start();
include_once "partials/header.php";
require_once("guards/customer_guard.php");

require_once "classes/Customer.php";

if (isset($_SESSION["cust_id"])) {
  $cust_id = $_SESSION['cust_id'];
  $customer = new Customer();
  $response = $customer->retrieveCustomer($cust_id);
  //echo "<pre>";
  //print_r($response);

}
?>
<div class="container">

  <div class="row">
    <div class="col-md-3 mb-4">
      <div class="card mb-4">
        <div class="card-header py-3">
          <h5 class="mb-0">WELCOME
            <?php echo $response['cust_full_name']; ?>
          </h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="text-center mb-3">
                <img src="assets/images/logo.png" class="img-fluid rounded-circle">
              </div>
              <div class="col-12 text-center">
                <button type="button" class="btn btn-primary btn-block btn-sm">
                  Change Picture
                </button>
              </div>
              <hr>
              <div>
                <span><b>
                    <?php echo $response['cust_full_name']; ?>
                  </b></span>
                <span><i>Member Since
                    <?php echo $response['cust_registration_date']; ?>
                  </i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 mb-4">
      <div class="card mb-4">
        <div class="card-header py-3">
          <h5 class="mb-0">Profile</h5>
        </div>
        <div class="card-body" style="min-height:200px">
          <form action="process/upload_profile_process.php" method="post" enctype="multipart/form-data">
            <div>
              <label for="profile"> Change Profile Picture</label>
              <input type="file" name="profile" class="form-control">
            </div>
            <input type="hidden" name="cust_id" value="<?php echo $cust_id; ?>">
            <input type="submit" value="change" name="uploadbtn" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>


  </div>
</div>





<?php
require_once("partials/footer.php");
?>