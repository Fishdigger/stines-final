<?php
  $root = realpath($_SERVER["DOCUMENT_ROOT"]);
  include("$root/final/infrastructure/db_connector.php");

  class User_DO {

    public function create($arr){
      $root = realpath($_SERVER["DOCUMENT_ROOT"]);
      include("$root/final/infrastructure/db_connector.php");
      $sql = "INSERT INTO Logins (Username, Password) VALUES (?, ?);";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('ss', $arr['username'], $arr['password']);
      return $this->commit($stmt);
    }

    public function update($arr){
      $sql = "UPDATE Logins SET Username = ?, Password = ? WHERE ID = ?;";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('ssi', $arr['username'], $arr['password'], $arr['id']);
      return $this->commit($stmt);
    }

    public function getIDByUsername($u){
      $root = realpath($_SERVER["DOCUMENT_ROOT"]);
      include("$root/final/infrastructure/db_connector.php");
      $sql = "SELECT ID FROM Logins WHERE Username = ?;";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s", $u);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($i);
      if($stmt->num_rows == 1){
        while($stmt->fetch()){
          return $i;
        }
      }
    }

    public function load($id){
      $root = realpath($_SERVER["DOCUMENT_ROOT"]);
      include("$root/final/infrastructure/db_connector.php");
      $sql = "SELECT ID, Username, Password FROM Logins WHERE ID = ?;";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('i', $id);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($id, $username, $password);
      if($stmt->num_rows == 1){
        while($stmt->fetch()){
          return array('id' => $id, 'username' => $username, 'password' => $password);
        }
      }
    }

    private function commit($stmt){
      $success = $stmt->execute();
      $stmt->close();
      return $success;
    }
  }
 ?>
