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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs des champs du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $code_postal = $_POST['code_postal'];
    $email = $_POST['email'];
    $email2 = $_POST['email2'];
    $telephone = $_POST['telephone'];
    $date_naissance = $_POST['date_naissance'];
    $paiement = $_POST['paiement'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // Vérifier si les mots de passe correspondent
    if ($password !== $password2) {
        // Les mots de passe ne correspondent pas
        $message = "Les mots de passe ne correspondent pas.";
        header("Location: signup.php?message=" . urlencode($message));
        exit;
    }

    // Vérifier si les emails correspondent
    if ($email !== $email2) {
        // Les emails ne correspondent pas
        $message = "Les adresses email ne correspondent pas.";
        header("Location: signup.php?message=" . urlencode($message));
        exit;
    }

    // Vérifier si l'email existe déjà dans la base de données
    $query = "SELECT id_client FROM client WHERE email = :email";
    $stmt = $db->prepare($query);
    $stmt->execute([
        "email" => $email
    ]);
    $result = $stmt->fetch();

    if ($result) {
        // L'email existe déjà dans la base de données
        $message = "Cet e-mail possède déjà un compte.";
        header("Location: signup.php?message=" . urlencode($message));
        exit();
    }

    // Crypter le mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insérer les données dans la base de données
    $insertQuery = "INSERT INTO client (nom, prenom, adresse, ville, code_postal, email, telephone, date_de_naissance, moyen_de_paiement) VALUES (:nom, :prenom, :adresse, :ville, :code_postal, :email, :telephone, :date_naissance, :paiement)";
    $insertStmt = $db->prepare($insertQuery);
    $insertStmt->execute([
        "nom" => $nom,
        "prenom" => $prenom,
        "adresse" => $adresse,
        "ville" => $ville,
        "code_postal" => $code_postal,
        "email" => $email,
        "telephone" => $telephone,
        "date_naissance" => $date_naissance,
        "paiement" => $paiement
    ]);

    // Récupérer l'ID du dernier enregistrement inséré
    $clientId = $db->lastInsertId();

    // Insérer le mot de passe crypté dans la table "mot_de_passe"
    $insertPasswordQuery = "INSERT INTO mot_de_passe (id_client, password) VALUES (:id_client, :password)";
    $insertPasswordStmt = $db->prepare($insertPasswordQuery);
    $insertPasswordStmt->execute([
        "id_client" => $clientId,
        "password" => $hashedPassword
    ]);

    // Redirection vers profile.php avec les données utilisateur
    $_SESSION['user_id'] = $clientId;
    header("Location: profile.php");
    exit;
} else {
    // Redirection si le formulaire n'a pas été soumis
    header("Location: signup.php");
    exit;
}
?>
