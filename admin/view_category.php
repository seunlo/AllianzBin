<?php
include "classes/Category.php";
$cat = new Category();
$all_cat = $cat->fetch_all_category();
//echo "<pre>";
//print_r($all_cat);

if (isset($_POST['btn_delete'])) {
  $cat_id = $_POST['del_cat'];
  $cat->delete_category($cat_id);
}

?>

<div class="container">
  <div class="row mt-3">
    <div class="col-md-9 mb-4 m-auto">
      <div class="card mb-4">
        <div class="row">
          <div class="col">
            <h3 class="text-center text-success mt-3">View Category</h3>
            <button class="btn btn-danger btn-lg w-100">
              <a href="index.php?add_category" class="text-decoration-none text-light">Add Category</a>
            </button>
            <table class='table table-bordered mt-3'>
              <thead class="bg-secondary">
                <tr class='text-center'>
                  <th>S/N</th>
                  <th>Category Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody class="bg-success text-light">
                <?php $sn = 1; ?>
                <?php foreach ($all_cat as $key) { ?>
                  <tr class='text-center'>
                    <td>
                      <?php echo $sn++; ?>
                    </td>
                    <td>
                      <?php echo $key['cat_name']; ?>
                    </td>
                    <td>
                      <a href="index.php?edit_category=<?php echo $key['cat_id']; ?>" class='text-light'><i
                          class='fa-solid fa-pen-to-square'></i>
                      </a>
                    </td>
                    <td>
                      <form action="" method="post">
                        <input type="hidden" name="del_cat" value="<?php echo $key['cat_id']; ?>">
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