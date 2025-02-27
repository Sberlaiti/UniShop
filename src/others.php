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
        <section class="main_bloc"> 
            <h1 class="title_autres">Autres</h1>
            
            <div class="bloc_affichage">
                <?php
                    if(isset($_SESSION['user']) != null){
                        ?>
                        <div class="bloc">
                            <a class="lien_service" href="profile.php">
                                <i class="fa-solid fa-user logo_compte"></i>
                                <h3>Mon compte</h3>
                                <p>Consultez votre profil et vos informations personnelles.</p>
                            </a>
                        </div>
                        <?php
                    }
                    else{
                        ?>
                        <div class="bloc">
                            <a class="lien_service" href="login.php">
                                <i class="fa-solid fa-user logo_compte"></i>
                                <h3>Mon compte</h3>
                                <p>Consultez votre profil et vos informations personnelles.</p>
                            </a>
                        </div>
                        <?php
                    }

                    if($_SESSION['user'] != null){
                        ?>
                        <div class="bloc">
                            <a class="lien_service" href="contact.php">
                                <img src="./images/contact.png" alt="Contact" class="logo_service">
                                <h3>Prendre contact ?</h3>
                                <p>Pour prendre contact, veuillez entre ici !</p>
                            </a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="bloc">
                            <a class="lien_service" href="login.php">
                                <img src="./images/contact.png" alt="Contact" class="logo_service">
                                <h3>Prendre contact ?</h3>
                                <p>Pour prendre contact, veuillez vous connecter !</p>
                            </a>
                        </div>
                        <?php
                    }
                ?>

                <a class="lien_service" href="conditions.php">
                    <div class="bloc">
                        <img src="./images/conditions.png" alt="Contact" class="logo">
                        <h3>Conditions générales</h3>
                        <p>Consultez les conditions générales d'utilisation du site.</p>
                    </div>
                </a>

                <a class="lien_service" href="informations.php">
                    <div class="bloc">
                        <img src="./images/conditions.png" alt="Contact" class="logo">
                        <h3>Vos informations personnelles</h3>
                        <p>Consultez les droits sur les informations personnelles dont vous disposez.</p>
                    </div>
                </a>

                <?php
                    if($_SESSION['user'] != null){
                        $requete = "SELECT estVendeur, admin FROM utilisateur WHERE idUtilisateur = ?";
                        $stmt = $pdo->prepare($requete);
                        $stmt->execute([$_SESSION['user']['idUtilisateur']]);
                        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

                        if($utilisateur['admin'] == 1 || $utilisateur['estVendeur'] == 1){
                            ?>
                            <a class="lien_service" href="creation.php">
                                <div class="bloc">
                                    <img src="../logos/logo-png.png" alt="Contact" class="logo_service">
                                    <h3>Création d'un produit</h3>
                                    <p>Rejoignez-nous et commencez à vendre vos produits dès aujourd'hui !</p>
                                </div>
                            </a>
                            <?php
                        }
                    }
                ?>
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