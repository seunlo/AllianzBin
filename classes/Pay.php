<?php
require_once "Db.php";
class Payment extends Db
{

    public function insert_payment($payment_refcode, $cust_id, $payment_status, $payment_amount, $payment_data,$payment_date)
    {
        $sql = "INSERT INTO payment(payment_refcode,cust_id,payment_status,payment_amount,payment_data,payment_date) VALUES(?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $payment_refcode, PDO::PARAM_STR);
        $stmt->bindParam(2, $cust_id, PDO::PARAM_INT);
        $stmt->bindParam(3, $payment_status, PDO::PARAM_STR);
        $stmt->bindParam(4, $payment_amount, PDO::PARAM_INT);
        $stmt->bindParam(5, $payment_data, PDO::PARAM_STR);
        $stmt->bindParam(6, $payment_date, PDO::PARAM_STR);

        $record_inserted = $stmt->execute();

        if ($record_inserted) {
            return true;
        } else {
            return false;
        }

    }

    public function fetch_payprod($prod_payid)
    {
        $sql = "SELECT * FROM payment WHERE  prod_payid = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $prod_payid, PDO::PARAM_INT);
        $stmt->execute();
        $invoice = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $invoice;
    }

    public function fetch_payment($user_payid)
    {
        $sql = "SELECT * FROM payments WHERE user_payid=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $user_payid, PDO::PARAM_INT);

        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    }

}


$pay1 = new Payment();
//$pay1->insert_payment("2023-09-20T08:47:18.000Z", 200000, "T273886781174619", "details", "success", 41);


?>