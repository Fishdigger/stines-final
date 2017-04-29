<!doctype html>
<html>
<head>
  <?php $root = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
  <?php
    $page_title = "Login";
    $page_description = "Login to this amazing app.";
    include("$root/final/templates/head.php");
  ?>
</head>
<body>

  <?php include("$root/final/templates/header.php"); ?>

  <main class="container-fluid">

    <h1 class="text-center display-3 page-title">Enter your credentials to continue</h1>

    <div class="container" id="form_div">
      <?php
        if(isset($_GET['auth'])){
          if($_GET['auth'] == 'false'){
            echo "<div class='text-danger' id='error_div'>";
              echo "<p class='text-center'>Login failed, please try again.</p>";
            echo "</div>";
          }
        }
       ?>


      <form name="login_form" id="login_form" method="POST" action="authenticate.php">
        <div class="form-group col-lg-4 col-lg-offset-4">
          <input type="text" id="username" class="form-control" name="username"
          placeholder="You@Example.com">
          <input type="password" id="password" class="form-control" name="password"
          placeholder="Password">
          <input type="submit" class="btn btn-primary form-control" name="loginBtn" value="Login"
          id="loginBtn">
        </div>
      </form>

    </div>

  </main>

</body>
<?php include("$root/final/templates/footer.php"); ?>
</html>
