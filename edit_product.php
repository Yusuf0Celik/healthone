<?php
require_once 'dbconnectie.php';
include 'logged_in_user.php';
if (!isset($userRole) == 'admin') {
  echo "Error: Not Allowed";
} else {
  $productId = $_GET["id"];

  $products = $db->prepare("SELECT * FROM `products` WHERE id = :id");
  $products->bindParam("id", $productId);
  $products->execute();
  $productResult = $products->fetchAll(PDO::FETCH_ASSOC);

  $categories = $db->prepare("SELECT * FROM `categories`");
  $categories->execute();
  $categoriesResult = $categories->fetchAll(PDO::FETCH_ASSOC);

  foreach ($productResult as &$data) {
    $productName = $data["name"];
    $productDetail = $data["detail"];
    $productCategoryID = $data["category_id"];
  }

  if (isset($_POST["submit"])) {
    $productName = $_POST['productName'];
    $categorySelect = $_POST['categorySelect'];
    $productDetail = $_POST['productDetail'];
    $file_upload = $_FILES["file_upload"];

    $fileName = $_FILES["file_upload"]["name"];
    $fileTmpName = $_FILES["file_upload"]["tmp_name"];
    $fileSize = $_FILES["file_upload"]["size"];
    $fileError = $_FILES["file_upload"]["error"];
    $fileType = $_FILES["file_upload"]["type"];

    $fileExtension = explode(".", $fileName );
    $fileActualExtension = strtolower(end($fileExtension));
    $allowedFileExt = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($fileActualExtension, $allowedFileExt)) {
      if ($fileError === 0) {
        if ($fileSize < 500000) {
          $fileNewName = uniqid('', true) . "." . $fileActualExtension;
          $fileDir = "./img/$fileNewName";
          move_uploaded_file($fileTmpName, $fileDir);

          if ($productName == '' || $categorySelect == '' || $productDetail == '') {
            $statusAlert = 'alert-warning';
            $statusMessage = 'Velden mogen niet leeg zijn';
          } else {
            var_dump($productDetail);
            $products = $db->prepare("UPDATE products SET `name` = ':productName', `image` = ':fileDir', `detail` = ':productDetail', `category_id` = ':productCategoryID' WHERE `id` = :id");
            $products->bindParam("productName", $productName);
            $products->bindParam("fileDir", $fileDir);
            $products->bindParam("productDetail", $productDetail);
            $products->bindParam("productCategoryID", $productCategoryID);
            $products->bindParam("id", $productId);
            if ($products->execute()) {
              $statusAlert = 'alert-succes';
              $statusMessage = 'Product geupdate!';
            } else {
              $statusAlert = 'alert-danger';
              $statusMessage = 'Er is iets mis gegaan';
            }
          }
        } else {
          $statusAlert = "alert-danger";
          $statusMessage = 'Bestand moet minder dan 500kb zijn!';
        }
      } else {
        $statusAlert = "alert-danger";
        $statusMessage = 'Er is iets foutgegaan!';
      }
    } else {
      $statusAlert = 'alert-danger';
      $statusMessage = 'Bestand niet toegestaan!';
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
      <div class="row my-4">
        <?php
        if (isset($statusAlert)) {
          echo "<div class='alert $statusAlert' role='alert'>$statusMessage</div>";
        } else {
          echo '';
        }

        ?>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row my-4">
            <div class="col">
              <label for="name">Product Naam:</label>
              <input type="text" name="productName" class="form-control" value="<?php echo $productName ?>" placeholder="Product Naam">
            </div>
            <div class="col">
              <label for="category">Category:</label>
              <select class="form-select" name="categorySelect">
                <?php
                foreach ($categoriesResult as &$categoriesData) {
                ?>
                  <option value="<?php echo $categoriesData["id"] ?>" <?php if ($categoriesData["id"] == $productCategoryID) {
                    echo "selected";
                  } ?>><?php echo $categoriesData["name"] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <label for="detail">Beschrijving:</label>
              <textarea type="text" name="productDetail" class="form-control"><?php echo $productDetail ?></textarea>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <label for="detail">Image bij sportapparaat:</label>
              <div class="input-group mb-3">
                <input type="file" name="file_upload" class="form-control">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Edit Product</button>
        </form>
      </div>
      <?php
      include_once 'components/footer.php';
      ?>
    </div>
  </body>

  </html>
<?php
}
