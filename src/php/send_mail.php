<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        // Validation et nettoyage des données
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $objet = htmlspecialchars($_POST['objet']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        $destinataire = "aunishop786@gmail.com";
        $sujet = $objet;
        $body = "Nom: " .  $nom . "\nPrénom: " . $prenom . "\nEmail: " . $email . "\n\nMessage:\n" . $message;
        $headers = "From: " . $email;

        if(mail($destinataire, $sujet, $body, $headers)){
            echo "Votre message a bien été envoyé !";
        }else{
            echo "Une erreur s'est produite lors de l'envoi du message !";
        }
    }
?>