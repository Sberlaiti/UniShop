<?php 
    function place_order($pdo, $idUtilisateur, $paymentMethod, $promo) {

        $dateCommande = date('Y-m-d H:i:s');
        $stmt = $pdo->prepare("INSERT INTO commande (idUtilisateur, dateCommande, modePaiement, promo) VALUES (:idUtilisateur, :dateCommande, :adresse, :telephone, :modePaiement, :promo)");
    }


?>