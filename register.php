<?php
  require_once 'dbconnectie.php';
  if (isset($_SERVER["submit"])) {
    $username = filter_input(INPUT_POST, "username");
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "password");

    $query = $db->prepare("INSERT INTO users (name, email, password) VALUES ($username, $email, $password)");
    if ($query->execute()) {
      echo 'gegevens opgeslagen';
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
    <div class="col-sm-12 mt-3">
      <h4>Registreer je bij ons!</h4>
      <form method="POST" action="">
        <input type="hidden" name="form-sort" value="register">
        <div class="row mt-3">
          <div class="form-group col">
            <label for="name">Wat is je naam?</label>
            <input type="text" required="" class="form-control" name="username" placeholder="Jouw volledige naam">
          </div>
          <div class="form-group col">
            <label for="email">E-mail adres</label>
            <input type="email" required="" class="form-control" name="email" placeholder="jan@jan.nl">
          </div>
        </div>
        <div class="row mt-3">
          <div class="form-group col">
            <label for="password">Wachtwoord</label>
            <input name="password" type="password" required="" class="form-control" placeholder="Wachtwoord">
          </div>
          <div class="form-group col">
            <label for="confirm_password">Herhaal je wachtwoord</label>
            <input name="confirm_password" type="password" required="" class="form-control" placeholder="Herhaal wachtwoord">
          </div>
        </div>
        <div class="form-group mt-3">
          <button type="submit" class="btn btn-outline-primary">Registreer je vandaag</button>
        </div>
        <div class="form-group mt-3">
          <a href="./login.php" class="">
            Al een account? Klik hier om in te loggen.
          </a>
        </div>
      </form>
    </div> <?php
    include_once 'components/footer.php';
    ?>
  </div>
</body>

</html>