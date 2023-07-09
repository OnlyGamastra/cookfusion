<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $to = "support@cookfusion.fr";
    $subject = "Nouveau message de contact";
    $body = "Nom: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";

    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        $successMessage = "Votre message a été envoyé avec succès.";
    } else {
        $errorMessage = "Une erreur s'est produite lors de l'envoi du message.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contactez-nous | Cookfusion</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include('includes/header-mainpages.php'); ?>
    <main class="contact-main">
        <section>
            <div class="contact-section-container">
                <div class="contact-section-text">
                    <h1>Contactez-nous</h1>
                    <?php if (isset($successMessage)) { ?>
                        <p class="success-message"><?php echo $successMessage; ?></p>
                    <?php } ?>
                    <?php if (isset($errorMessage)) { ?>
                        <p class="error-message"><?php echo $errorMessage; ?></p>
                    <?php } ?>
                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                        <label for="name">Nom :</label>
                        <input type="text" id="name" name="name" required>
                        <label for="email">Email :</label>
                        <input type="email" id="email" name="email" required>
                        <label for="message">Message :</label>
                        <textarea id="message" name="message" required></textarea>
                        <button type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php include('includes/footer-mainpages.php'); ?>
</body>
</html>
