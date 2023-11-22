<?php
require_once "../classes/Db.php";

class Alagbado extends Db
{

  public function add_location($comm_name)
  {
    $sql = "INSERT INTO community(comm_name) VALUES(?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $comm_name, PDO::PARAM_STR);

    $response = $stmt->execute();
    if ($response) {
      echo "<script>alert('Location Added Successfully');
        window.location.href = '../admin/index.php?view_location';      
        </script>";
    }
  }

  public function update_location($comm_name, $comm_id)
  {
    $sql = "UPDATE community SET comm_name = ? WHERE comm_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $comm_name, PDO::PARAM_STR);
    $stmt->bindParam(2, $comm_id, PDO::PARAM_INT);

    $comm_updated = $stmt->execute();
    if ($comm_updated) {
      echo "<script>alert('Done');
      window.location.href = '../admin/index.php?view_location';
      </script>";
    }
  }

  public function delete_location($comm_id)
  {
    $sql = "DELETE FROM community WHERE comm_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $comm_id, PDO::PARAM_INT);

    $location_deleted = $stmt->execute();
    if ($location_deleted) {
      echo "<script>alert('Location Deleted Successfully');
      window.location.href = '../admin/index.php?view_location';      
      </script>";
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

  public function fetch_location_by_id($comm_id)
  {
    $sql = "SELECT comm_name FROM community where comm_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $comm_id, PDO::PARAM_INT);
    $stmt->execute();
    $location = $stmt->fetch(PDO::FETCH_ASSOC);
    return $location;
  }
}


$gbemi = new Alagbado();
//echo $gbemi->add_location("ogba");
//echo $gbemi->update_location(1, 'ojota');
//echo $gbemi->delete_location(13);
//$bola = $gbemi->fetch_all_location();
//echo "<pre>";
//print_r($bola);
?>