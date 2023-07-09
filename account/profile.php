<?php
session_start();

if (!isset($_SESSION['user'])) {
  header('location: customers.php');
  exit;
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Cookfusion | Mon Compte</title>
  <link rel="icon" type="image/png" href="../assets/img/Logo.png">
  <meta charset="utf-8">
  <meta name="language" content="fr-FR">
  <meta name="description" content="Devenez le chef de votre propre cuisine !">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <?php include('../includes/header-secondpages.php'); ?>

  <div class="container signup-container">
    <br><br><br>
    <div class="login-text">
      <p>MON COMPTE</p>
      <br>
    </div>
    <div class="login-div">
      <form method="post" action="update-profile.php">
        <!-- Champs pour les données de l'utilisateur -->
        <div class="form-group">
          <label for="nom">Nom:</label>
          <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($user['nom']); ?>" required>
        </div>
        <div class="form-group">
          <label for="prenom">Prénom:</label>
          <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($user['prenom']); ?>" required>
        </div>
        <div class="form-group">
          <label for="adresse">Adresse:</label>
          <input type="text" id="adresse" name="adresse" value="<?php echo htmlspecialchars($user['adresse']); ?>" required>
        </div>
        <div class="form-group">
          <label for="ville">Ville:</label>
          <input type="text" id="ville" name="ville" value="<?php echo htmlspecialchars($user['ville']); ?>" required>
        </div>
        <div class="form-group">
          <label for="code_postal">Code postal:</label>
          <input type="text" id="code_postal" name="code_postal" value="<?php echo htmlspecialchars($user['code_postal']); ?>" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>
        <div class="form-group">
          <label for="telephone">Téléphone:</label>
          <input type="tel" id="telephone" name="telephone" value="<?php echo htmlspecialchars($user['telephone']); ?>" required>
        </div>
        <div class="form-group">
          <label for="date_naissance">Date de naissance:</label>
          <input type="date" id="date_naissance" name="date_naissance" value="<?php echo htmlspecialchars($user['date_de_naissance']); ?>" required>
        </div>
        <div class="form-group">
          <label for="paiement">Moyen de paiement:</label>
          <input type="text" id="paiement" name="paiement" value="<?php echo htmlspecialchars($user['moyen_de_paiement']); ?>" required>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
        </div>
      </form>
      <form method="post" action="update-password.php">
        <!-- Champ pour la modification du mot de passe -->
        <div class="form-group">
          <label for="current_password">Mot de passe actuel:</label>
          <input type="password" id="current_password" name="current_password" required>
        </div>
        <div class="form-group">
          <label for="new_password">Nouveau mot de passe:</label>
          <input type="password" id="new_password" name="new_password" required>
        </div>
        <div class="form-group">
          <label for="confirm_password">Confirmer le nouveau mot de passe:</label>
          <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Modifier le mot de passe">
        </div>
      </form>
    </div>
  </div>

  <?php include('../includes/footer.php'); ?>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7f3mgYsfs2wO8KtTvogJguPIf3sBhsL2g+hnbDY5g4nfXPOD" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpMQ9zq5s1kGS+AL4z3p8zN4PO7fJI8fNaho7W2jqjo5er8KLsJvO6bH8F" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEa0kXm3gxA/gp7g6E5O5Fsnfixn" crossorigin="anonymous"></script>
</body>
</html>
