<?php
    require_once("header02.php");

    // Initialisation des variables de session
    if(!isset($_SESSION['user'])) $_SESSION['user'] = null;
    if(!isset($_SESSION['nb_coups'])) $_SESSION['nb_coups'] = 3;

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $sql_requete = "SELECT *
                    FROM promotion";
    $stmt = $pdo->query($sql_requete);
    $promotions = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="./css/game.css">
        <link rel="icon" href="../logos/logo-png.png" type="image/icon">
        <title>La roue de la fortune - UniShop</title>
    </head>

    <body>
        <br>
        <h1 id="title">La roue de la fortune</h1>
        <p id="description">
            ! Tournez la roue pour gagner une promotion !
            <br>
            ! Vous avez 3 chances pour gagner une promotion !
        </p>
        <?php
            if(isset($_SESSION['user'])){
                echo "<p id='nb_coups'>Nombre de coups restants : " . $_SESSION['nb_coups'] ."</p>";
            }
        ?>

        <section class="affichage_jeu">
            <div id="point"></div>
            <?php
                if(count($promotions) > 2){
                    echo "<div class='pointer'></div>";
                    echo "<div class='wheel' id='wheel'>";
                        ?>
                        <div class="winning_segment" id="one">Gagnant</div>
                        <div class="segment" id="two">Perdant</div>
                        <div class="winning_segment" id="three">Gagnant</div>
                        <div class="segment" id="four">Perdant</div>
                        <div class="winning_segment" id="five">Gagnant</div>
                        <div class="segment" id="six">Perdant</div>
                        <div class="winning_segment" id="seven">Gagnant</div>
                        <div class="segment" id="eight">Perdant</div>
                        <?php
                    echo "</div>";
                    ?>
                    <button id="spin">Jouer</button>
                    <div id="result"></div>
                    <?php
                }
                else{
                    echo "<p class='no_promotion'>Aucune promotion n'est disponible pour le moment. Revener un autre jour !</p>";
                }
            ?>
        </section>

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