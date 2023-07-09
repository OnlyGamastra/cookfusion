<?php
session_start();

if (!isset($_SESSION['user'])) {
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Cookfusion | Espace Client</title>
        <link rel="icon" type="image/png" href="../assets/img/Logo.png">
        <meta charset="utf-8">
        <meta name="language" content="fr-FR">
        <meta name="description" content="Devenez le chef de votre propre cuisine !">
        <link rel="stylesheet" type="text/css" href="../style.css"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <?php include('../includes/header-secondpages.php'); ?>
      <main>
          <div id="space-div"></div>
          <a id="customers-content" href="../account/login.php">
          <div class="customers-content-1 container-fluid">
            <p id="connecte">Je me connecte</p>
          </div>
        </a>
          <div id="space-div"></div>
        <a id="customers-content" href="../account/signup.php">
          <div class="customers-content-2 container-fluid">
            <p id="inscrit">Je m'inscris</p>
          </div>
        </a>
          <br>
      </main>  
  </body>
  <?php include('../includes/footer-secondpages.php'); ?>
</html>
