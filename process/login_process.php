<?php
session_start();
include_once "../classes/sanitizer.php";
include_once "../classes/Customer.php";
if ($_POST) {
  //fetch form values
  if (isset($_POST["login_btn"])) {
    $cust_user_name = sanitizer($_POST["username"]);
    $cust_password = sanitizer($_POST["password"]);
    //validate email and password is empty
    if (empty($cust_user_name) || empty($cust_password)) {
      $_SESSION["login_error"] = "All fields are required";
      header("location:../login.php");
      exit();
    }
    $customer = new Customer();
    $response = $customer->logCustomer($cust_user_name, $cust_password);
    if ($response) {
      $_SESSION["login_error"] = "Either username or password is wrong";
      header("location:../login.php");
      exit();
    }
  }
} else {
  header("location:../login.php");
}
?>