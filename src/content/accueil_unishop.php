<?php
    require_once("../connectionBDD/pdo-conn.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //Récupération des données de la table article
    $sql_requete = "SELECT p.IdProduit, p.Nom, u.Nom, p.Prix
                    FROM produit p
                    JOIN utilisateur u ON u.IdUtilisateur = p.IdUtilisateur
                    JOIN categorie c ON c.IdCategorie = p.IdCategorie";
    $stmt = $pdo->query($sql_requete);

    //Récupération des valeurs des catégories dans la BDD
    $sql = "SELECT  categorie.Nom, image.url
            FROM categorie
            JOIN image ON categorie.IdImage = image.IdImage";
    $result = $pdo->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../style/style.css">
        <link rel="icon" href="../../logos/logo-png.png" type="image/icon">
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

        <section class="affichage_produit">
            <?php
                if($stmt->rowCount() > 0){
                    while($row_count = $stmt->fetchAll()){
                        echo "<div class='produit'>";
                            echo "<p>" . htmlspecialchars($row_count['Pseudo']) . "</p>";
                            echo "<h2>" . htmlspecialchars($row_count['Nom']) . "</h2>";
                            echo "<p>" . htmlspecialchars($row_count['Prix']) . "</p>";
                        echo "</div>";
                    }
                }
                else{
                    echo "<div class='no_produit'>
                            <p>Aucun produit disponible. Revenez un prochain jour !</p>
                        </div>";
                }
            ?>

            <br>
        </section>

        <div class="title_categories">
            <h2>Explorez par catégories</h2>
        </div>
        <section class="affichage_categorie">

            <?php
                //Affichage de chaque catégorie
                if($result->rowCount() > 0){
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        echo "<div class='categorie'>";
                            echo "<img class='image_categorie' src='" . $row['url'] . "' alt='Image de la catégorie'/>";
                            echo "<p class='categories'>" . htmlspecialchars($row['Nom']) . "</p>";
                        echo "</div>";
                    }
                }
                else{
                    echo "<p class='no_categories'>Aucune catégorie disponible</p>";
                }
            ?>

        </section>

        <div class="jeu_promo">
            <p>Jouer au jeu !</p>
        </div>

        <footer>
            <div class="return_top">
                <p id="retourHaut">Retour en haut</p>
                <script src="../script/fonction.js"></script>
            </div>

            <div class="logo_langue">
                <a href="accueil_unishop.php"><img src="../../logos/logo-png.png" width="80" height="50" alt="Logo du site"></a>
                <select>
                    <option>Français</option>
                </select>
            </div>

            <div class="droits">
                <div id="liste_droits">
                    <a href="conditions.php">Conditions générales du site</a>
                    <a href="">Vos informations personnelles</a>
                </div>
                <span>© 2024, UniShop</span>
            </div>
        </footer>
    </body>
</html>