<?php
include_once "classes/Category.php";

$customer = new Category();

if (isset($_GET["edit_category"])) {
  $cat_id = $_GET["edit_category"];
}

$cat = $customer->get_category_detail($cat_id);
//$location['comm_name'];
// echo "<pre>";
// print_r($location);

if (isset($_POST["edit_btn"])) {
  $cat_name = $_POST["category_name"];
  $customer->update_category($cat_name, $cat_id);
}
?>

<div class="container mt-3">
  <h1 class='text-center'>Edit Category</h1>

  <form action="" method="post">
    <div class="form-outline w-50 m-auto">
      <label for="category_name">Category Name</label>
      <input type="text" name="category_name" value="<?php echo $cat['cat_name']; ?>" class="form-control">
    </div>
    <div class="w-50 m-auto">
      <input type="submit" name="edit_btn" value="Update Location" class="btn btn-info px-3 my-3 w-100">
    </div>
  </form>
</div>