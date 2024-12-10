<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    function login($email, $password, $pdo) {
        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE mail = :mail");
        $stmt->execute(['mail' => $email]);
        $user_Data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user_Data && password_verify($password, $user_Data['password'])) {
            echo "Connection réussie";
            $_SESSION['user'] = $user_Data;
            return 0;
        }
        return -1;
    }
?>