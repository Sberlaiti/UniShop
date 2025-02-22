<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Fonction qui permet de vérifier si un email est déjà utilisé
    // Renvoi true si l'email n'est pas utilisé et false sinon
    function verif_email($email, $pdo) {
        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE mail = :email");
        $stmt->execute(['email' => $email]);
        $user_Data = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$user_Data && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    // Fonction qui permet de vérifier si un pseudo est déjà utilisé
    // Renvoi true si le pseudo n'est pas utilisé et false sinon
    function verif_pseudo($pseudo, $pdo) {
        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo");
        $stmt->execute(['pseudo' => $pseudo]);
        $user_Data = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$user_Data) {
            return true;
        }
        return false;
    }

    // Fonction qui permet de créer un utilisateur
    // Renvoi les informations de l'utilisateur si la création a réussi et une erruer sinon
    function createUser($lastname, $firstname, $email, $password, $pseudo, $pdo) {
        if (!verif_email($email, $pdo) || !verif_pseudo($pseudo, $pdo)) {
            return -1; // - 1 si l'email est déjà utilisé ou invalide ou pseudo déjà utilisé
        } else {
            $stmt = $pdo->prepare("INSERT INTO utilisateur (nom, prenom, pseudo, mail, password) VALUES (:nom, :prenom, :pseudo, :email, :password)");
            $stmt->execute(['nom' => $lastname, 'prenom' => $firstname, 'pseudo' => $pseudo, 'email' => $email, 'password'=> $password]);

            // À chaque fois qu'on crée un utilisateur, on crée un panier pour cet utilisateur
            $stmt = $pdo->prepare("INSERT INTO panier (idUtilisateur) VALUES (:idUtilisateur)");
            $stmt->execute(['idUtilisateur' => $pdo->lastInsertId()]);

            return 1; // 1 si la création a réussi
        }
    }

?>