<!doctype html>
<html>
<head>
  <?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
  <?php
    $page_title = "Register Account";
    $page_description = "Login to this amazing app.";
    include("$root/final/templates/head.php");
  ?>
</head>
<body>

  <?php include("$root/final/templates/header.php"); ?>

  <main class="container-fluid">

    <h1 class="text-center display-3 page-title">Create New Account</h1>

    <div class="container-fluid">
      <?php if(!isset($_POST['register'])){?>
      <form name="new_account" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" name="email" id="email"
          placeholder="Email Address">
          <input type="password" class="form-control" name="password" id="password"
          placeholder="Password">
          <input type="password" id="conf_password" class="form-control"
          placeholder="Confirm Password">
        </div>
        <div class="form-group">
          <input type="text" name="first_name" id="first_name" class="form-control"
          placeholder="First Name">
          <input type="text" name="last_name" id="last_name" class="form-control"
          placeholder="Last Name">
          <input type="text" name="phone" id="phone" class="form-control"
          placeholder="Phone ex: 5551234567">
        </div>
        <div class="form-check form-group">
          <label class="form-check-label">
            <input type="radio" name="gender" id="gender_m" value="M">
            Male
          </label>
          <label class="form-check-label">
            <input type="radio" name="gender" id="gender_f" value="F">
            Female
          </label>
        </div>
        <div class="form-group">
          <input type="text" name="address" id="address" class="form-control"
          placeholder="Street Address">
          <input type="text" name="city" id="city" class="form-control"
          placeholder="City">
          <input type="text" name="state" id="state" class="form-control"
          placeholder="State">
          <input type="text" name="zip" id="zip" class="form-control"
          placeholder="Zip Code">
        </div>
        <input type="submit" class="btn btn-primary form-control" name="register"
        id="register" value="Register New Account">
      </form>

    </div>

    <?php }
      if(isset($_POST['register'])){
        include("$root/final/models/customer.php");
        require("$root/final/models/user.php");
        $thisUser = new User(array(
          "username" => $_POST["email"],
          "password" => $_POST["password"]
        ));
        echo $thisUser->create();
        $thisCustomer = new Customer(array(
          "id" => $thisUser->getID(),
          "first_name" => $_POST["first_name"],
          "last_name" => $_POST["last_name"],
          "address" => $_POST["address"],
          "city" => $_POST["city"],
          "state" => $_POST["state"],
          "zip" => $_POST["zip"],
          "email" => $thisUser->getUsername(),
          "gender" => $_POST["gender"],
          "phone" => $_POST["phone"]
        ));
        echo $thisCustomer->id;
      }
     ?>

  </main>

</body>
<?php include("$root/final/templates/footer.php"); ?>
</html>
