<?php

  $conn = new mysqli("localhost:3306", "user1", "pass1", "ShoppingDB");
  if(mysqli_connect_errno()){
    echo "Failed to connect to database: " . mysqli_connect_error();
  }

?>
