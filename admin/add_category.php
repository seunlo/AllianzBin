<?php
include_once "classes/sanitizer.php";
include "classes/Category.php";
if (isset($_POST["submit_category"])) {
  $insert_category = sanitizer($_POST["insert_category"]);



  $cat = new Category();
  $cat->add_category($insert_category);
}
?>
<div class="container">
  <h3 class="text-center text-success mb-4">Add Category</h3>
  <form method="post">
    <div class='form-outline w-50 m-auto'>
      <input type="text" name="insert_category" class="form-control" placeholder="Insert Category">
    </div>
    <div class="w-50 m-auto">
      <input type="submit" name="submit_category" value="Click here to Add" class='btn btn-danger px-3 my-3'>
    </div>
  </form>
</div>