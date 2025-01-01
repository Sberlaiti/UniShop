<?php
    require_once("header02.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
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
        <p id="description">! Veuiller remplir ce formulaire afin de répondre à votre question dans de bonnes conditions et dans les meilleurs délais !</p>    
        <div class="contact_container">
            <h1 class="title">Contact</h1>
            <div class="contact">
                <form action="./php/send_mail.php" method="POST">
                    <div class="row">
                        <input type="text" id="nom" name="nom" required placeholder="Last name"/>
                        <input type="text" id="prenom" name="prenom" required placeholder="First name"/>
                    </div>

                    <input type="text" id="objet" name="objet" required placeholder="Title of your object"/>

                    <input type="email" id="email" name="email" required placeholder="Email"/>

                    <textarea id="message" name="message" required placeholder="Your message..."></textarea>

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