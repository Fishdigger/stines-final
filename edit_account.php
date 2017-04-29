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

    <h1 class="text-center display-3 page-title">Edit Account Details</h1>

    <?php
      require("$root/final/infrastructure/data_objects/customer_do.php");
      if(isset($_GET['id'])){
        $cdo = new Customer_DO();
        $cust = new Customer($cdo->load($_GET['id']));
    ?>
    <div class="container-fluid">
      <form name="edit_account" method="POST">
        <input type="hidden" name="id" id="id" value='<?php echo $cust->id;?>'>
        <div class="row form-group">
          <input type="text" name="first_name" id="first_name" class="form-control"
          value='<?php echo $cust->first_name; ?>' placeholder="First Name">
          <input type="text" name="last_name" id="last_name" class="form-control"
          value='<?php echo $cust->last_name; ?>' placeholder="Last Name">
        </div>
        <div class="row form-check">
          <label class="form-check-label">
            <input type="radio" name="gender" id="gender_m" value="M"
            <?php if($cust->gender == "M") {echo "checked";} ?>>
            Male
          </label>
          <label class="form-check-label">
            <input type="radio" name="gender" id="gender_f" value="F"
            <?php if($cust->gender == "F") {echo "checked";}?>>
            Female
          </label>
        </div>
        <div class="row form-group">
          <input type="text" name="address" id="address" class="form-control"
          value='<?php echo $cust->address; ?>' placeholder="Address">
          <input type="text" name="city" id="city" class="form-control"
          value='<?php echo $cust->city; ?>' placeholder="City">
          <input type="text" name="state" id="state" class="form-control"
          value='<?php echo $cust->state;?>' placeholder="State">
          <input type="text" name="zip" id="zip" class="form-control"
          value='<?php echo $cust->zip;?>' placeholder="Zip Code">
        </div>
        <div class="row form-group">
          <input type="email" name="email" id="email" class="form-control"
          value='<?php echo $cust->email;?>' placeholder="Email">
          <input type="text" name="phone" id="phone" class="form-control"
          value='<?php echo $cust->phone;?>' placeholder="Phone Number ex: 5551234567">
        </div>
        <div class="row form-group">
          <input type="submit" name="edit_complete" id="edit_complete" class="btn btn-primary form-control"
          value="Submit Changes">
        </div>
      </form>
    </div>
    <?php
      }
      if(isset($_POST['edit_complete'])){
        $cdo = new Customer_DO();
        $cust_array = array(
          "FirstName" => $_POST['first_name'],
          "LastName" => $_POST['last_name'],
          "Address" => $_POST['address'],
          "City" => $_POST['city'],
          "State" => $_POST['state'],
          "Zip" => $_POST['zip'],
          "Email" => $_POST['email'],
          "Gender" => $_POST['gender'],
          "Phone" => $_POST['phone']
        );
        $good = $cdo->update($_POST['id'], $cust_array);
        if($good == True){
          header("Location: ./account.php?id=".$_POST['id']);
        }
        else {
          echo "<p class='text-danger text-center'>Error updating account... Please try again later.</p>";
        }
      }
    ?>

  </main>

</body>
<?php include("$root/final/templates/footer.php"); ?>
</html>
