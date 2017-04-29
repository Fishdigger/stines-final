<!doctype html>
<html>
<head>
  <?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
  <?php
    $page_title = "Account Management";
    $page_description = "Login to this amazing app.";
    include("$root/final/templates/head.php");
  ?>
</head>
<body>

  <?php include("$root/final/templates/header.php"); ?>

  <main class="container-fluid">

    <h1 class="page-title text-center display-3">Account Overview</h1>

    <?php
      if(isset($_GET['id'])){
        require("$root/final/infrastructure/data_objects/customer_do.php");
        require("$root/final/infrastructure/data_objects/user_do.php");
        require("$root/final/models/user.php");
        $cdo = new Customer_DO();
        $udo = new User_DO();
        $cust = new Customer($cdo->load($_GET['id']));
        $user = new User($udo->load($_GET['id']));

    ?>

    <table class="table">
      <thead class="thead-inverse">
        <tr>
          <th>Name</th>
          <th>Address</th>
          <th>Gender</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Username</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
            echo "<td>$cust->first_name $cust->last_name</td>";
            echo "<td>$cust->address, $cust->city, $cust->state $cust->zip</td>";
            if($cust->gender == "M"){
              echo "<td>Male</td>";
            }
            else {
              echo "<td>Female</td>";
            }
            echo "<td>(" . substr($cust->phone, 0, 3) . ")";
            echo substr($cust->phone, 3, 3) . "-" . substr($cust->phone, 6) . "</td>";
            echo "<td>$cust->email</td>";
            echo "<td>" . $user->getUsername() . "</td>";
           ?>
        </tr>
      </tbody>
    </table>

    <?php
        echo "<a class='btn btn-primary form-control' href='/final/edit_account.php?id=$cust->id'";
        echo ">Edit My Information</a>";
      }
      else {
        header("Location: ./login.php");
      }

    ?>

  </main>

</body>
<?php include("$root/final/templates/footer.php"); ?>
</html>
