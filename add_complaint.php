<?php

require_once("guards/customer_guard.php");
require_once "classes/Department.php";
require_once "classes/Complaint.php";

$dept = new Department();
$specific_dept = $dept->get_all_department();

$comp = new Complaint();

if (isset($_POST['submit_btn'])) {
  $dept_id = $_POST['dept'];
  $subject = $_POST['subject'];
  $description = $_POST['desc'];
  $comp->add_complaint($cust_id, $dept_id, $subject, $description);



  // if(empty($dept) || empty($subject) || empty($desc)){
  //   echo "<script>alert('All Fields are required')</script>";
  //   exit();
  // }

}

?>


<div class="container">
  <div class="row">
    <div class="col-md-9 mb-4 m-auto">
      <div class="card-body" style="min-height:200px">

        <form action="" method="post">
          <div class="mb-3">
            <select name="dept" id="" class="form-select text-dark">
              <option value="">Select Department</option>
              <?php foreach ($specific_dept as $key) { ?>
                <option value="<?php echo $key['dept_id']; ?>">
                  <?php echo $key['dept_name']; ?>
                </option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control text-dark" name="subject">
          </div>
          <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <textarea name="desc" id="" cols="10" rows="5" class="form-control"></textarea>
          </div>
          <div class="form-outline text-center">
            <button type="submit" class="btn btn-success btn-lg rounded-3 bg-success text-center"
              name="submit_btn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>