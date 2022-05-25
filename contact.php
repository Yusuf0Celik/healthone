<?php
require_once 'dbconnectie.php';
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
    echo
    '
    <h4 class="pt-4">Contact met ChielOne</h4>
    <div class="row">
      <div class="col-6">
        Wilt u meer informatie, of heeft u een vraag of suggestie, we horen graag van u!
        <form method="POST" action="/contact">
          <input type="hidden" name="form-sort" value="contact">
          <div class="row mt-3">
            <div class="col">
              <input type="text" name="name" class="form-control" required="" value="" placeholder="Uw naam">
            </div>
            <div class="col">
              <input type="email" name="email" required="" class="form-control" value="" placeholder="jan@jan.nl">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <input type="text" name="name" class="form-control" required="" value="" placeholder="0612345678">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              Laat een berichtje achter!
              <textarea name="remark" class="form-control" rows="3"></textarea>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <button type="submit" class="btn btn-outline-success">Verstuur het formulier</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-6">
        <img class="img-fluid" src="img/home-img.jpg" alt="home-img">
      </div>
    </div>
    ';
    include_once 'components/footer.php';
    ?>
  </div>
</body>

</html>