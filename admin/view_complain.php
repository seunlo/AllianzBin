<?php
include_once "classes/Complaint.php";
$customer = new Complaint();
$all_complaint = $customer->get_all_complaint();
// echo "<pre>";
// print_r($allcustomers);
?>

<div class="container">
  <div class="row mt-3">
    <div class="col-md-9 mb-4 m-auto">
      <div class="card mb-4">
        <div class="row">
          <div class="col text-center text-success pt-3">
            <h3>View Complaint</h3>
          </div>
        </div>

        <table class='table table-bordered mt-3'>
          <thead class="bg-secondary">
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
          <tbody class="bg-success text-light">
            <?php $sn = 1; ?>
            <?php foreach ($all_complaint as $pay) {
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
                  <a href="profile.php?add_complaint&refcode=<?php //echo $pay['refcode'];?>"> Response </a>
                </td>
              </tr>
            <?php }
            ; ?>
          </tbody>