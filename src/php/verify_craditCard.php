<?php
    function verif_card($cardName, $cardNumber, $cardDate, $cardCVV) {

        if (empty($cardName) || empty($cardNumber) || empty($cardDate) || empty($cardCVV)) {
            return -1;
        }

        if (strlen($cardName) < 3 || strlen($cardName) > 50) {
            return -1;
        }

        list($month, $year) = explode("/", $cardDate);  
        $month = (int)$month;
        $year = (int)$year;
        $current_Month = date('n');
        $current_Year = date('y');
        if ($year < $current_Year || ($year == $current_Year && $month < $current_Month)) {
            return -3;
        }

        if (strlen($cardNumber) < 18) {
            return -2;
        }
        if (strlen($cardCVV) < 3) {
            return -4;
        }

        $currentDate = date('Y-m-d');

        // Gérer le problème de l'adresse de livraison + telephone + liste produits
        $sql_request = "INSERT INTO commande (dateAchat, cardNumber, cardDate, cardCVV) VALUES ('$currentDate', '$cardNumber', '$cardDate', '$cardCVV')";

        // Il faut supprimes les produits de la table panier

        unset($_SESSION['total']);
    } 



    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payment_button'])) {
        $paymentMethod = $_POST['selectedPaymentMethod'] ?? 'creditCard';
    
        switch ($paymentMethod) {
            case 'applePay':
                header('Location: paiementConfirme.php');
                break;
    
            case 'googlePay':
                header('Location: paiementConfirme.php');
                break;
    
            case 'paypal':
                header('Location: paiementConfirme.php');
                break;
    
            case 'creditCard':
            default:
                $payment_error = verif_card($_POST['cardName'], $_POST['cardNumber'], $_POST['cardDate'], $_POST['cardCVV']);
                break;
        }
    }
?>
