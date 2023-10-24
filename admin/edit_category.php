<?php
include_once "classes/Category.php";

$customer = new Category();


if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  $id = null;
}

$all_category = $customer->fetch_all_category();
$getCat = $customer->get_category_detail($id);
// echo "<pre>";
// print_r($getCat);

if (isset($_POST['edit_btn'])) {
  $cat_name = $_POST["category"];


  $profile_updated = $customer->update_category($cat_name, $id);



  //   if ($profile_updated) {
//     header("location:profile.php");
//     exit();
//   }
}



?>





<div class="container">
  <div class="row mt-3">
    <div class="col-md-9 mb-4 m-auto">
      <div class="card mb-4">
        <div class="card-header py-3 text-center">
          <h5 class="mb-0">
            <!-- <?php echo $response["cust_full_name"]; ?> -->
          </h5>
        </div>
        <div class="card-body" style="min-height:200px">


          <form action="" method="post">
            <div class="mb-3">
              <label for="category" class="form-label">Category Name</label>
              <input type="text" name="category" value="<?php echo $getCat['key']; ?>">
            </div>
            <div class="form-outline text-center">
              <button type="submit" class="btn btn-danger log_link text-center" name="edit_btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>