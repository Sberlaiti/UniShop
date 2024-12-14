<?php
    require_once("header02.php");

    // Initialisation des variables de session
    if(!isset($_SESSION['user'])) $_SESSION['user'] = null;

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="./css/game.css">
        <link rel="icon" href="../logos/logo-png.png" type="image/icon">
        <title>Les jeux du moment - UniShop</title>
    </head>

    <body>
        <br>
        <h1>La roue de la fortune</h1>

        <section class="affichage_jeu">
            <div class="wheel" id="wheel">
                <div class="segment">1</div>
                <div class="segment">2</div>
                <div class="segment">3</div>
                <div class="segment">4</div>
                <div class="segment">5</div>
                <div class="segment">6</div>
                <div class="segment">7</div>
                <div class="segment">8</div>
            </div>
            <button id="spin">Jouer</button>
            <div id="result"></div>
        </section>

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
        <script src="./js/game.js"></script>
    </body>
</html>