<?php
include_once "classes/Fee.php";

$money = new Fee();


if (isset($_GET["edit_fee"])) {
  $fee_id = $_GET["edit_fee"];
}

$location = $money->get_payment_by_id($fee_id);
// echo "<pre>";
// print_r($location);
// exit();

if (isset($_POST["edit_btn"])) {
  $fee_amount = $_POST["amount"];
  $money->update_fee($fee_amount, $fee_id);
}

?>


<div class="container mt-3">
  <h1 class='text-center'>Edit Fee</h1>

  <form action="" method="post">
    <div class="form-outline w-50 m-auto">
      <label for="location_name">Amount</label>
      <input type="text" name="amount" class="form-control" value="<?php echo $location['fee_amount']; ?>">
    </div>
    <div class="w-50 m-auto">
      <input type="submit" name="edit_btn" value="Update Fee" class="btn btn-info px-3 my-3 w-100">
    </div>
  </form>
</div>