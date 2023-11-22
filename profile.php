<?php
//session_start();
include_once "partials/header.php";

?>

<div class="container">
  <div class="row mt-5">
    <div class="col-md-9 mb-4 m-auto">
      <div class="card mb-4">
        <div class="card-header py-3 text-center bg-info">
          <h3 class="mb-0"><a href="profile.php" class="text-decoration-none text-danger fw-bold">DASHBOARD</a></h3>
        </div>
        <div class="card-body d-flex m-auto pt-5">
          <div>
            <div class="text-center">
              <a href="profile.php?editprofile" class="text-white text-decoration-none"><i
                  class="fa-solid fa-square-pen fa-3x text-success"></i></a>
            </div>
            <p>Update Profile</p>
          </div>
          <div class="mx-5">
            <div class="text-center">
              <a href="profile.php?view_profile" class="text-white text-decoration-none"><i
                  class="fa-solid fa-user fa-3x text-success"></i></a>
            </div>
            <p>View Profile</p>
          </div>
          <div>
            <div class="text-center">
              <a href="profile.php?changepassword" class="text-white text-decoration-none"><i
                  class="fa-solid fa-key fa-3x text-success"></i></a>
            </div>
            <p>Change Password</p>
          </div>
          <div class="mx-5">
            <div class="text-center">
              <a href="profile.php?complaint" class="text-white text-decoration-none"><i
                  class="fa-solid fa-message fa-3x text-success"></i></a>
            </div>
            <p>Complaint</p>
          </div>
          <div class="me-5">
            <div class="text-center">
              <a href="profile.php?view_location" class="text-white text-decoration-none"><i
                  class="fa-solid fa-location-dot fa-3x text-success"></i></a>
            </div>
            <p>View Location</p>
          </div>
          <div>
            <div class="text-center">
              <a href="profile.php?view_payment" class="text-white text-decoration-none"><i
                  class="fa-solid fa-wallet fa-3x text-success"></i></a>
            </div>
            <p>View Payment History</p>
          </div>
        </div>

        <?php
        if (isset($_GET['editprofile'])) {
          include "editprofile.php";
        }
        ?>
        <?php
        if (isset($_GET['view_profile'])) {
          include "view_profile.php";
        }
        ?>
        <?php
        if (isset($_GET['changepassword'])) {
          include "changepassword.php";
        }
        ?>
        <?php
        if (isset($_GET['view_location'])) {
          include "view_location.php";
        }
        ?>
        <?php
        if (isset($_GET['view_payment'])) {
          include "view_payment.php";
        }
        ?>
        <?php
        if (isset($_GET['complaint'])) {
          include "complaint.php";
        }
        ?>
        <?php
        if (isset($_GET['add_complaint'])) {
          include "add_complaint.php";
        }
        ?>
      </div>
    </div>
  </div>
</div>

<?php include "partials/footer.php"; ?>