<?php
include_once "classes/Customer.php";
$customer = new Customer();
$allcustomers = $customer->fetch_all_customers();
//echo "<pre>";
//print_r($allcustomers);
?>

<div class="container">
  <div class="row mt-3">
    <div class="col-md-9 mb-4 m-auto">
      <div class="card mb-4">
        <div class="row">
          <div class="col">
            <h3 class="text-center text-success mt-3">View Customers</h3>
            <table class='table table-bordered mt-3'>
              <thead class="bg-secondary">
                <tr class='text-center'>
                  <th>S/N</th>
                  <th>Cust Full Name</th>
                  <th>Email</th>
                  <th>Cust id</th>
                  <th>User Name</th>
                  <th>Phone Number</th>
                  <th>Home Address</th>
                  <th>Location</th>
                  <th>Category</th>
                </tr>
              </thead>
              <tbody class="bg-success text-light">
                <?php $sn = 1; ?>
                <?php foreach ($allcustomers as $key) { ?>
                  <tr class='text-center'>
                    <td scope="row">
                      <?php echo $sn++; ?>
                    </td>
                    <td>
                      <?php echo $key['cust_full_name']; ?>
                    </td>
                    <td>
                      <?php echo $key['cust_email']; ?>
                    </td>
                    <td>
                      <?php echo $key['cust_id']; ?>
                    </td>
                    <td>
                      <?php echo $key['cust_user_name']; ?>
                    </td>
                    <td>
                      <?php echo $key['cust_phone_number']; ?>
                    </td>
                    <td>
                      <?php echo $key['cust_home_address']; ?>
                    </td>
                    <td>
                      <?php echo $key['cust_location']; ?>
                    </td>
                    <td>
                      <?php echo $key['cust_category']; ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>