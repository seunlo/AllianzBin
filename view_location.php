<?php
include "classes/Community.php";
$location = new Alagbado();
$all_location = $location->fetch_all_location();
// print_r($all_location);
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
            <h3>View Location</h3>
          </div>
        </div>
        <table class='table table-bordered mt-3'>
          <thead class="bg-info">
            <tr class='text-center'>
              <th>S/N</th>
              <th>Location Name</th>
            </tr>
          </thead>
          <tbody class="bg-secondary text-light">
            <?php $sn = 1; ?>
            <?php foreach ($all_location as $key) { ?>
              <tr class='text-center'>
                <td class="text-center">
                  <?php echo $sn++; ?>
                </td>
                <td>
                  <?php echo $key['comm_name']; ?>
                </td>

              </tr>
            <?php } ?>

          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>