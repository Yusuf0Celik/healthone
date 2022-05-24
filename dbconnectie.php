<?php

try {
  $dbhost = 'locahost';
  $dbname = 'healthone';
  $username = 'root';
  $password = '';

  $db = new PDO("mysql:host=localhost;dbname=healthone", "$username", "$password");
} catch (PDOException $e) {
  die ("Error!: " . $e->getMessage());
  die();
}

?>