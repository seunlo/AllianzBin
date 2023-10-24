<?php
require_once "Db.php";

class Category extends Db
{

  public function add_category($cat_name)
  {
    //check if email is in db before
    $sql = "SELECT * FROM category WHERE cat_name = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $cat_name, PDO::PARAM_STR);
    $stmt->execute();
    $category_count = $stmt->rowCount();
    //if $category_count is greater than zero it means the category already exist in the db
    if ($category_count > 0) {
      echo "<script>alert('This category is already registered')</script>";
      exit();
    } else {

      //category does not exist to get to this line, so insert into db
      $sql = "INSERT INTO category(cat_name) VALUES(?)";
      $stmt = $this->connect()->prepare($sql);
      $stmt->bindParam(1, $cat_name, PDO::PARAM_STR);
      $stmt->execute();
      echo "<script>alert('Category added successfully')</script>";
    }
  }

  public function update_category($cat_name, $cat_id)
  {


    $sql = "UPDATE category SET cat_name = ? WHERE cat_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $cat_name, PDO::PARAM_STR);
    $stmt->bindParam(2, $cat_id, PDO::PARAM_INT);

    $stmt->execute();
    $category_count = $stmt->rowCount();
    if ($category_count > 0) {
      echo "<script>alert('Category Updated Successfully')</script>";
      exit();
    }


  }

  public function delete_category($cat_id)
  {



    $sql = "DELETE FROM category WHERE cat_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $cat_id, PDO::PARAM_INT);

    $stmt->execute();
    echo "<script>alert('Category Deleted Successfully')</script>";

  }

  public function get_category_detail($cat_id)
  {
    $sql = "SELECT * FROM  category WHERE cat_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindparam(1, $cat_id, PDO::PARAM_INT);
    $stmt->execute();
    $count = $stmt->rowCount(); //count how many records have the id.
    //Count < 1 means no record with that id.
    if ($count < 1) {
      return false;

    } else {
      //This mean the book exist, so we fetch it and return it
      $book = $stmt->fetch(PDO::FETCH_ASSOC);
      return $book;
    }

  }

  public function fetch_all_category()
  {
    $sql = "SELECT * FROM category";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $category = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $category;
  }

}

//$cat = new Category();
//echo $cat->add_category("Resident");
//echo $cat->update_category(1, 'ojata');
//echo $cat->delete_category(1);
// $all_cat = $cat->fetch_all_category();
// echo "<pre>";
// print_r($all_cat);
//$specific_category = $cat->get_category_detail(3);
//echo "<pre>";
//print_r($specific_category);


?>