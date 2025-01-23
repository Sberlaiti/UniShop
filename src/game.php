<?php
    require_once("header02.php");

    // Initialisation des variables de session
    if(!isset($_SESSION['user'])) $_SESSION['user'] = null;

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
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

        <?php
            if (isset($_SESSION['user'])) {
                $stmt = $pdo->prepare("SELECT date_gagnantPromo, date_last_played, coupPlayed FROM utilisateur WHERE idUtilisateur = ?");
                $stmt->execute([$_SESSION['user']['idUtilisateur']]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
                if ($user) {
                    $dateGagnant = $user['date_gagnantPromo'] ? new DateTime($user['date_gagnantPromo']) : null;
                    $dateLastPlayed = $user['date_last_played'] ? new DateTime($user['date_last_played']) : null;
                    $dateActuelle = new DateTime();

                    $_SESSION['nb_coups'] = $user['coupPlayed'];
        
                    if ($dateGagnant && $dateGagnant->diff($dateActuelle)->days < 7) {
                        echo "<div class='main_section'>";
                            echo '<h1 id="title">La roue de la fortune</h1>';
                            echo "<h2 id='already'>
                                Vous avez déjà gagné une fois, attendez la semaine prochaine pour pouvoir rejouer.
                                <br>
                                Equipe UniShop.
                            </h2>";
                        echo "</div>";
                        echo "<footer>";
                            require_once("footer.php");
                        echo "</footer>";
                        exit;
                    }        
                    if ($dateLastPlayed && $dateLastPlayed->diff($dateActuelle)->days < 7 && $_SESSION['nb_coups'] <= 0) {
                        $stmtUpdate = $pdo->prepare("UPDATE utilisateur SET date_last_played = NOW() WHERE idUtilisateur = ?");
                        $stmtUpdate->execute([$_SESSION['user']['idUtilisateur']]);
                        echo "<div class='main_section'>";
                            echo '<h1 id="title">La roue de la fortune</h1>';
                            echo "<h2 id='already'>Vous avez déjà utilisé tous vos coups, attendez la semaine prochaine pour pouvoir rejouer.<br>Equipe UniShop.</h2>";
                        echo "</div>";
                        echo "<footer>";
                            require_once("footer.php");
                        echo "</footer>";
                        exit;
                    }
                }
            }
            ?>
        <h1 id="title">La roue de la fortune</h1>
        <p id="description">
            ! Tournez la roue pour gagner une promotion de -15 %!
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
            <div class='pointer'><i class="fa fa-arrow-down"></i></div>
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