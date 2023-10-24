<?php
require_once "../classes/Customer.php";
if ($_POST) {
  if (isset($_POST['uploadbtn'])) {
    $cust_id = $_POST['cust_id'];
    $profile = $_FILES['profile'];

    //do file error validation
    $error = $profile['error'];
    if ($error > 0) {
      echo "please upload a valid file";
      exit();
    }

    //do file size validation
    $file_size = $profile['size'];
    //limit in this case is: 2097152
    if ($file_size > 2097152) {
      echo "your profile picture cannot be larger than 2mb";
      exit();
    }

    //validate file type via the extension
    $allowed = ['jpeg', 'jpg', 'png']; //the file extension that we allow
    $filename = $profile['name'];
    //we are trying to get the extension of the user uploaded file
    $arrfilename = explode('.', $filename);
    $file_ext = end($arrfilename);
    if (!in_array($file_ext, $allowed)) {
      echo "please upload image with png, jpeg or jpg";
      exit();
    }

    $final_filename = "allianzbin" . time() . "." . $file_ext;

    $destination = "../uploads/$final_filename";
    $tempo = $profile['tmp_name'];

    //an inbuilt function that moves our file fro temporary directory to server
    $fileUploaded = move_uploaded_file($tempo, $destination);

    //if the upload is successful, send the filename and user id to user class method where it will be updated for the user
    if ($fileUploaded) {
      $customer = new Customer();
      $response = $customer->upload_profile_image($cust_id, $final_filename);
      if ($response) {
        header('location:../profile.php');
      }
    }
  }
}
?>