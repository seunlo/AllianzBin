<?php

require_once("partials/header_profile.php");
include_once "guards/customer_guard.php";
require_once "classes/Customer.php";
require_once "classes/Fee.php";
$cust_id = $_SESSION["cust_id"];
$customer = new Customer();
$all_customer = $customer->retrieveCustomer($cust_id);
$cat_id = $all_customer['cust_category'];

$fee_amount = new Fee();
$result = $fee_amount->get_payment($cat_id);
$amount = $result['fee_amount'];






// print_r($_SESSION);
?>

<div class="container">
  <div class="row mt-3">
    <div class="col-md-9 mb-4 m-auto">
      <div class="card mb-4">
        <div class="card-header py-3 text-center bg-info text-light">
          <h5 class="mb-0">
            <?php echo $response["cust_full_name"]; ?>
          </h5>
        </div>
        <div class="row">
          <div class="col text-center pt-3">
            <h4>Kindly fill below form to make payment</h4>
          </div>
        </div>
        <div class="card-body" style="min-height:200px">
          <section>
            <div class="row m-auto">
              <div class="col-md-6 m-auto">
                <form id="paymentForm">
                  <div class="form-group">
                    <label for="email">Email Address</label>
                    <input class="form-control bg-secondary text-light" type="email" id="email-address"
                      value="<?php echo $all_customer['cust_email'] ?>" />

                  </div>
                  <div class="form-group">
                    <label for="amount">Amount</label>
                    <input class="form-control bg-secondary text-light" type="number" id="amount" value=<?php echo $amount; ?> readonly />
                  </div>
                  <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input class="form-control bg-secondary text-light" type="text" id="first-name" />
                  </div>
                  <input type="hidden" name="cust_id" value="<?php echo $all_customer['cust_id']; ?>" id="cust_id" />
                  <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input class="form-control bg-secondary text-light" type="text" id="last-name" />
                  </div>
                  <div class="form-submit text-center">
                    <button class="bg-success border-0 rounded-3 p-2 fw-bold text-light my-4" type="submit"
                      onclick="payWithPaystack()"> Submit </button>
                  </div>
                </form>

              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</div>





<script src="assets/scripts/pooper.js" crossorigin="anonymous"></script>
<script src="assets/scripts/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="assets/scripts/script.js" crossorigin="anonymous"></script>
<script src="assets/scripts/jquery313.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
  var paymentForm = document.getElementById('paymentForm');
  paymentForm.addEventListener('submit', payWithPaystack, false);
  function payWithPaystack(e) {
    e.preventDefault();

    var handler = PaystackPop.setup({
      key: 'pk_test_811aedefe275f4e509474dd18de9623b1d654728', // Replace with your public key
      email: document.getElementById('email-address').value,
      amount: document.getElementById('amount').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
      currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
      //ref: 'YOUR_REFERENCE', // Replace with a reference you generated
      callback: function (response) {
        //this happens after the payment is completed successfully
        var reference = response.reference;
        alert('Payment complete! Reference: ' + reference);
        // Make an AJAX call to your server with the reference to verify the transaction

        var cust_id = document.getElementById("cust_id").value;
        $.ajax({
          type: "post",
          url: "process/verify.php",
          data: { "reference": reference, "cust_id": cust_id },
          success: function (response) {
            console.table(response);
            var data = JSON.parse(response);
            if (data.success == true) {
              alert("Payment received successfully");
            } else {
              alert("Your payment failed. Please keep the ref code in case you have a complaint.");
            }

          }
        });

      },
      onClose: function () {
        alert('Transaction was not completed, window closed.');
      },
    });
    handler.openIframe();
  }
</script>

</body>

</html>