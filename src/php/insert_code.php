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
        $userId = $_SESSION['user'];

        try{
            $sql_requete = $pdo->prepare("INSERT INTO promotion (codePromo, idUtilisateur) VALUES (?, ?)");
            $sql_requete->execute([$codePromo, $userId]);
        } catch(PDOException $e){
            echo json_encode(['message' => 'Erreur lors de l\'ajout du code promo.']);
        }
    }
    else {
        echo json_encode(['message' => 'Veuillez renseigner un code promo.']);
    }
?>