<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cookfusion | Home</title>
        <link rel="icon" type="image/png" href="assets/img/Logo.png">
        <meta charset="utf-8">
        <meta name="language" content="fr-FR">
        <meta name="description" content="Devenez le chef de votre propre cuisine !">
        <link rel="stylesheet" type="text/css" href="style.css"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">   
    </head>
    <body>
        <?php include('includes/header-mainpages.php'); ?>
        <main>
            <div class="index-section1">
                <div class="index-section1-text col-5">
                    <h1>Cookregal</h1>
                <p class="index-p">Quel plat allez vous manger aujourd'hui?</p>
                <button>Je commande</button>
                </div>
            </div>
            <div class="index-section2">
                <div class="partenaires-div">
                    <img src="assets/img/partenaires/logo-bonduelle.png" alt="logo bonduelle" class="logo-partenaires">
                    <img src="assets/img/partenaires/logo-carrefour.png" alt="logo carrefour" class="logo-partenaires">
                    <img src="assets/img/partenaires/logo-cuisinella.png" alt="logo cuisinella" class="logo-partenaires">
                    <img src="assets/img/partenaires/logo-daucy.png" alt="logo daucy" class="logo-partenaires">
                    <img src="assets/img/partenaires/logo-grandfrais.png" alt="logo grandfrais" class="logo-partenaires">
                </div>
                <p>Partenaires Cookfusion</p>
            </div>
            <div class="index-section3">
                <div class="index-section3-text col-5">
                <h1>Cookmatos</h1>
                <p class="index-p">Comment allez vous préparer votre prochain repas?</p>
                <button>Voir les matériels</button>
                </div>
            </div>
            <div class="index-section4">
                <h2>Que nous offrent les différents abonnements?</h2>
                <img src="assets/img/abo.png" alt="table des abonnements">
            </div>
            <div class="index-section5">
                <img src="assets/img/etchebest.jpg" id="prestataire-img">
                <h3 class="index-section5-text1">Découvrez nos prestataires: Philippe Etchebest</h3>
                <br>
                <p class="index-section5-text2">Philippe Etchebest, né le 2 décembre 1966 à Soissons (Aisne), est un chef cuisinier et un animateur de télévision français.

Depuis 2015, il est juré de Top Chef (saisons 6 et suivantes), et anime les émissions Objectif Top Chef, Cauchemar en cuisine et Cauchemar à l'hôtel. </p>
            </div>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>