<?php
    session_start();
    require_once('../connection/pdo-conn.php');
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(E_ALL);

    if(!isset($_SESSION['user'])) $_SESSION['user'] = null;

    header('Content-Type: application/json');
    $input = json_decode(file_get_contents('php://input'), true);
    
    if(isset($input['codePromo']) && !empty($input['codePromo'])){
        $codePromo = htmlspecialchars($input['codePromo']);
        $userId = $_SESSION['user']['idUtilisateur'];

        try{
            $sql_requete = $pdo->prepare("INSERT INTO promotion (codePromo, coefficient, idUtilisateur) VALUES (?, 15.00, ?)");
            $sql_requete->execute([$codePromo, $userId]);
            
            //Update de la date de la dernière promotion gagnée
            $updateDate = $pdo->prepare("UPDATE utilisateur SET date_gagnantPromo = NOW(), date_last_played = NOW() WHERE idUtilisateur = ?");
            $updateDate->execute([$userId]);
            $_SESSION['date_gagnant'] = date('Y-m-d H:i:s');
            echo json_encode(['message' => 'Code promo ajouté avec succès.']);
        } catch(PDOException $e){
            echo json_encode($e->getMessage());
        }
    }
    else {
        echo json_encode(['message' => 'Vous avez déjà joué une fois, attendez la semaine prochaine pour pouvoir rejouer.']);
    }
?>