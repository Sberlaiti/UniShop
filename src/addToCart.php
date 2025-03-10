<?php
    try {
        $connexion = new PDO('mysql:host=localhost;dbname=unishop', 'root', '');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }

    if (isset($_POST['productId'], $_POST['quantity'], $_POST['userId'], $_POST['cartId'])) {
        $productId = intval($_POST['productId']);
        $quantity = intval($_POST['quantity']);
        $userId = intval($_POST['userId']);
        $cartId = intval($_POST['cartId']);

        try {
            $queryPanier = $connexion->prepare("
                SELECT idPanier FROM panier WHERE idPanier = :idPanier
            ");
            $queryPanier->bindParam(':idPanier', $cartId, PDO::PARAM_INT);
            $queryPanier->execute();
            $existingCart = $queryPanier->fetch(PDO::FETCH_ASSOC);

            if (!$existingCart) {
                $stmtPanier = $connexion->prepare("
                    INSERT INTO panier (idPanier, idUtilisateur)
                    VALUES (:idPanier, :userId)
                ");
                $stmtPanier->bindParam(':idPanier', $cartId, PDO::PARAM_INT);
                $stmtPanier->bindParam(':userId', $userId, PDO::PARAM_INT);
                $stmtPanier->execute();
            }

            $queryProduit = $connexion->prepare("
                SELECT quantitee FROM produitspanier 
                WHERE idProduit = :idProduit AND idPanier = :idPanier
            ");
            $queryProduit->bindParam(':idProduit', $productId, PDO::PARAM_INT);
            $queryProduit->bindParam(':idPanier', $cartId, PDO::PARAM_INT);
            $queryProduit->execute();
            $existingProduct = $queryProduit->fetch(PDO::FETCH_ASSOC);

            if ($existingProduct) {
                $existingQuantity = intval($existingProduct['quantitee']);
                if ($quantity > $existingQuantity) {
                    $updateProduit = $connexion->prepare("
                        UPDATE produitspanier
                        SET quantitee = :quantitee
                        WHERE idProduit = :idProduit AND idPanier = :idPanier
                    ");
                    $updateProduit->bindParam(':quantitee', $quantity, PDO::PARAM_INT);
                    $updateProduit->bindParam(':idProduit', $productId, PDO::PARAM_INT);
                    $updateProduit->bindParam(':idPanier', $cartId, PDO::PARAM_INT);
                    $updateProduit->execute();
                }
            } else {
                $insertProduit = $connexion->prepare("
                    INSERT INTO produitspanier (idProduit, idPanier, quantitee)
                    VALUES (:idProduit, :idPanier, :quantitee)
                ");
                $insertProduit->bindParam(':idProduit', $productId, PDO::PARAM_INT);
                $insertProduit->bindParam(':idPanier', $cartId, PDO::PARAM_INT);
                $insertProduit->bindParam(':quantitee', $quantity, PDO::PARAM_INT);
                $insertProduit->execute();
            }

            echo json_encode(['success' => true, 'message' => 'Produit ajouté ou mis à jour dans le panier.']);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Paramètres manquants.']);
    }
?>
