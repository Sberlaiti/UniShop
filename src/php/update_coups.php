<?php
    session_start();
    require_once('../connection/pdo-conn.php');
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(E_ALL);

    header('Content-Type: application/json');
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['nbCoups'])) {
        $_SESSION['nb_coups'] = $input['nbCoups'];

        $userId = $_SESSION['user']['idUtilisateur'];
        $updateCoups = $pdo->prepare("UPDATE utilisateur SET coupPlayed = ? WHERE idUtilisateur = ?");
        $updateCoups->execute([$input['nbCoups'], $userId]);

        if ($_SESSION['nb_coups'] <= 0) {
            $updateDate = $pdo->prepare("UPDATE utilisateur SET date_last_played = NOW() WHERE idUtilisateur = ?");
            $updateDate->execute([$userId]);
            echo json_encode(['message' => 'Nombre de coups mis à jour', 'redirect' => true]);
        }
        else {
            echo json_encode(['message' => 'Nombre de coups mis à jour', 'redirect' => false]);
        }
    } else {
        echo json_encode(['message' => 'Invalid input']);
    }
?>