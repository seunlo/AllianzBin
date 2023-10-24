<?php
include_once "classes/sanitizer.php";
include "classes/Community.php";
if (isset($_POST["submit_location"])) {
  $insert_location = sanitizer($_POST["insert_location"]);

  $gbemi = new Alagbado();
  $gbemi->add_location($insert_location);
}
?>
<div class="container">
  <h3 class="text-center text-success mb-4">Add Location</h3>
  <form method="post">
    <div class='form-outline w-50 m-auto'>
      <input type="text" name="insert_location" class="form-control" placeholder="Insert Location">
    </div>
    <div class="w-50 m-auto">
      <input type="submit" name="submit_location" value="Click here to Add" class='btn btn-danger px-3 my-3'>
    </div>
  </form>
</div>