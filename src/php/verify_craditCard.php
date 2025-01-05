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

        header('Location: paiementConfirme.php');
    }
?>