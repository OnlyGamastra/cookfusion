<?php
// Inclure les fichiers nécessaires et initialiser la session
session_start();
require_once 'config.php'; // Fichier de configuration contenant les paramètres de connexion à la base de données
require_once 'tcpdf/tcpdf.php'; // Inclure la bibliothèque TCPDF

// Vérifier si l'utilisateur est connecté et a les autorisations nécessaires pour accéder à cette page
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit();
}

// Récupérer le montant à payer depuis la session ou les paramètres de l'URL
$amount = $_SESSION['payment_amount'] ?? $_GET['amount'] ?? 0;
// Assurez-vous de valider et de sécuriser les données avant de les utiliser

// Votre clé d'API Stripe
$stripeApiKey = 'YOUR_STRIPE_API_KEY';
// Remplacez 'YOUR_STRIPE_API_KEY' par votre propre clé d'API Stripe

// Inclure la bibliothèque Stripe
require_once 'stripe-php/init.php';
\Stripe\Stripe::setApiKey($stripeApiKey);

// Traitement du paiement
$error = '';
$success = '';

if (isset($_POST['stripeToken'])) {
    try {
        // Créer une charge avec Stripe
        $charge = \Stripe\Charge::create([
            'amount' => $amount,
            'currency' => 'eur',
            'description' => 'Paiement Cook Master',
            'source' => $_POST['stripeToken'],
        ]);

        // Le paiement a réussi
        $success = 'Le paiement a été effectué avec succès.';

        // Ajoutez ici le code pour mettre à jour votre base de données avec les détails du paiement

        // Génération de la facture PDF
        $pdf = new TCPDF();
        $pdf->SetTitle('Facture Cook Master');
        $pdf->AddPage();
        // Ajoutez ici le contenu de votre facture
        // Par exemple, vous pouvez ajouter les détails du paiement, les informations du client, etc.
        $pdfContent = 'Contenu de la facture...';
        $pdf->WriteHTML($pdfContent);
        $pdf->Output('facture.pdf', 'D'); // Télécharger le fichier PDF

        // Effacer le montant de paiement de la session
        unset($_SESSION['payment_amount']);
    } catch (\Stripe\Exception\CardException $e) {
        // Une erreur s'est produite avec la carte
        $error = $e->getMessage();
    } catch (\Stripe\Exception\RateLimitException $e) {
        // Une erreur s'est produite en raison des limites de Stripe
        $error = $e->getMessage();
    } catch (\Stripe\Exception\InvalidRequestException $e) {
        // Une erreur s'est produite avec la requête
        $error = $e->getMessage();
    } catch (\Stripe\Exception\AuthenticationException $e) {
        // Une erreur d'authentification s'est produite
        $error = $e->getMessage();
    } catch (\Stripe\Exception\ApiConnectionException $e) {
        // Une erreur de connexion s'est produite
        $error = $e->getMessage();
    } catch (\Stripe\Exception\ApiErrorException $e) {
        // Une erreur s'est produite avec l'API Stripe
        $error = $e->getMessage();
    } catch (Exception $e) {
        // Une erreur inattendue s'est produite
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/img/Logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Devenez le chef de votre propre cuisine !">
    <title>Cook Master | Paiement en ligne</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Ajoutez ici d'autres liens vers les fichiers CSS ou bibliothèques nécessaires -->
</head>

<body>
    <?php include('includes/header.php'); ?>

    <main class="payment-main">
        <h1>Paiement en ligne</h1>

        <?php if (!empty($error)) : ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if (!empty($success)) : ?>
            <div class="success-message"><?php echo $success; ?></div>
        <?php else : ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="card-element">
                        Informations de carte de crédit
                    </label>
                    <div id="card-element">
                        <!-- L'élément de carte Stripe sera inséré ici -->
                    </div>
                </div>

                <button type="submit">Payer <?php echo $amount; ?> EUR</button>
            </form>
        <?php endif; ?>
    </main>

    <?php include('includes/footer.php'); ?>

    <!-- Ajoutez ici le script JavaScript pour la configuration de l'élément de carte Stripe -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('<?php echo $stripeApiKey; ?>');

        var elements = stripe.elements();
        var cardElement = elements.create('card');

        cardElement.mount('#card-element');
    </script>
</body>

</html>
