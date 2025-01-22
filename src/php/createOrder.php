<?php 
    function place_order($pdo, $paymentMethod, $total, $promo) {
        $dateCommande = date('Y-m-d H:i:s');
        $stmt = $pdo->prepare("INSERT INTO commande (idUtilisateur, dateAchat, adresse, telephone, idPromo, totale, modePaiement) VALUES (:idUtilisateur, :dateCommande, :adresse, :telephone, :promo, :modePaiement)");
        $stmt->execute([
            'idUtilisateur' => $_SESSION['user']['idUtilisateur'],
            'dateCommande' => $dateCommande,
            'adresse' => $_SESSION['user']['adresse'],
            'telephone' => $_SESSION['user']['telephone'],
            'promo' => $promo,
            'totale' => $total,
            'modePaiement' => $paymentMethod
        ]);
    }


?>