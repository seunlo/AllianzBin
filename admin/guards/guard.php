<?php
if(!isset($_SESSION['cust_id'])){
    header("location:admin_login.php");
    exit();
}


// ThIS GUARD IS USED TO CHECK IF THE LOG IN PERSON IS ADMIN 

if(!isset($_SESSION['role'])){
    header("location:admin_login.php");
    exit();
}





?>