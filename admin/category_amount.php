<?php
include "classes/Fee.php";
$test = new Fee();
$all_fees = $test->get_all_payment();
// echo "<pre>";
// print_r($all_fees);
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
                  <th>Category ID</th>
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
                      <?php echo $key['cat_id']; ?>
                    </td>
                    <td>
                      <a href="edit_category.php?id=<?php echo $key['cat_id']; ?>" class='text-light'><i
                          class='fa-solid fa-pen-to-square'></i>
                      </a>
                    </td>
                    <td>
                      <form action="" method="post">
                        <input type="hidden" name="del_cat" value="<?php echo $key['cat_id']; ?>">
                        <button type="submit" classs="btn btn-sm btn-danger" name="btn_delete"><i
                            class='fa fa-trash'></i></button>
                      </form>
                    </td>
                    </form>
                  </tr>
                <?php } ?>

                <?php
                if (isset($_POST['btn_delete'])) {
                  $cat->delete_category($key['cat_id']);
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>