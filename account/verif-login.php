<?php
session_start();

// Vérification des informations d'identification lors de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Connexion à la base de données
        $db = new PDO(
            "mysql:host=localhost;dbname=cookfusion",
            "root",
            "root",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );

        // Requête pour vérifier les informations d'identification
        $stmt = $db->prepare("SELECT * FROM client WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Informations d'identification valides, créer une session utilisateur
            $_SESSION['user'] = $user;
            // Rediriger vers profile.php si l'utilisateur est connecté
            header('Location: ../account/profile.php');
            exit;
        } else {
            // Informations d'identification invalides, rediriger vers login.php avec un message d'erreur
            header('Location: login.php?message=Identifiants incorrects. Veuillez réessayer.');
            exit;
        }
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }
}
?>
