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
      if(isset($_GET['id'])){
        require("$root/infrastructure/data_objects/customer_do.php");
      }
    ?>

  </main>

</body>
<?php include("$root/final/templates/footer.php"); ?>
</html>
