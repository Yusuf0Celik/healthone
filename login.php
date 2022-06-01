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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>
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
      <div class="col-sm-12">
        <h4>Voer je gegevens in om in te loggen</h4>
        <form method="POST" action="/user/login">
          <input type="hidden" name="form-sort" value="login">
          <div class="row mt-3">
            <div class="form-group col-6">
              <label for="email">E-mail adres</label>
              <input type="email" required="" class="form-control" name="email" placeholder="jan@jan.nl">
            </div>
            <div class="row mt-3">
              <div class="form-group col-6">
                <label for="password">Wachtwoord</label>
                <input name="password" type="password" required="" class="form-control" placeholder="Wachtwoord">
              </div>
            </div>
          </div>
          <div class="form-group mt-3">
            <button type="submit" class="btn btn-outline-primary">Inloggen</button>
          </div>
          <div class="form-group mt-3">
            <a href="./register.php" class="">
              Nog geen account? Klik hier om je te registreren
            </a>
          </div>
        </form>
      </div>
    </div>
    <?php
    include_once 'components/footer.php';
    ?>
  </div>
</body>

</html>