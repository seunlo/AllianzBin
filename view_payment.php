<?php
include "classes/Payment.php";
include_once "classes/Customer.php";
$customer = new Customer();
$allcustomers = $customer->retrieveCustomer($cust_id);
//echo $allcustomers['cust_id'];
$test = new Payment();
$specific_payment = $test->retrievePayment($cust_id);

// echo "<pre>";
// print_r($specific_payment);
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
            <h3>Payment History</h3>
          </div>
        </div>
        <table class='table table-bordered mt-3'>
          <thead class="bg-info">
            <tr class='text-center'>
              <th>S/N</th>
              <th>Customer Id</th>
              <th>Amount</th>
              <th>Payment RefCode</th>
              <th>Payment Status</th>
              <th>Payment Date</th>
            </tr>
          </thead>
          <tbody class="bg-secondary text-light">
            <?php $sn = 1; ?>
            <?php foreach ($specific_payment as $pay) {
              ; ?>
              <tr>
                <td>
                  <?php echo $sn++; ?>
                </td>
                <td>
                  <?php echo $pay['cust_id']; ?>
                </td>
                <td>
                  <?php echo $pay['do_amount']; ?>
                </td>
                <td>
                  <?php echo $pay['do_refcode']; ?>
                </td>
                <td>
                  <?php echo $pay['do_status']; ?>
                </td>
                <td>
                  <?php echo $pay['do_payment_time']; ?>
                </td>
              </tr>
            <?php }
            ; ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>