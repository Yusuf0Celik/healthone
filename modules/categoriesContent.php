<?php 

$categories = $db->prepare("SELECT * FROM `category`");
$categories->execute();
?>
<div class="row gy-3 mt-3">
  <?php
    foreach ($categories as $category) {
      echo 
      "
      <div class='col-sm-4 col-md-3'>
        <div class='card'>
          <div class='card-body text-center'>
            <a href='categories?id=" . $category['id'] ."'>
              <img class='product-img img-fluid center-block' src='" . $category['image'] . "'>
            </a>
          <div class='card-title mb-3'>" . $category['name'] . "</div>
          </div>
        </div>
      </div>
      ";
    }
  ?>
</div>