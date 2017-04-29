<?php
  $root = realpath($_SERVER["DOCUMENT_ROOT"]);
  include("$root/final/infrastructure/db_connector.php");
  include("$root/final/models/customer.php");
  class Customer_DO {

    public function create($values){
      include("$root/final/models/customer.php");
      $sql = "INSERT INTO Customers(UserID, FirstName, LastName, Address, City,
        State, Zip, Phone, Email, Gender) VALUES
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("isssssssss", $values["id"], $values["first_name"],
        $values["last_name"], $values["address"], $values["city"], $values["state"],
        $values["zip"], $values["phone"], $values["email"], $values["gender"]);
      return $this->commit($stmt);
    }

    public function update($id, $values){
      $root = realpath($_SERVER["DOCUMENT_ROOT"]);
      include("$root/final/infrastructure/db_connector.php");
      $sql = "UPDATE Customers SET FirstName = ?, LastName = ?, Address = ?,
        City = ?, State = ?, Zip = ?, Email = ?, Gender = ?, Phone = ?
        WHERE UserID = ?;";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("sssssssssi", $values["FirstName"], $values["LastName"],
      $values["Address"], $values["City"], $values["State"], $values["Zip"],
      $values["Email"], $values["Gender"], $values["Phone"], $id);
      return $this->commit($stmt);
    }

    private function commit($stmt){
      $success = $stmt->execute();
      $stmt->close();
      return $success;
    }

    public function load($id){
      $root = realpath($_SERVER["DOCUMENT_ROOT"]);
      include("$root/final/infrastructure/db_connector.php");
      $sql = "SELECT UserID, FirstName, LastName, Address, City, State, Zip, Email,
        Gender, Phone FROM Customers WHERE UserID = ?;";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('i', $id);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($id, $first_name, $last_name, $address, $city,
        $state, $zip, $email, $gender, $phone);
      if($stmt->num_rows == 1){
        while($stmt->fetch()){
          return array(
            "id" => $id,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "address" => $address,
            "city" => $city,
            "state" => $state,
            "zip" => $zip,
            "email" => $email,
            "gender" => $gender,
            "phone" => $phone
          );
        }
      }
    }

  }


 ?>
