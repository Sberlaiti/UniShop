<?php
    require_once('./connection/pdo-conn.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Initialisation des variables de session
    if(!isset($_SESSION['user'])) $_SESSION['user'] = null;
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="./css/footer.css">
    </head>

    <div class="return_top">
        <p id="retourHaut">Retour en haut</p>
    </div>

    <div class="logo_langue">
        <a href="index.php"><img src="../logos/logo-png.png" width="80" height="50" alt="Logo du site"></a>
        <select>
            <option>Français</option>
        </select>
    </div>

    <div class="bloc_paiement">
        <h3 class="title_paiement">Moyen de paiement possible avec :</h3>

        <div class="bloc_image">
            <img class="img_paiement" src="./images/logo-cb.jpg" alt="Logo des moyens de paiement">
            <img class="img_paiement" src="./images/paypal.jpg" alt="Logo des moyens de paiement">
            <img class="img_paiement" src="./images/google-pay.jpg" alt="Logo des moyens de paiement">
            <img class="img_paiement" src="./images/apple-pay.png" alt="Logo des moyens de paiement">
        </div>
    </div>

    <div class="droits">
        <div id="liste_droits">
            <a class="footer_lien" href="conditions.php">Conditions générales du site</a>
            <a class="footer_lien" href="informations.php">Vos informations personnelles</a>
            <?php
                if($_SESSION['user'] != null){
                    ?>
                    <a class="footer_lien" href="contact.php">Contact</a>
                    <?php
                } else {
                    ?>
                    <a class="footer_lien" href="login.php">Contact</a>
                    <?php
                }
            ?>
        </div>
        <p class="copyright">© 2024-2025, UniShop</p>
    </div>
</html>