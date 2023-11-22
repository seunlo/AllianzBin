<?php include "partials/header.php";

//session_start();
include_once "classes/Customer.php";


if ($_POST) {

  if (isset($_POST['admin_login'])) {
    //Fecth form values
    $cust_user_name = $_POST['username'];
    $cust_password = $_POST['password'];

    //Validate Email and Password fields not empty.
    if (empty($cust_user_name) || empty($cust_password)) {
      $_SESSION['login_error'] = "All fields are required";
      header("location:admin_login.php");
      exit();
    }

    //Validation for if either email or password is wrong.
    $admin = new Customers();
    $response = $admin->logCustomer($cust_user_name, $cust_password);
    if ($response) {
      $_SESSION['login_error'] = "Error, either email or password is incorrect";
      header("location:admin_login.php");
      exit();
    }
  }

} else {
  //header('location:admin_login.php');
}

?>

<body>
  <div class="container-fluid m-3">
    <h2 class='text-center mb-5'>Admin Login</h2>
    <div class="row d-flex justify-content-center">
      <div class="col-lg-6">
        <img src="assets/images/logo.png" class="img-fluid">
      </div>
    </div>
    <div class="col-lg-6">
      <form action="" method="post">
        <div class="form-outline mb-4">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" placeholder="Enter your username" class="form-control">
        </div>
        <div class="form-outline mb-4">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" placeholder="Enter your password" class="form-control">
        </div>
        <div>
          <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
        </div>
      </form>
    </div>
  </div>
  <?php include "partials/footer.php";?>