<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/img/Logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Devenez le chef de votre propre cuisine !">
    <title>Cookfusion | Services</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <?php include('includes/header-mainpages.php'); ?>
  <main class="services-main">
      <h1 class="services-main-h1">Nos services</h1>
      <br>
        
        <section>
        <div class="services-section-container">
                <img src="assets/img/services/atelier.jpg" alt="logo" id="services-img">
            
            
                <div class="services-section-text container">
                    <h1>Ateliers de cuisine</h1>
                    <p class="services-p">Découvrez nos ateliers de cuisine animés par des chefs experts. Apprenez à préparer des plats délicieux et impressionnez vos proches.</p>
                </div>
            
            </div>
      </section>
        
        <section>
        <div class="services-section-container">
            <img src="assets/img/services/domicile.jpg" alt="logo" id="services-img">
                <div class="services-section-text container">
                    <h1>Cours à domicile</h1>
                    <p class="services-p">Profitez de cours de cuisine personnalisés dans le confort de votre domicile. Nos chefs viendront vous apprendre les meilleures recettes.</p>
                </div>
            </div>
      </section>
        
        <section>
        <div class="services-section-container">
            <img src="assets/img/services/bio.jpg" alt="logo" id="services-img">
                <div class="services-section-text container">
                    <h1>Dégustations de produits bio</h1>
                    <p class="services-p">Découvrez une sélection de produits bio lors de nos dégustations. Apprenez à reconnaître les saveurs et à apprécier les ingrédients de qualité.</p>
                </div>
            </div>
        </section>
  </main>
<?php include('includes/footer-mainpages.php'); ?>
</body>
</html>
