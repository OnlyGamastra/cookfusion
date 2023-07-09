<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Cookfusion | Connexion</title>
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
    <div id="space-div"></div>
          <div id="space-div"></div>
          <div class="login-text">
                <p>CONNEXION</p>
                  <br>
              </div>
          <div class="login-div">
              
          
      <form class="login-form" action="verif-login.php" method="post">
        <input class="login-input" type="email" name="email" placeholder="Email" value="<?= isset($_COOKIE['email']) ? $_COOKIE['email'] : '' ?>" required>
        <br>
        <input class="login-input" type="password" name="password" placeholder="Mot de passe" value="<?= isset($_COOKIE['password']) ? $_COOKIE['password'] : '' ?>" required>
        <br>
          <br>
        <input class="login-submit" type="submit" value="Se connecter">
          
          <?php
    if(isset($_GET['message']) && !empty($_GET['message'])){
        echo '<p class="signup-error">' . htmlspecialchars($_GET['message']) . '</p>';
            }?>

      </form>
              </div>
          <br>
    <div class="customers-content-1-demi container-fluid">
      <p id="bandeau-1-demi">Pas encore de compte? <a href="signup.php">Rejoignez nous ici.</a>
      </p>
    </div>
    <div id="space-div"></div>
          <div id="space-div"></div>
          <div id="space-div"></div>
      </main>  
  </body>
  <?php include('../includes/footer-secondpages.php'); ?>
</html>