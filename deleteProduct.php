<?php
require_once 'dbconnectie.php';
include 'loggedInUser.php';
if (!isset($userRole) == 'admin') {
  echo "Error: Not Allowed";
} else {
  $productID = $_GET["id"];

  $products = $db->prepare("SELECT * FROM `products` WHERE id = :id");
  $products->bindParam("id", $productID);
  $products->execute();
  $result = $products->fetch(PDO::FETCH_ASSOC);

  if (isset($_POST["submit"])) {
    $deleteProduct = $db->prepare("DELETE FROM products WHERE id = :id");
    $deleteProduct->bindParam("id", $productID);
    echo 'Post Submit werkt';
    if ($deleteProduct->execute()) {
      echo 'Delete Product werkt';
      header("./adminDashboard.php");
    }
  }
}
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Healthone</title>
  </head>

  <body>
    <div class="container p-3 my-4">
      <?php
      include_once 'components/header.php';
      include_once 'components/navbar.php';
      include_once 'components/picture.php';
      
      if(isset($statusAlert)) 
      { 
        echo "<div class='alert $statusAlert' role='alert'>$statusMessage</div>";
      } else {
        echo '';
      }
      ?>
      <div class="row gy-3 mt-3">
        <h4>Weet je zeker dat je Product "<?php echo $result["name"];?>" wilt wissen?</h4>
        <form method="POST" action="">
          <button type="submit" name="submit" class="btn btn-danger mt-5">Ja ik weet het zeker!</button>
        </form>
        </div>
      <?php
      
      include_once 'components/footer.php';
      ?>
    </div>
  </body>

  </html>