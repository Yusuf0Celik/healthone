<?php
require_once 'dbconnectie.php';
include 'loggedInUser.php';
if (!isset($userRole) == 'admin') {
  echo "Error: Not Allowed";
} else {

  $categories = $db->prepare("SELECT * FROM `categories`");
  $categories->execute();
  $result = $categories->fetchAll(PDO::FETCH_ASSOC);

  if (isset($_POST["submit"])) {
    $productName = $_POST['productName'];
    $categorySelect = $_POST['categorySelect'];
    $productDetail = $_POST['productDetail'];
    echo $productName;
    echo $categorySelect;
    echo $productDetail;
    
    if ($productName == '' || $categorySelect == '' || $productDetail == '') {
      $statusAlert = '<div class="alert alert-warning" role="alert">Empty box</div>';
    } else {
      $users = $db->prepare("INSERT INTO products (name, image, detail, category_id) VALUES (:productName, img, :categorySelect, :productDetail)");
      $users->bindParam("productName", $productName);
      $users->bindParam("categorySelect", $categorySelect);
      $users->bindParam("productDetail", $productDetail);
      $users->execute();
      $user = $users->fetch(PDO::FETCH_ASSOC);
      $statusAlert = '<div class="alert alert-succes" role="alert">Product added!</div>';
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
      
      ?>
      <form action="" method="post">
      <div class="row my-4">
        <div class="col">
          <label for="name">Product Naam:</label>
          <input type="text" name="productName" class="form-control" placeholder="Product Naam">
        </div>
        <div class="col">
          <label for="category">Category:</label>
          <select class="form-select" name="categorySelect">
            <?php
            foreach ($result as &$data) {
            ?>
              <option value="<?php echo $data["id"] ?>" <?php if ($data["id"] == 1) echo "selected" ?>><?php echo $data["name"] ?></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col">
          <label for="detail">Beschrijving:</label>
          <textarea type="text" name="productDetail" class="form-control"></textarea>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col">
          <label for="detail">Image bij sportapparaat:</label>
          <div class="input-group mb-3">
            <input type="file" class="form-control" accept="image/jpeg, image/gif">
          </div>
        </div>
      </div>
        <button type="submit" class="btn btn-succes" name="submit">Add Product</button>
      </form>
      <?php
      echo $statusAlert;
      include_once 'components/footer.php';
      ?>
    </div>
  </body>

  </html>
<?php
}
