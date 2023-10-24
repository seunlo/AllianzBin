<?php
include_once "classes/Community.php";

$cat = new Community();
$all_location = $cat->fetch_all_location();
print_r($all_location);

?>


<!-- <div class="container mt-5">
  <h1 class='text-center'>Edit Location</h1>
  <?php
  if (isset($_GET["comm_id"])) {
    echo $comm_id;
  }

  ?>
  <form action="edit_location_process.php" method="post">
    <div class="form-outline w-50 m-auto">
      <label for="location_name">Community Name</label>
      <input type="text" name="location_name" id="location_name" class="form-control" value="">
    </div>
    <div class="w-50 m-auto">
      <input type="submit" name="edit_location" value="Update Location" class="btn btn-info px-3 my-3">
    </div>
  </form>
</div> -->