<?php
require_once "../classes/Db.php";

class Payment extends Db
{
  public function insert_payment_record($do_refcode, $do_amount, $cust_id, $do_status, $do_data, $do_payment_time)
  {
    $sql = "INSERT INTO donation(do_refcode, do_amount, cust_id, do_status, do_data, do_payment_time) VALUES(?, ?, ?, ?, ?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $do_refcode, PDO::PARAM_STR);
    $stmt->bindParam(2, $do_amount, PDO::PARAM_INT);
    $stmt->bindParam(3, $cust_id, PDO::PARAM_INT);
    $stmt->bindParam(4, $do_status, PDO::PARAM_STR);
    $stmt->bindParam(5, $do_data, PDO::PARAM_STR);
    $stmt->bindParam(6, $do_payment_time, PDO::PARAM_STR);
    $record_inserted = $stmt->execute();
    if ($record_inserted) {
      return true;
    } else {
      return false;
    }
  }

  public function retrievePayment($cust_id)
  {
    $sql = "SELECT * FROM donation WHERE cust_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $cust_id, PDO::PARAM_INT);
    $stmt->execute();
    $cust_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $cust_details;
  }

  public function fetchAllPayments()
  {
    $sql = "SELECT * FROM donation";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $customers;
  }
}

$test = new Payment();
//$test->insert_payment_record("T047886085836972", 3000, 46, "success", "all the details are here", "2023-09-20T08:45:01.000Z");
// $specific_payment = $test->retrievePayment(4);
// echo "<pre>";
// print_r($specific_payment);
// $allPayments = $test->fetchAllPayments();
// echo "<pre>";
// print_r($allPayments);

?>