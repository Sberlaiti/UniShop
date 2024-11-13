<?php
    require_once("pdo-conn.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="./style.css">
        <link rel="icon" href="./logo-png.png" type="image/icon">
        <title>UniShop</title>
    </head>

    <body>
        <!--section>
            <select id="categorie">
                <option value="categorie-0">Toutes les catégories</option>
            </select>

            <input type="search" name="rechercher" placeholder="Rechercher un produit">
            <button type="submit">Chercher</button>
        </section-->

        <section class="affichage_article">
            <div class="article">
                <img class="img_article" src="./logo-png.png">
                <h2>Produit</h2>
                <p>user</p>
                <p>zoifhbzdihvbzhfbvuhf</p>
            </div>

            <div class="article">
                <img class="img_article" src="./logo-png.png">
                <h2>Saber</h2>
                <p>user</p>
                <p>zoifhbzdihvbzhfbvuhf</p>
            </div>

            <div class="article">
                <img class="img_article" src="./logo-png.png">
                <h2>Machin</h2>
                <p>user</p>
                <p>zoifhbzdihvbzhfbvuhf</p>
            </div>

            <br>
        </section>

        <section class="affichage_categorie">

            <?php
                //Récupération des valeurs des catégories dans la BDD
                $sql = "SELECT * FROM categorie";
                $result = $pdo->query($sql);

                //Affichage de chaque catégorie
                if($result->rowCount() > 0){
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        echo "<p class='catégories'>" . htmlspecialchars($row['Nom']) . "</p>";
                    }
                }
                else{
                    echo "<p class='catégories'>Aucune catégorie disponible</p>";
                }
            ?>

        </section>

        <div class="jeu_promo">
            <p>Jouer au jeu !</p>
        </div>

        <footer>
            <div class="return_top">
                <button onclick="retourhaut()" id="retourHaut">Retour en haut</button><!--A faire après quand on aura vu le javascript-->
                <script src="fonction.js"></script>
            </div>

            <div class="logo_langue">
                <img src="./logo-png.png" width="80" height="50">
                <select>
                    <option>Français</option>
                </select>
            </div>

            <div class="droits">
                <div id="liste_droits">
                    <a href="conditions.html">Conditions générales du site</a>
                    <a href="">Vos informations personnelles</a>
                </div>
                <span>© 2024, UniShop</span>
            </div>
        </footer>
    </body>
</html>