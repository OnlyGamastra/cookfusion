<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Cookfusion | Inscription</title>
        <link rel="icon" type="image/png" href="../assets/img/Logo.png">
        <meta charset="utf-8">
        <meta name="language" content="fr-FR">
        <meta name="description" content="Devenez le chef de votre propre cuisine !">
        <link rel="stylesheet" type="text/css" href="../style.css"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<body>
    <?php include('../includes/header-secondpages.php'); ?>
  <div class="container signup-container">
      <br><br><br>
          <div class="login-text">
                <p>INSCRIPTION</p>
                  <br>
              </div>
          <div class="login-div">
    <form method="post" action="verif-signup.php">
        <?php
                                if (isset($_GET['message']) && !empty($_GET['message'])) {
                                	if (!isset($_GET['message2'])) {
                                		echo '<p class="signup-error">' . htmlspecialchars($_GET['message']) . '</p>';
                                	}
                                	else {
                                		echo '<p class="signup-error">' . htmlspecialchars($_GET['message']) . '<br>' . htmlspecialchars($_GET['message2']) . '</p>';
                                	}
                                }
                              ?>
      <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
      </div>
      <div class="form-group">
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>
      </div>
        <div class="form-group">
        <label for="adresse">Adresse:</label>
        <input type="text" id="adresse" name="adresse" required>
      </div>
        <div class="form-group">
        <label for="ville">Ville:</label>
        <input type="text" id="ville" name="ville" required>
      </div>
        <div class="form-group">
        <label for="code_postal">Code postal:</label>
        <input type="text" id="code_postal" name="code_postal" required>
      </div>
        <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
        <div class="form-group">
        <label for="email2">Confirmez l'email:</label>
        <input type="email" id="email2" name="email2" required>
      </div>
        <div class="form-group">
        <label for="telephone">Téléphone:</label>
        <input type="tel" id="telephone" name="telephone" required>
      </div>        
        <div class="form-group">
        <label for="date_naissance">Date de naissance:</label>
        <input type="date" id="date_naissance" name="date_naissance" required>
      </div>
      <div class="form-group">
        <label for="paiement">Moyen de paiement:</label>
        <select id="paiement" name="paiement" required>
          <option value="carte_credit">Carte de crédit</option>
          <option value="paypal">PayPal</option>
          <option value="virement">Virement bancaire</option>
        </select>
      </div>
        <div class="form-group">
        <label for="password">Mot de passe:</label>
        <input id="password" name="password" required>
      </div> 
        <div class="form-group">
        <label for="password2">Confirmez le mot de passe:</label>
        <input id="password2" name="password2" required>
      </div> 
        
        <br>
      <input type="submit" value="Créer le compte">
    </form>
  </div>
      
    </div>
    <div class="customers-content-1-demi container-fluid">
      <p id="bandeau-1-demi">Déjà un compte? <a href="login.php">Connectez vous ici.</a>
      </p>
    </div>
</body>
    <?php include('../includes/footer-secondpages.php'); ?>
</html>