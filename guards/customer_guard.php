<?php
//check if someone is not logged in
//how can you know that user_id will not be in session
//so therefore redirect them back to  login page
if (!isset($_SESSION["cust_id"])) {
  header("location:login.php");
  exit();
}
?>