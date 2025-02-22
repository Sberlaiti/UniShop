<?php 
    function get_cart($pdo) {
        $panier = [];

        $stmt = $pdo->prepare("SELECT idPanier FROM panier WHERE idUtilisateur = :idUtilisateur");
        $stmt->execute(['idUtilisateur' => $_SESSION['user']['idUtilisateur']]);
        $idPanier = $stmt->fetch();

        if(!$idPanier) {
            return $panier;
        }

        $stmt = $pdo->prepare("SELECT idProduit, quantitee FROM produitsPanier WHERE idPanier = :idPanier");
        $stmt->execute(['idPanier' => $idPanier['idPanier']]);
        $panier = $stmt->fetchAll();

        return $panier;
    }
?> 