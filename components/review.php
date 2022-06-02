<?php
$id = $_GET['id'];
$reviews = $db->prepare("SELECT * FROM `reviews` WHERE product_id = :id");
$reviews->bindParam("id", $_GET['id']);
$reviews->execute();
$result = $reviews->fetchAll(PDO::FETCH_ASSOC);
?>
<ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home-tab" role="tab" aria-controls="home" aria-selected="false">
      Reviews
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-tab" role="tab" aria-controls="profile" aria-selected="true">
      Geef een review
    </a>
  </li>
</ul>
<div class="tab-content mt-3" id="myTabContent">
  <div class="tab-pane fade pt-3 active show" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="col-sm-12">
      <h4>Reviews</h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Persoon</th>
            <th scope="col">Datum</th>
            <th scope="col">Rating</th>
            <th scope="col">Review</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            foreach ($result as &$review) {
              ?>
              <tr>
                <td><?= $review["name"]?></td>
                <td><?= $review["date"]?></td>
                <td><?= $review["rating"]?></td>
                <td><?= $review["message"]?></td>
              </tr>
              <?php
              }
              ?>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="tab-pane fade pt-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="col-sm-12">
      <h4>Laat een review achter!</h4>
      <div class="row">
        <div class="col">
          Om een review achter te laten dien je geregistreerd en ingelogd te zijn.<br>
          Klik op een van de onderste knoppen.<br>
          <div class="btn-group" role="group" aria-label="Basic example">
            <a href="../login.php" class="btn btn-outline-success">Inloggen</a>
            <a href="../register.php" class="btn btn-outline-success">Registreren</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>