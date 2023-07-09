<?php
session_start();

try {
    $db = new PDO(
        "mysql:host=localhost;dbname=cookfusion",
        "root",
        "root",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Vérifier si les champs sont vides
    if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
        // Rediriger avec un message d'erreur
        header("Location: profile.php?error=empty_fields");
        exit();
    }

    // Vérifier si le nouveau mot de passe correspond à la confirmation
    if ($newPassword !== $confirmPassword) {
        // Rediriger avec un message d'erreur
        header("Location: profile.php?error=password_mismatch");
        exit();
    }

    // Vérifier si le mot de passe actuel correspond à celui de l'utilisateur
    $userId = $_SESSION['user_id'];

    $query = "SELECT mot_de_passe FROM client WHERE id_client = :user_id";
    $stmt = $db->prepare($query);
    $stmt->execute([
        "user_id" => $userId
    ]);
    $result = $stmt->fetch();

    if (!$result) {
        // L'utilisateur n'existe pas
        header("Location: profile.php?error=user_not_found");
        exit();
    }

    $hashedPassword = $result['mot_de_passe'];

    if (!password_verify($currentPassword, $hashedPassword)) {
        // Le mot de passe actuel est incorrect
        header("Location: profile.php?error=incorrect_password");
        exit();
    }

    // Crypter le nouveau mot de passe
    $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Mettre à jour le mot de passe de l'utilisateur dans la base de données
    $updateQuery = "UPDATE client SET mot_de_passe = :new_password WHERE id_client = :user_id";
    $updateStmt = $db->prepare($updateQuery);
    $updateStmt->execute([
        "new_password" => $newHashedPassword,
        "user_id" => $userId
    ]);

    // Rediriger avec un message de succès
    header("Location: profile.php?success=password_updated");
    exit();
} else {
    // Rediriger vers la page de profil si le formulaire n'a pas été soumis
    header("Location: profile.php");
    exit();
}
?>
