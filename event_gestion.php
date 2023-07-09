<?php
// Inclure les fichiers nécessaires et initialiser la session
session_start();
require_once 'config.php'; // Fichier de configuration contenant les paramètres de connexion à la base de données

// Vérifier si l'utilisateur est connecté et a les autorisations nécessaires pour accéder à cette page
if (!isset($_SESSION['user_id']) || !isset($_SESSION['admin'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté ou n'a pas les autorisations nécessaires
    header("Location: login.php");
    exit();
}

// Récupérer la liste des événements depuis la base de données
$evenements = []; // Remplacer cette ligne par le code pour récupérer les événements depuis la base de données

// Traitement des actions
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    // Gérer les différentes actions ici (ex: suppression d'un événement, mise à jour des informations, etc.)
    // Vous devrez ajouter le code approprié pour gérer ces actions
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/img/Logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Devenez le chef de votre propre cuisine !">
    <title>Cook Master | Gestion des événements</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Ajoutez ici d'autres liens vers les fichiers CSS ou bibliothèques nécessaires -->
</head>

<body>
    <?php include('includes/header-admin.php'); ?>

    <main class="admin-main">
        <h1>Gestion des événements</h1>

        <!-- Afficher la liste des événements -->
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Date</th>
                    <th>Lieu</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($evenements as $evenement) : ?>
                    <tr>
                        <td><?php echo $evenement['nom']; ?></td>
                        <td><?php echo $evenement['date']; ?></td>
                        <td><?php echo $evenement['lieu']; ?></td>
                        <td>
                            <a href="edit-evenement.php?id=<?php echo $evenement['id']; ?>">Modifier</a>
                            <a href="delete-evenement.php?id=<?php echo $evenement['id']; ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <?php include('includes/footer-admin.php'); ?>
</body>

</html>
