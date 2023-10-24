<?php

include_once "Db.php";
class Customer extends Db
{

  public function regCustomer($cust_full_name, $cust_email, $cust_user_name, $cust_password)
  {
    //check if email is in db before
    $sql = "SELECT * FROM customers WHERE cust_user_name = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $cust_user_name, PDO::PARAM_STR);
    $stmt->execute();
    $cust_count = $stmt->rowCount();
    //if $cust_count is greater than zero it means the email already exist in the db
    if ($cust_count > 0) {
      echo "<script>alert('username already exist in the database')</script>";
      exit();
    }


    //email does not exist to get to this line, so insert into db
    $sql = "INSERT INTO customers(cust_full_name, cust_email, cust_user_name, cust_password) VALUES(?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $cust_full_name, PDO::PARAM_STR);
    $stmt->bindParam(2, $cust_email, PDO::PARAM_STR);
    $stmt->bindParam(3, $cust_user_name, PDO::PARAM_STR);
    $stmt->bindParam(4, $cust_password, PDO::PARAM_STR);
    $response = $stmt->execute();
    return $response;
  }

  public function logCustomer($cust_user_name, $cust_password)
  {
    //check if email is in db before
    //check if email is in 
    $sql = "SELECT * FROM customers WHERE cust_user_name = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $cust_user_name, PDO::PARAM_STR);
    $stmt->execute();
    $cust_count = $stmt->rowCount();

    //if it is not in db then count will be less than one
    if ($cust_count < 1) {
      //if it is not in db: return error message
      return "Either Username or password is incorrect";

    }
    //if it is in db: we want the full detail of that user that owns the email
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($customer);
    //check if password matches using password_verify()
    $password_matches = password_verify($cust_password, $customer['cust_password']);
    //if it matches::set session
    if ($password_matches) {
      $_SESSION["cust_id"] = $customer["cust_id"];
      header("location:../index.php");
      exit();
    }
    //return error message
    return "Either email or password is incorrect";
  }

  public function change_password($cust_id, $new_password, $oldpassword)
  {
    $sql = "SELECT cust_password FROM customers WHERE cust_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $cust_id, PDO::PARAM_INT);
    $stmt->execute();
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);
    $password_matches = password_verify($oldpassword, $customer['cust_password']);
    if ($password_matches) {
      $new_password = password_hash($new_password, PASSWORD_DEFAULT);
      $updateSql = "UPDATE customers SET  cust_password = ?";
      $updateStmt = $this->connect()->prepare($updateSql);
      $updateStmt->bindParam(1, $new_password, PDO::PARAM_STR);
      $updateStmt->execute();
      $cust_count = $updateStmt->rowCount();

      if ($cust_count > 0) {
        echo "<script> alert('Password has been update') </script>";
      } else {
        echo "<script> alert('An error has occcured') </script>";
      }
    } else {
      echo "<script> alert('Your Old Password is incorect') </script>";
    }

  }

  public function retrieveCustomer($cust_id)
  {
    $sql = "SELECT * FROM customers WHERE cust_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $cust_id, PDO::PARAM_INT);
    $stmt->execute();
    $cust_details = $stmt->fetch(PDO::FETCH_ASSOC);
    return $cust_details;
  }

  public function fetch_all_customers()
  {
    $sql = "SELECT * FROM customers";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $customers;
  }

  public function update_customer($cust_full_name, $cust_phone_number, $cust_home_address, $cust_location, $cust_category, $cust_id)
  {
    $sql = "UPDATE customers SET cust_full_name = ?, cust_phone_number = ?, cust_home_address = ?, cust_location = ?, cust_category = ? WHERE cust_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $cust_full_name, PDO::PARAM_STR);
    $stmt->bindParam(2, $cust_phone_number, PDO::PARAM_INT);
    $stmt->bindParam(3, $cust_home_address, PDO::PARAM_STR);
    $stmt->bindParam(4, $cust_location, PDO::PARAM_STR);
    $stmt->bindParam(5, $cust_category, PDO::PARAM_STR);
    $stmt->bindParam(6, $cust_id, PDO::PARAM_INT);

    $updated_record = $stmt->execute();
    echo "<script>alert('Profile Updated Successfully')</script>";
    //return $updated_record;
  }

}

$customer = new Customer();
//echo $customer->regCustomer("Seun Jacobs", "seunlo99@gmail.com", "seunloveme2", "glory");
//echo $customer->logCustomer("seunlo@gmail.com", "test");
// echo "<pre>";
// print_r($customer->retrieveCustomer(46));
//echo $customer->update_customer('Samuel Mosafejo', '08087556422', 'house 59 alamo road', 'ojota', 44);

?>