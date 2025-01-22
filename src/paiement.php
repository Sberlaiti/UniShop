<?php
    require_once("header02.php");
    require_once("php/paiement_Functions.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $payment_error = 1;
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payment_button'])) {
        $payment_error = verif_card($_POST['cardName'], $_POST['cardNumber'], $_POST['cardDate'], $_POST['cardCVV']);
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/paiement.css">
    <script src="https://kit.fontawesome.com/3b8e4ae998.js" crossorigin="anonymous"></script>
    <title>Paiement</title>
</head>
<body>
    <div class="container">
        <div class="container_payment">
            <h1>Paiement</h1>
            <p>Moyen de paiement</p>
            <form method="POST">
                <div class="container_paymentMethod_other">
                    <div class="paymentMethod" id="applePay" onclick="selectPaymentMethod('applePay')">
                        <i class="fa-brands fa-apple-pay"></i>
                    </div>

                    <div class="paymentMethod" id="googlePay" onclick="selectPaymentMethod('googlePay')">
                        <i class="fa-brands fa-google-pay"></i>
                    </div>

                    <div class="paymentMethod" id="paypal" onclick="selectPaymentMethod('paypal')">
                        <i class="fa-brands fa-paypal"></i>
                    </div>
                </div>

                <p>ou utilisez votre carte bleu</p>
                <div class="container_paymentMethod_card">
                    <div class="container_card">
                        <div class="card_name">
                            <label for="cardName">Nom dans la carte</label>
                            <input type="text" name="cardName" class="cardInput" placeholder="Randrianomenjanahary Andry">
                        </div>

                        <div class="card_number">
                            <label for="cardNumber">Numéro de la carte</label>
                            <input type="text" name="cardNumber" class="cardInput" placeholder="1234 5678 9101 1121" maxlength="19" inputmode="numeric" pattern="[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}">
                        </div>

                        <div class="card_date">
                            <label for="cardDate">Date d'expiration</label>
                            <input type="text" name="cardDate" class="cardInput" placeholder="MM/YY" maxlength="5" inputmode="numeric" pattern="[0-9]{2}/[0-9]{2}">
                        </div>

                        <div class="card_cvv">
                            <label for="cardCVV">CVV</label>
                            <input type="text" name="cardCVV" class="cardInput" placeholder="123" maxlength="3" inputmode="numeric" pattern="[0-9]{3}">
                        </div>
                    </div>

                    <div class="error">
                    
                        <?php if ($payment_error < 0) { ?>
                            <p class="error_message">Erreur : Les champs ne sont pas bien remplis</p>
                        <?php } ?>
                    </div>
                </div>

                <input type="hidden" id="selectedPaymentMethod" name="selectedPaymentMethod" value="creditCard">
                <hr>
                <div class="subtotal">
                    <p>Subtotal</p>
                    <p><?php 
                        if (isset($_POST['total']) && $_POST['total'] != null) {
                            $_SESSION['total'] = $_POST['total'];
                            echo $_SESSION['total'];
                        } else {
                            echo $_SESSION['total'];
                        }
                    ?></p>
                </div>
                <button id="payment_button" type="submit" name="payment_button">Payer</button>
            </form>
        </div>
    </div>
    <script src="./js/paiement.js"></script>
</body>
</html>