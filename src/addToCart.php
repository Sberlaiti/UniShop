<?php
// Connexion à la base de données
try {
    $connexion = new PDO('mysql:host=localhost;dbname=unishop', 'root', '');
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifiez si les données POST sont définies
if (isset($_POST['productId'], $_POST['quantity'], $_POST['userId'])) {
    $productId = intval($_POST['productId']);
    $quantity = intval($_POST['quantity']);
    $userId = intval($_POST['userId']);

    // Insérer les données dans la table panier
    try {
        $stmt = $connexion->prepare("
            INSERT INTO panier (quantitee, idProduit, idUtilisateur) 
            VALUES (:quantity, :productId, :userId)
        ");
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        echo json_encode(['success' => true, 'message' => 'Produit ajouté au panier.']);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'ajout au panier.', 'error' => $e->getMessage()]);
    }
} else {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Données POST manquantes.']);
}
?>
