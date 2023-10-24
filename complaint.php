<?php
include_once "classes/Complaint.php";
$comp = new Complaint();
$all_comp = $comp->get_one_complaint($cust_id);
// echo "<pre>";
// print_r($all_comp);
?>

<div class="container">
  <div class="row mt-3">
    <div class="col-md-9 mb-4 m-auto">
      <div class="card mb-4">
        <div class="card-header py-3 text-center bg-info">
          <h5 class="mb-0">
            <?php echo $response["cust_full_name"]; ?>
          </h5>
        </div>
        <div class="row">
          <div class="col text-center pt-3">
            <h3>View Complaint</h3>
          </div>
        </div>
        <button class="btn btn-success btn-lg mb-4">
          <a href="profile.php?add_complaint" class="text-decoration-none text-light">Add Complaint</a>
        </button>

        <table class='table table-bordered mt-3'>
          <thead class="bg-info">
            <tr class='text-center'>
              <th>S/N</th>
              <th>Department</th>
              <th>Subject</th>
              <th>Description</th>
              <th>Date Created</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="bg-secondary text-light">
            <?php $sn = 1; ?>
            <?php foreach ($all_comp as $pay) {
              ; ?>
              <tr>
                <td>
                  <?php echo $sn++; ?>
                </td>
                <td>
                  <?php echo $pay['Department']; ?>
                </td>
                <td>
                  <?php echo $pay['subject']; ?>
                </td>
                <td>
                  <?php echo $pay['description']; ?>
                </td>
                <td>
                  <?php echo $pay['created_at']; ?>
                </td>
                <td>
                  <?php echo $pay['status']; ?>
                </td>
                <td>
                  <?php echo $pay['updated_at']; ?>
                </td>

                <td>
                  <a href="profile.php?add_complaint&refcode=<?php //echo $pay['refcode'];?>"> Response </a>
                </td>
              </tr>
            <?php }
            ; ?>
          </tbody>