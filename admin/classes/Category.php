<?php
require_once "../classes/Db.php";

class Category extends Db
{

  public function add_category($cat_name)
  {
    $sql = "INSERT INTO category(cat_name) VALUES(?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $cat_name, PDO::PARAM_STR);
    $response = $stmt->execute();
    if ($response) {
      echo "<script>alert('Category Added Successfully');
      window.location.href = '../admin/index.php?view_category';      
      </script>";
    }
    echo "<script>alert('Category added successfully')</script>";
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
      echo "<script>alert('Category Updated Successfully');
      window.location.href = '../admin/index.php?view_category';             
      </script>";
    }


  }

  public function delete_category($cat_id)
  {



    $sql = "DELETE FROM category WHERE cat_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $cat_id, PDO::PARAM_INT);

    $response = $stmt->execute();
    if ($response) {
      echo "<script>alert('Category Deleted Successfully');
      window.location.href = '../admin/index.php?view_category';      
      </script>";
    }
  }

  public function get_category_detail($cat_id)
  {
    $sql = "SELECT * FROM  category WHERE cat_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindparam(1, $cat_id, PDO::PARAM_INT);
    $stmt->execute();
    $cat = $stmt->fetch(PDO::FETCH_ASSOC);
    return $cat;

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