<?php
// Inclure les fichiers nécessaires et initialiser la session
session_start();
require_once 'config.php'; // Fichier de configuration contenant les paramètres de connexion à la base de données

// Vérifier si l'utilisateur est connecté et a les autorisations nécessaires pour accéder à cette page
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit();
}

// Récupérer la liste des conversations de l'utilisateur depuis la base de données
$conversations = []; // Remplacer cette ligne par le code pour récupérer les conversations depuis la base de données

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/img/Logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Devenez le chef de votre propre cuisine !">
    <title>Cook Master | Messagerie</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Ajoutez ici d'autres liens vers les fichiers CSS ou bibliothèques nécessaires -->
</head>

<body>
    <?php include('includes/header.php'); ?>

    <main class="messaging-main">
        <h1>Messagerie</h1>

        <!-- Afficher la liste des conversations -->
        <ul>
            <?php foreach ($conversations as $conversation) : ?>
                <li>
                    <a href="conversation.php?id=<?php echo $conversation['id']; ?>">
                        <?php echo $conversation['participant1'] . ' - ' . $conversation['participant2']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>

    <?php include('includes/footer.php'); ?>
</body>

</html>
