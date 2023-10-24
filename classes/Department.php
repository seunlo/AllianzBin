<?php
require_once "Db.php";

class Department extends Db
{

  public function add_department($dept_name)
  {
    //check if department is in db before
    $sql = "SELECT * FROM department WHERE dept_name = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $dept_name, PDO::PARAM_STR);
    $stmt->execute();
    $dept_count = $stmt->rowCount();
    //if $category_count is greater than zero it means the category already exist in the db
    if ($dept_count > 0) {
      echo "<script>alert('This Department is already registered')</script>";
      exit();
    } else {

      //category does not exist to get to this line, so insert into db
      $sql = "INSERT INTO department(dept_name) VALUES(?)";
      $stmt = $this->connect()->prepare($sql);
      $stmt->bindParam(1, $dept_name, PDO::PARAM_STR);
      $stmt->execute();
      echo "<script>alert('Department added successfully')</script>";
    }
  } 

  public function delete_department($dept_id)
  {
    $sql = "DELETE FROM department WHERE dept_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $dept_id, PDO::PARAM_INT);
    $stmt->execute();
    echo "<script>alert('Department Deleted Successfully')</script>";
  }

  public function get_department($dept_id)
  {
    $sql = "SELECT * FROM  department WHERE dept_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindparam(1, $dept_id, PDO::PARAM_INT);
    $stmt->execute();
    $count = $stmt->rowCount(); //count how many records have the id.
    //Count < 1 means no record with that id.
    if ($count < 1) {
      return false;

    } else {
      //This mean the book exist, so we fetch it and return it
      $dept = $stmt->fetch(PDO::FETCH_ASSOC);
      return $dept;
    }

  }

  public function get_all_department()
  {
    $sql = "SELECT * FROM department";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $department = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $department;
  }

}

$dept = new Department();
//echo $dept->add_department("Sales");
//echo $dept->delete_department(1);

// $all_cat = $cat->fetch_all_category();
//echo "<pre>";
//$specific_dept = $dept->get_all_department();
//print_r($specific_dept);
//$specific_category = $cat->get_category_detail(3);
//echo "<pre>";
//print_r($specific_category);


?>