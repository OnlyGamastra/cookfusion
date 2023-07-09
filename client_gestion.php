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

// Récupérer la liste des clients depuis la base de données
$clients = []; // Remplacer cette ligne par le code pour récupérer les clients depuis la base de données

// Traitement des actions
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    // Gérer les différentes actions ici (ex: suppression d'un client, mise à jour des informations, etc.)
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
    <title>Cook Master | Gestion des comptes clients</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Ajoutez ici d'autres liens vers les fichiers CSS ou bibliothèques nécessaires -->
</head>

<body>
    <?php include('includes/header-admin.php'); ?>

    <main class="admin-main">
        <h1>Gestion des comptes clients</h1>

        <!-- Afficher la liste des clients -->
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client) : ?>
                    <tr>
                        <td><?php echo $client['nom']; ?></td>
                        <td><?php echo $client['prenom']; ?></td>
                        <td><?php echo $client['email']; ?></td>
                        <td>
                            <a href="edit-client.php?id=<?php echo $client['id']; ?>">Modifier</a>
                            <a href="delete-client.php?id=<?php echo $client['id']; ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <?php include('includes/footer-admin.php'); ?>
</body>

</html>
