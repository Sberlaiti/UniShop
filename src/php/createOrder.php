<?php 
    function place_order($pdo, $modePaiement, $totale) {
        $dateAchat = date('Y-m-d');

        $stmt = $pdo->prepare("INSERT INTO commande (idUtilisateur, dateAchat, adresse, telephone, totale, modePaiement) 
                                VALUES (:idUtilisateur, :dateAchat, :adresse, :telephone, :totale, :modePaiement)");
        $stmt->execute([
            'idUtilisateur' => $_SESSION['user']['idUtilisateur'],
            'dateAchat' => $dateAchat,
            'adresse' => 'Adresse',
            'telephone' => '8348',
            'totale' => $totale,
            'modePaiement' => $modePaiement
        ]);

        // On récupére l'id de la commande
        $stmt = $pdo->prepare("SELECT idCommande FROM commande ORDER BY idCommande DESC LIMIT 1");
        $stmt->execute();
        $idCommande = $stmt->fetch()['idCommande'];

        // On récupére le panier de l'utilisateur
        $stmt = $pdo->prepare("SELECT * FROM panier WHERE idUtilisateur = :idUtilisateur");
        $stmt->execute(['idUtilisateur' => $_SESSION['user']['idUtilisateur']]);
        $idPanier = $stmt->fetch()['idPanier'];

        // On récupére les produits du panier
        $stmt = $pdo->prepare("SELECT * FROM produitspanier WHERE idPanier = :idPanier");
        $stmt->execute(['idPanier' => $idPanier]);
        $products = $stmt->fetchAll();

        // On ajoute les produits de la commande
        foreach ($products as $product) {
            // On récupére le prix du produit
            $stmt = $pdo->prepare("SELECT prix, prixPromotion FROM produit WHERE idProduit = :idProduit");
            $stmt->execute(['idProduit' => $product['idProduit']]);
            $prix = $stmt->fetch();

            if ($prix['prixPromotion'] != null) {
                $prixUnitaire = $prix['prixPromotion'];
            } else {
                $prixUnitaire = $prix['prix'];
            }

            $stmt = $pdo->prepare("INSERT INTO produitscommande (idProduit, idCommande, quantitee, prixUnitaire) 
                                    VALUES (:idProduit, :idCommande, :quantitee, :prixUnitaire)");
            $stmt->execute([
                'idProduit' => $product['idProduit'],
                'idCommande' => $idCommande,
                'quantitee' => $product['quantitee'],
                'prixUnitaire' => $prixUnitaire
            ]);
        }

        // On supprime le panier
        $stmt = $pdo->prepare("DELETE FROM panier WHERE idPanier = :idPanier");
        $stmt->execute(['idPanier' => $idPanier]);

    }

?>