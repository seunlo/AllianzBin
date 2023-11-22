<?php
include_once "classes/Community.php";

$cat = new Alagbado();


if (isset($_GET["edit_location"])) {
  $id = $_GET["edit_location"];
}

$location = $cat->fetch_location_by_id($id);
//$location['comm_name'];
// echo "<pre>";
// print_r($location);

if (isset($_POST["edit_btn"])) {
  $comm_name = $_POST["location_name"];
  $cat->update_location($comm_name, $id);
}

?>


<div class="container mt-3">
  <h1 class='text-center'>Edit Location</h1>

  <form action="" method="post">
    <div class="form-outline w-50 m-auto">
      <label for="location_name">Location Name</label>
      <input type="text" name="location_name" class="form-control" value="<?php echo $location['comm_name']; ?>">
    </div>
    <div class="w-50 m-auto">
      <input type="submit" name="edit_btn" value="Update Location" class="btn btn-info px-3 my-3 w-100">
    </div>
  </form>
</div>