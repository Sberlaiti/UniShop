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
    } 

    require_once('createOrder.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payment_button'])) {
        $paymentMethod = $_POST['selectedPaymentMethod'] ?? 'creditCard';
    
        switch ($paymentMethod) {
            case 'applePay':
                place_order($pdo, 'applePay', $_SESSION['total']);
                header('Location: paiementConfirme.php');
                break;
    
            case 'googlePay':
                place_order($pdo, 'googlePay', $_SESSION['total']);
                header('Location: paiementConfirme.php');
                break;
    
            case 'paypal':
                place_order($pdo, 'paypal', $_SESSION['total']);
                header('Location: paiementConfirme.php');
                break;

            default:
                $payment_error = verif_card($_POST['cardName'], $_POST['cardNumber'], $_POST['cardDate'], $_POST['cardCVV']);
                break;
        }
    }
?>
