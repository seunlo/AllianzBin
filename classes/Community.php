<?php
require_once "Db.php";

class Alagbado extends Db
{

  public function add_location($comm_name)
  {
    //check if email is in db before
    $sql = "SELECT * FROM community WHERE comm_name = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $comm_name, PDO::PARAM_STR);
    $stmt->execute();
    $location_count = $stmt->rowCount();
    //if $location_count is greater than zero it means the email already exist in the db
    if ($location_count > 0) {
      echo "<script>alert('This location is already registered')</script>";
      exit();
    } else {

      //email does not exist to get to this line, so insert into db
      $sql = "INSERT INTO community(comm_name) VALUES(?)";
      $stmt = $this->connect()->prepare($sql);
      $stmt->bindParam(1, $comm_name, PDO::PARAM_STR);
      $stmt->execute();
      echo "<script>alert('Community added successfully')</script>";
    }
  }

  public function update_location($comm_id, $comm_name)
  {
    $sql = "SELECT * FROM community WHERE comm_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $comm_id, PDO::PARAM_INT);
    $stmt->execute();

    $pro_count = $stmt->rowCount();
    if ($pro_count < 1) { //it doesnt exist
      return false;
    } else {
      $sql = "UPDATE community SET comm_name = ? WHERE comm_id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->bindParam(1, $comm_name, PDO::PARAM_STR);
      $stmt->bindParam(2, $comm_id, PDO::PARAM_INT);

      $comm_updated = $stmt->execute();
      if ($comm_updated) {
        return true;
      } else {
        return false;
      }
    }
  }

  public function delete_location($comm_id)
  {

    $sql = "SELECT * FROM community WHERE comm_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $comm_id, PDO::PARAM_INT);
    $stmt->execute();

    $del_count = $stmt->rowCount();
    if ($del_count < 1) { //it doesnt exist
      return false;
    } else {

      $sql = "DELETE FROM community WHERE comm_id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->bindParam(1, $comm_id, PDO::PARAM_INT);

      $location_deleted = $stmt->execute();
      if ($location_deleted) {
        return true;
      } else {
        return false;
      }
    }
  }

  public function fetch_all_location()
  {
    $sql = "SELECT * FROM community";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $location = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $location;
  }

}

$gbemi = new Alagbado();
//echo $gbemi->add_location("ogba");
//echo $gbemi->update_location(1, 'ojota');
//echo $gbemi->delete_location(5);
$bola = $gbemi->fetch_all_location();
//echo "<pre>";
//print_r($bola);



//echo $bk->delete_book(12);

// $book = new Book();
// echo $book->update_book("History", "Marvis Yu", "JK publisher", "History", 1996, 3);


//fetch book details
// $book = new Book();
// $bk_detail = $book->get_book_detail(3);
// print_r($bk_detail);


//Test for fetching method for books
// $book = new Book();
// $booklist = $book->fetch_all_books();
// print_r($booklist);


//Test for adding book method for books
// $book = new Book();
// echo $book->add_book("Story time", 2, "Psamls", "Ps", "Greeting", 2019, "book.png");












?>