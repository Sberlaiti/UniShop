<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Fonction qui permet de créer un utilisateur
    // Renvoi les informations de l'utilisateur si la création a réussi et une erruer sinon
    function createUser($name, $firstname, $email, $password, $pseudo, $pdo) {
        if (!verif_email($email, $pdo)) {
            return -1; // - 1 si l'email est déjà utilisé
        } else if (!verif_pseudo($pseudo, $pdo)) {
            return -2; // -2 si le pseudo est déjà utilisé
        } else {
            $stmt = $pdo->prepare("INSERT INTO utilisateur (Nom, Prenom, Mail, Password, pseudo) VALUES (:nom, :prenom, :email, :password, :pseudo)");
            $stmt->execute(['nom' => $name, 'prenom' => $firstname, 'email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT), 'pseudo' => $pseudo]);
            return 1; // 1 si la création a réussi
        }
    }

    // Fonction qui permet de vérifier si un email est déjà utilisé
    // Renvoi true si l'email n'est pas utilisé et false sinon
    function verif_email($email, $pdo) {
        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE Mail = :email");
        $stmt->execute(['email' => $email]);
        $user_Data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user_Data) {
            return false;
        }
        return true;
    }

    // Fonction qui permet de vérifier si un pseudo est déjà utilisé
    // Renvoi true si le pseudo n'est pas utilisé et false sinon
    function verif_pseudo($pseudo, $pdo) {
        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE Pseudo = :pseudo");
        $stmt->execute(['pseudo' => $pseudo]);
        $user_Data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user_Data) {
            return false;
        }
        return true;
    }

?>