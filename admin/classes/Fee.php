<?php

include_once "Db.php";
class Fee extends Db
{
  public function add_fee($fee_amount, $cat_id)
  {
    //check if fee is in db before
    $sql = "SELECT * FROM fee WHERE cat_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $cat_id, PDO::PARAM_INT);
    $stmt->execute();
    $fee_count = $stmt->rowCount();
    //if $fee_count is greater than zero it means the fee already exist in the db
    if ($fee_count > 0) {
      echo "<script>alert('Fee already exist in the database')</script>";
      exit();
    }
    $sql = "INSERT INTO fee(fee_amount, cat_id) VALUES(?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $fee_amount, PDO::PARAM_STR);
    $stmt->bindParam(2, $cat_id, PDO::PARAM_INT);
    $stmt->execute();

    $fee_count = $stmt->rowCount();

    if ($fee_count > 0) {
      //
      echo "<script> alert('Amount inserted succesfully'); </script>";
    } else {
      //
    }
  }

  public function get_payment($cat_id)
  {
    $sql = "SELECT fee_amount FROM `fee` where cat_id =?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $cat_id, PDO::PARAM_INT);
    $stmt->execute();
  }

  public function get_all_payment()
  {
    $sql = "SELECT * FROM fee";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $fee = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $fee;
  }

}

?>