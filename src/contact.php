<?php
    require_once("header02.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        // Validation et nettoyage des données
        $nom = htmlspecialchars(strip_tags($_POST['nom']));
        $prenom = htmlspecialchars(strip_tags($_POST['prenom']));
        $objet = htmlspecialchars(strip_tags($_POST['objet']));
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $message = htmlspecialchars(strip_tags($_POST['message']));

        if (!$email) {
            die("L'adresse email fournie est invalide.");
        }

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $objet = $_POST['objet'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $destinataire = "aunishop786@gmail.com";
        $sujet = $objet;
        $body = "Nom: $nom\nPrénom: $prenom\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: " . $email;

        if(mail($destinataire, $sujet, $body, $headers)){
            echo "Votre message a bien été envoyé !";
        }else{
            echo "Une erreur s'est produite lors de l'envoi du message !";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="./css/contact.css">
        <link rel="icon" href="../logos/logo-png.png" type="image/icon">
        <title>Prendre contact - UniShop</title>
    </head>

    <body>
        <p id="description">! Veuiller remplir ce formulaire afin de répondre à votre question dans de bonnes conditions et dans les bons délais !</p>    
        <div class="contact_container">
            <h1>Contact</h1>
            <div class="contact">
                <form action="contact.php" method="POST">
                    <div class="row">
                        <input type="text" id="nom" name="nom" required placeholder="Last name"/>

                        <input type="text" id="prenom" name="prenom" required placeholder="First name"/>
                    </div>

                    <input type="text" id="objet" name="objet" required placeholder="Title of your objetc"/>

                    <input type="email" id="email" name="email" required placeholder="Email"/>

                    <textarea id="message" name="message" required placeholder="Your message..." width="200"></textarea>

                    <button id="envoyer">Envoyer</button>
                </form>
            </div>
        </div>

        <br>

        <footer>
            <div class="return_top">
                <p id="retourHaut">Retour en haut</p>
            </div>

            <div class="logo_langue">
                <a href="index.php"><img src="../logos/logo-png.png" width="80" height="50" alt="Logo du site"></a>
                <select>
                     <option>Français</option>
                </select>
            </div>

            <div class="droits">
                <div id="liste_droits">
                    <a class="footer_lien" href="conditions.php">Conditions générales du site</a>
                    <a class="footer_lien" href="informations.php">Vos informations personnelles</a>
                </div>
                <span>© 2024, UniShop</span>
            </div>            
        </footer>
        <script src="./js/contact.js"></script>
    </body>
</html>