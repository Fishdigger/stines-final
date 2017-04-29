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
    <div class="page-title">
    <?php
      if(isset($_POST['loginBtn'])){
        include("$root/final/infrastructure/db_connector.php");
        $sql = "SELECT ID, Username, Password FROM Logins WHERE Username = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($i, $u, $p);
        if($stmt->num_rows > 0){
          while($stmt->fetch()){
            if($_POST['password'] == $p){
              header("Location: ./account.php?id=$i");
            }
          }
        }
      }
    ?>
    </div>

  </main>

  <?php include("$root/final/templates/footer.php"); ?>

</body>

</html>
