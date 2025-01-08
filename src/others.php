<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once("header02.php");

    // Initialisation des variables de session
    if(!isset($_SESSION['user'])) $_SESSION['user'] = null;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="./css/others.css">
        <link rel="icon" href="../logos/logo-png.png" type="image/icon">
        <title>Autres - UniShop</title>
    </head>

    <body>
        <h1 class="title_autres">Autres</h1>
        <section class="bloc_affichage">
            <div class="bloc">
                <?php
                    if(isset($_SESSION['user']) != null){
                        ?>
                        <a class="lien_service" href="profile.php">
                            <img src="./images/profile.png" alt="Profile" class="logo_service">
                            <h3>Mon compte</h3>
                            <p>Consultez votre profil et vos informations personnelles.</p>
                        </a><?php
                    }
                    else{
                        ?>
                        <a class="lien_service" href="login.php">
                            <img src="./images/profile.png" alt="Profile" class="logo_service">
                            <h3>Mon compte</h3>
                            <p>Consultez votre profil et vos informations personnelles.</p>
                        </a>
                        <?php
                    }
                ?>
            </div>

            <div class="bloc">
               <?php
                    if($_SESSION['user'] != null){
                        ?> 
                        <a class="lien_service" href="contact.php">
                            <img src="./images/contact.png" alt="Contact" class="logo_service">
                            <h3>Prendre contact ?</h3>
                            <p>Pour prendre contact, veuillez entre ici !</p>
                        </a>
                        <?php
                    } else {
                        ?>
                        <a class="lien_service" href="login.php">
                            <img src="./images/contact.png" alt="Contact" class="logo_service">
                            <h3>Prendre contact ?</h3>
                            <p>Pour prendre contact, veuillez vous connecter !</p>
                        </a>
                        <?php
                    }
                    ?>
            </div>

            <div class="bloc">
                <a class="lien_service" href="conditions.php">
                    <img src="" alt="Contact" class="logo_service">
                    <h3>Conditions générales</h3>
                    <p>Consultez les conditions générales d'utilisation du site.</p>
                </a>
            </div>

            <div class="bloc">
                <a class="lien_service" href="informations.php">
                    <img src="" alt="Contact" class="logo_service">
                    <h3>Vos informations personnelles</h3>
                    <p>Consultez les droits sur les informations personnelles dont vous disposez.</p>
                </a>
            </div>
        </section>

        <div class="jeu_promo">
            <?php if($_SESSION['user'] != null): ?>
                <a href="game.php"><p>Jouer au jeu !</p></a>
            <?php else: ?>
                <a href="login.php"><p>Jouer au jeu !</p></a>
            <?php endif; ?>
        </div>

        <footer>
            <?php require_once("footer.php"); ?>
        </footer>
        <script src="./js/contact.js"></script>
    </body>
</html>