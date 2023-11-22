<?php

include_once "../classes/Db.php";
class Fee extends Db
{
  public function add_fee($fee_amount, $cat_id)
  {
    $sql = "INSERT INTO fee(fee_amount, cat_id) VALUES(?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $fee_amount, PDO::PARAM_STR);
    $stmt->bindParam(2, $cat_id, PDO::PARAM_INT);
    $response = $stmt->execute();
    if ($response) {
      echo "<script>alert('Fee Added Successfully');
      window.location.href = '../admin/index.php?view_fee';      
      </script>";
    }
  }

  public function get_payment_by_id($fee_id)
  {
    $sql = "SELECT fee_amount FROM fee where fee_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $fee_id, PDO::PARAM_INT);
    $stmt->execute();
    $fee = $stmt->fetch(PDO::FETCH_ASSOC);
    return $fee;
  }

  public function get_payment()
  {
    $sql = "SELECT fee.fee_id, fee.fee_amount, category.cat_name
    FROM fee JOIN category ON category.cat_id = fee.cat_id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $payment = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $payment;
  }
  public function update_fee($fee_amount, $fee_id)
  {
    $sql = "UPDATE fee SET fee_amount = ? WHERE fee_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $fee_amount, PDO::PARAM_STR);
    $stmt->bindParam(2, $fee_id, PDO::PARAM_INT);

    $comm_updated = $stmt->execute();
    if ($comm_updated) {
      echo "<script>alert('Done');
      window.location.href = '../admin/index.php?view_fee';
      </script>";
    }
  }
  public function delete_fee($fee_id)
  {
    $sql = "DELETE FROM fee WHERE fee_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $fee_id, PDO::PARAM_INT);
    $fee_deleted = $stmt->execute();
    if ($fee_deleted) {
      echo "<script>alert('Fee Deleted Successfully');
      window.location.href = '../admin/index.php?view_fee';      
      </script>";
    }
  }
}

?>