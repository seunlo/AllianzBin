<?php
require_once "Db.php";

class Complaint extends Db
{

  public function add_complaint($cust_id, $dept_id, $subject, $description)
  {
    $created_at = date("Y-m-d H:i:s");
    $sql = "INSERT INTO complaint(cust_id, dept_id, subject, description,created_at) VALUES(?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $cust_id, PDO::PARAM_INT);
    $stmt->bindParam(2, $dept_id, PDO::PARAM_INT);
    $stmt->bindParam(3, $subject, PDO::PARAM_STR);
    $stmt->bindParam(4, $description, PDO::PARAM_STR);
    $stmt->bindParam(5, $created_at, PDO::PARAM_STR);
    $stmt->execute();
    echo "<script>alert('Complaint added successfully')</script>";
  }

  public function get_one_complaint($cust_id)
  {
    $sql = "SELECT complaint.comp_id, complaint.subject, complaint.description,
    complaint.response, complaint.status, complaint.created_at, complaint.updated_at, customers.cust_full_name as 'Customer Name', department.dept_name as Department
    FROM complaint JOIN customers ON customers.cust_id = complaint.cust_id
    JOIN department ON department.dept_id = complaint.dept_id
    where customers.cust_id = ?
    order by complaint.created_at";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $cust_id, PDO::PARAM_INT);
    $stmt->execute();
    $complaint = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $complaint;
  }
  public function get_all_complaint()
  {
    $sql = "SELECT complaint.comp_id, complaint.subject, complaint.description,
    complaint.response, complaint.status, complaint.created_at, complaint.updated_at, customers.cust_full_name as 'Customer Name', department.dept_name as Department
    FROM complaint JOIN customers ON customers.cust_id = complaint.cust_id
    JOIN department ON department.dept_id = complaint.dept_id
    order by complaint.created_at";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $complaint = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $complaint;
  }

}



$comp = new Complaint();
//echo $comp->add_complaint(46, 2, "payment issue", "hello all, my payment is not reflecting on the portal");
//echo $gbemi->update_location(1, 'ojota');
//echo $gbemi->delete_location(5);
// $all_complaint = $comp->get_all_complaint();
// echo "<pre>";
// print_r($all_complaint);
?>