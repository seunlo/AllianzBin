<?php
session_start();
include_once "../classes/sanitizer.php";
include_once "../classes/Customer.php";
if ($_POST) {
  if (isset($_POST['reg_btn'])) {
    $cust_full_name = sanitizer($_POST["fullname"]);
    $cust_email = sanitizer($_POST["email"]);
    $cust_user_name = sanitizer($_POST["username"]);
    $cust_password = sanitizer($_POST["password"]);
    $cust_confirm_pass = sanitizer($_POST["cust_confirm_pass"]);

    //validation
    if (empty($cust_full_name) || empty($cust_email) || empty($cust_user_name) || empty($cust_password) || empty($cust_confirm_pass)) {
      $_SESSION["reg_error"] = "All fields are required";
      header("location:../register.php");
      exit();
    }
    //password and cpassword are the same
    if ($cust_password != $cust_confirm_pass) {
      $_SESSION["reg_error"] = "Password and Confirm Password must match";
      header("location:../register.php");
      exit();
    }
    //password length

    if (strlen($cust_password) < 4) {
      $_SESSION["reg_error"] = "Password length must be at least 4 characters";
      header("location:../register.php");
      exit();
    }
    $hashed_password = password_hash($cust_password, PASSWORD_DEFAULT);
    $customer = new Customer();
    $response = $customer->regCustomer($cust_full_name, $cust_email, $cust_user_name, $hashed_password);

    if ($response) {
      echo "<script>alert('Registered successfully')</script>";
    }
  }
} else {
  header("location:../register.php");
}
?>