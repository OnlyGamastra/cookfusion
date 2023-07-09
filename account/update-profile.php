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

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_email'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit();
}

$email = $_SESSION['user_email'];

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs des champs du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $code_postal = $_POST['code_postal'];
    $telephone = $_POST['telephone'];
    $date_naissance = $_POST['date_naissance'];
    $paiement = $_POST['paiement'];

    // Mettre à jour les données de l'utilisateur dans la base de données
    $updateQuery = "UPDATE client SET nom = :nom, prenom = :prenom, adresse = :adresse, ville = :ville, code_postal = :code_postal, telephone = :telephone, date_de_naissance = :date_naissance, moyen_de_paiement = :paiement WHERE email = :email";
    $updateStmt = $db->prepare($updateQuery);
    $updateStmt->execute([
        "nom" => $nom,
        "prenom" => $prenom,
        "adresse" => $adresse,
        "ville" => $ville,
        "code_postal" => $code_postal,
        "telephone" => $telephone,
        "date_naissance" => $date_naissance,
        "paiement" => $paiement,
        "email" => $email
    ]);

    // Redirection vers la page de profil avec un message de succès
    header("Location: profile.php?message=Les modifications ont été enregistrées avec succès");
    exit;
} else {
    // Redirection si le formulaire n'a pas été soumis
    header("Location: profile.php");
    exit;
}
?>
