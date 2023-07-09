<?php
// Vérification des données saisies lors de l'inscription

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $codePostal = $_POST['codePostal'];
    $email = $_POST['email'];
    $confirmEmail = $_POST['confirmEmail'];
    $telephone = $_POST['telephone'];
    $dateNaissance = $_POST['dateNaissance'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Valider les données saisies
    $errors = array();

    // Valider le nom
    if (empty($nom)) {
        $errors[] = "Le champ 'Nom' est requis.";
    }

    // Valider le prénom
    if (empty($prenom)) {
        $errors[] = "Le champ 'Prénom' est requis.";
    }

    // Valider l'adresse
    if (empty($adresse)) {
        $errors[] = "Le champ 'Adresse' est requis.";
    }

    // Valider la ville
    if (empty($ville)) {
        $errors[] = "Le champ 'Ville' est requis.";
    }

    // Valider le code postal
    if (empty($codePostal)) {
        $errors[] = "Le champ 'Code Postal' est requis.";
    }

    // Valider l'email
    if (empty($email)) {
        $errors[] = "Le champ 'Adresse e-mail' est requis.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'adresse e-mail n'est pas valide.";
    }

    // Valider la confirmation de l'email
    if (empty($confirmEmail)) {
        $errors[] = "Le champ 'Confirmez votre e-mail' est requis.";
    } elseif ($email !== $confirmEmail) {
        $errors[] = "L'adresse e-mail de confirmation ne correspond pas.";
    }

    // Valider le téléphone
    if (empty($telephone)) {
        $errors[] = "Le champ 'Téléphone' est requis.";
    }

    // Valider la date de naissance
    if (empty($dateNaissance)) {
        $errors[] = "Le champ 'Date de naissance' est requis.";
    } elseif (strtotime($dateNaissance) > strtotime('today')) {
        $errors[] = "La date de naissance ne peut pas être ultérieure à la date d'aujourd'hui.";
    } elseif (strtotime($dateNaissance) > strtotime('-16 years')) {
        $errors[] = "Vous devez avoir au moins 16 ans pour vous inscrire.";
    }

    // Valider le mot de passe
    if (empty($password)) {
        $errors[] = "Le champ 'Mot de passe' est requis.";
    }

    // Valider la confirmation du mot de passe
    if (empty($confirmPassword)) {
        $errors[] = "Le champ 'Confirmez votre mot de passe' est requis.";
    } elseif ($password !== $confirmPassword) {
        $errors[] = "Le mot de passe de confirmation ne correspond pas.";
    }

    // Si des erreurs sont présentes, les afficher
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        // Toutes les données sont valides, vous pouvez maintenant effectuer le traitement supplémentaire ici, comme l'enregistrement de l'utilisateur dans la base de données.
        // Assurez-vous d'utiliser les bonnes pratiques de sécurité pour le stockage du mot de passe, comme le hachage avec une fonction de hachage sécurisée.
        // Par exemple:
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Enregistrement de l'utilisateur dans la base de données ou autre traitement nécessaire

        // Redirection vers une page de succès ou autre
        header("Location: signup_success.php");
        exit();
    }
} else {
    // Le formulaire n'a pas été soumis, rediriger vers la page d'inscription
    header("Location: signup.php");
    exit();
}
?>
