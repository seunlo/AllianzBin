<?php
include "classes/Fee.php";
$test = new Fee();
$all_fees = $test->get_payment();
// echo "<pre>";
// print_r($all_fees);
// exit();


if (isset($_POST['btn_delete'])) {
  $fee_id = $_POST['del_fee'];
  $test->delete_fee($fee_id);
}
?>

<div class="container">
  <div class="row mt-3">
    <div class="col-md-9 mb-4 m-auto">
      <div class="card mb-4">
        <div class="row">
          <div class="col">
            <h3 class="text-center text-success mt-3">View Fee</h3>
            <button class="btn btn-danger btn-lg w-100">
              <a href="index.php?add_fee" class="text-decoration-none text-light">Add Fees</a>
            </button>
            <table class='table table-bordered mt-3'>
              <thead class="bg-secondary">
                <tr class='text-center'>
                  <th>S/N</th>
                  <th>Fee Amount</th>
                  <th>Category Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody class="bg-success text-light">
                <?php $sn = 1; ?>
                <?php foreach ($all_fees as $key) { ?>
                  <tr class='text-center'>
                    <td>
                      <?php echo $sn++; ?>
                    </td>
                    <td>
                      <?php echo $key['fee_amount']; ?>
                    </td>
                    <td>
                      <?php echo $key['cat_name']; ?>
                    </td>
                    <td>
                      <a href="index.php?edit_fee=<?php echo $key['fee_id']; ?>" class='text-light'><i
                          class='fa-solid fa-pen-to-square'></i>
                      </a>
                    </td>
                    <td>
                      <form action="" method="post">
                        <input type="hidden" name="del_fee" value="<?php echo $key['fee_id']; ?>">
                        <button type="submit" classs="btn btn-sm btn-danger" name="btn_delete"><i
                            class='fa fa-trash'></i>delete</button>
                      </form>
                    </td>
                    </form>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>