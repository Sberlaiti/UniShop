<?php
    require_once("header02.php");

    // Initialisation des variables de session
    if(!isset($_SESSION['user'])) $_SESSION['user'] = null;
    if(!isset($_SESSION['nb_coups'])) $_SESSION['nb_coups'] = 3;

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    // if (!isset($_SESSION['nb_coups']) || $_SESSION['nb_coups'] <= 0) {
    //     echo json_encode(['Plus de coups disponibles. Revenez demain !']);
    //     exit;
    // }
    
    // // Mise à jour du nombre de coups restants
    // $_SESSION['nb_coups']--;
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
            <br>
            ! Lorsque vous avez gagné un code promo, appuyez sur le bouton valider pour l'enregistrer !
        </p>

        <section class="affichage_jeu">
            <?php
                if(isset($_SESSION['user'])){
                    echo "<p id='nb_coups'>Nombre de coups restants : " . $_SESSION['nb_coups'] ."</p>";
                }
            ?>
            <div id="point"></div>
            <div class='pointer'></div>
            <div class='wheel' id='wheel'>
                <div class="winning_segment" id="one">Gagnant</div>
                <div class="segment" id="two">Perdant</div>
                <div class="winning_segment" id="three">Gagnant</div>
                <div class="segment" id="four">Perdant</div>
                <div class="winning_segment" id="five">Gagnant</div>
                <div class="segment" id="six">Perdant</div>
                <div class="winning_segment" id="seven">Gagnant</div>
                <div class="segment" id="eight">Perdant</div>
            </div>
            <button id="spin">Jouer</button>
            <div id="result"></div>
        </section>

        <footer>
            <?php require_once("footer.php"); ?>           
        </footer>
        <script src="./js/game.js"></script>
    </body>
</html>