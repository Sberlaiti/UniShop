<?php
session_start();
$user = $_SESSION['user'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../connection/pdo-conn.php');

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['function'], $data['dataID'])) {

    // On recupère l'id du panier de l'utilisateur
    $sql_requete = "SELECT idPanier FROM panier WHERE idUtilisateur = :idUtilisateur";
    $stmt = $pdo->prepare($sql_requete);
    $stmt->execute(['idUtilisateur' => $user['idUtilisateur']]);
    $idPanier = $stmt->fetch();

    switch ($data['function']) {
        case 'deleteProduct':
            $result = deleteProduct($pdo, $data['dataID'], $idPanier);
            echo json_encode($result);
            break;
        case 'updateProduct':
            $result = updateProduct($pdo, $data['dataID'], $idPanier, $data['quantity']);
            echo json_encode($result);
            break;
        default:
            echo json_encode(['error' => 'Invalid action']);
            break;
    }
} else {
    echo json_encode(['error' => 'Parametri mancanti']);
}

function deleteProduct($pdo, $idProduit, $idPanier) {
    try {
        $sql_requete = "DELETE FROM produitsPanier WHERE idProduit = :idProduit AND idPanier = :idPanier";
        $stmt = $pdo->prepare($sql_requete);
        $stmt->execute(['idProduit' => $idProduit, 'idPanier' => $idPanier['idPanier']]);
        return ['success' => true, 'message' => 'Product deleted'];
    } catch (Exception $e) {
        return ['success' => false, 'error' => $e->getMessage()];
    }
}

function updateProduct($pdo, $idProduit, $idPanier, $quantity) {
    try {
        // Verifica che la quantità non vada sotto 1
        $sql_check = "SELECT quantitee FROM produitsPanier WHERE idProduit = :idProduit AND idPanier = :idPanier";
        $stmt_check = $pdo->prepare($sql_check);
        $stmt_check->execute(['idProduit' => $idProduit, 'idPanier' => $idPanier['idPanier']]);
        $currentQuantity = $stmt_check->fetchColumn();

        if ($currentQuantity + $quantity < 1) {
            return ['success' => false, 'error' => 'La quantità non può essere inferiore a 1'];
        }

        $sql_requete = "UPDATE produitsPanier SET quantitee = quantitee + :quantitee WHERE idProduit = :idProduit AND idPanier = :idPanier";
        $stmt = $pdo->prepare($sql_requete);
        $stmt->execute(['quantitee' => $quantity, 'idProduit' => $idProduit, 'idPanier' => $idPanier['idPanier']]);
        return ['success' => true, 'message' => 'Amount modified'];
    } catch (Exception $e) {
        return ['success' => false, 'error' => $e->getMessage()];
    }
}
?>