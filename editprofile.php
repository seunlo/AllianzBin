<?php

require_once("guards/customer_guard.php");
include_once "classes/Community.php";
include_once "classes/Category.php";
require_once "classes/Customer.php";

if (isset($_SESSION["cust_id"])) {
  $cust_id = $_SESSION["cust_id"];
  $customer = new Customer();
  $response = $customer->retrieveCustomer($cust_id);
  //echo "<pre>";
  //print_r($response);
}


$location = new Alagbado();
$all_location = $location->fetch_all_location();

$cat = new Category();
$all_category = $cat->fetch_all_category();




if (isset($_POST['edit_btn'])) {
  $cust_full_name = $_POST["fullname"];
  $cust_phone_number = $_POST["phone"];
  $cust_home_address = $_POST["home_address"];
  $cust_location = $_POST["cust_location"];
  $cust_category = $_POST["cust_category"];
  //$cust_id = $_POST["cust_id"];

  if (empty($cust_full_name) || empty($cust_phone_number) || empty($cust_home_address) || empty($cust_location) || empty($cust_category)) {
    echo "<script>alert('All Fields are required')</script>";
    exit();
  }



  $customer = new Customer();
  $profile_updated = $customer->update_customer($cust_full_name, $cust_phone_number, $cust_home_address, $cust_location, $cust_category, $cust_id);

  //   if ($profile_updated) {
//     header("location:profile.php");
//     exit();
//   }
}


?>


<div class="container">
  <div class="row mt-3">
    <div class="col-md-9 mb-4 m-auto">
      <div class="card mb-4">
        <div class="card-header py-3 text-center bg-info text-dark">
          <h5 class="mb-0">
            <?php echo $response["cust_full_name"]; ?>
          </h5>
        </div>
        <div class="row">
          <div class="col text-center pt-3">
            <h3>Edit Profile</h3>
          </div>
        </div>
        <div class="card-body" style="min-height:200px">

          <form action="" method="post">
            <div class="mb-3">
              <label for="fullname" class="form-label">FullName</label>
              <input type="text" class="form-control bg-secondary text-light" name="fullname"
                value="<?php echo $response['cust_full_name'] ?>">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="number" class="form-control bg-secondary text-light" name="phone"
                value="<?php echo $response['cust_phone_number'] ?>">
            </div>
            <div class="form-outline mb-3">
              <label for="home_address" class="form-label">Home Address</label>
              <input type='text' name="home_address" class='form-control bg-secondary text-light'
                value="<?php echo $response['cust_home_address'] ?>">
            </div>
            <div class="form-outline mb-3">
              <select name="cust_location" id="" class="form-select bg-secondary text-light">
                <option value="">Select Location</option>
                <?php foreach ($all_location as $key) { ?>
                  <option value="<?php echo $key['comm_name']; ?>">
                    <?php echo $key['comm_name']; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-outline mb-3">
              <select name="cust_category" id="" class="form-select bg-secondary text-light">
                <option value="">Select Category</option>
                <?php foreach ($all_category as $key) { ?>
                  <option value="<?php echo $key['cat_id']; ?>">
                    <?php echo $key['cat_name']; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-outline text-center">
              <button type="submit" class="btn btn-success rounded-3 bg-success text-center"
                name="edit_btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>