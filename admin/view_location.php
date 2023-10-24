<?php
include "classes/Community.php";
$location = new Alagbado();
$all_location = $location->fetch_all_location();
//echo "<pre>";
//print_r($all_location);
?>

<div class="container">
  <div class="row mt-3">
    <div class="col-md-9 mb-4 m-auto">
      <div class="card mb-4">
        <div class="row">
          <div class="col">
            <h3 class="text-center text-success mt-3">View Location</h3>
            <button class="btn btn-danger btn-lg w-100">
              <a href="index.php?add_location" class="text-decoration-none text-light">Add Location</a>
            </button>
            <table class='table table-bordered mt-3'>
              <thead class="bg-secondary">
                <tr class='text-center'>
                  <th>S/N</th>
                  <th>Location Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody class="bg-success text-light">
                <?php $sn = 1; ?>
                <?php foreach ($all_location as $key) { ?>
                  <tr class='text-center'>
                    <td>
                      <?php echo $sn++; ?>
                    </td>
                    <td>
                      <?php echo $key['comm_name']; ?>
                    </td>
                    <td>
                      <a href="index.php?edit_location=<?php echo $key['comm_id']; ?>" class='text-light'><i
                          class='fa-solid fa-pen-to-square'></i>
                      </a>
                    </td>
                    <td>
                      <form action="" method="post">
                        <input type="hidden" name="del_location" value="<?php echo $key['comm_id']; ?>">
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