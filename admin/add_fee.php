<?php
include_once "classes/sanitizer.php";
  include "classes/Category.php";
  include_once "classes/Fee.php";
  $test = new Category();
  $all_category = $test->fetch_all_category();

  // echo "<pre>";
// print_r($all_category);
  
  if (isset($_POST["submit_amount"])) {
    $cust_category = $_POST['cust_category'];
    $insert_amount = $_POST["insert_amount"];

    $test = new Fee();
    $test->add_fee($insert_amount, $cust_category);
  }
  ?>

  <div class="container">
    <div class="row mt-3">
      <div class="col-md-9 mb-4 m-auto">
        <div class="card mb-4">
          <div class="row">
            <div class="col text-center pt-3">
              <h3 class="text-success">View Category Amount</h3>
              <form method="post">
                <select name="cust_category" id="" class="form-select bg-secondary text-light" required>
                  <option value="">Select Category</option>
                  <?php foreach ($all_category as $key) { ?>
                    <option value="<?php echo $key['cat_id']; ?>">
                      <?php echo $key['cat_name']; ?>
                    </option>
                  <?php } ?>
                </select>
                <div class='form-outline w-100 m-auto'>
                  <input type="number" name="insert_amount" class="form-control" placeholder="Insert Amount">
                </div>
                <div class="w-50 m-auto">
                  <input type="submit" name="submit_amount" value="Add Amount" class='btn btn-danger px-3 my-3'>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>