<?php
   include_once("myparam.inc.php");
   try {
      $conn = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE, DB_USERNAME, DB_PASSWORD);
   } catch(PDOException $e) {
      echo $e->getMessage();
   }
?>
