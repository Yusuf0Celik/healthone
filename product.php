<?php
require_once 'dbconnectie.php';
$id = $_GET['id'];
$products = $db->prepare("SELECT * FROM `products` WHERE id = $id");
$products->execute();

foreach ($products as $product) {
  $productName = $product["name"];
  $productImage = $product["image"];
  $productDetail = $product["detail"];
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
    ?>
    <div class="row gy-3 mt-3">
      <div class="col-sm-4 col-md-3">
        <div class="card">
          <div class="card-body text-center">
            <img class="product-img img-fluid center-block" src="<?php echo $productImage ?>" alt="Roeitrainer">
            <div class="card-title mb-3"><?php echo $productName ?></div>
          </div>
        </div>
      </div>
      <div class="col-sm-8 col-md-9">
        <div class="card description-card">
          <div class="card-head text-center p-3">
            <h4><?php echo $productName ?></h4>
          </div>
          <div class="card-body">
            <h5>Omschrijving:</h5>
            <?php echo $productDetail ?>
          </div>
        </div>
      </div>
    </div>
    <?php
    include_once 'components/review_tab.php';
    include_once 'components/review.php';
    include_once 'components/footer.php';
    ?>
</div>
</body>
</html>