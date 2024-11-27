<?php
    require_once("../connection/pdo-conn.php");
    //require_once("../header02.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //Récupération des données de la table article
    $sql_requete = "SELECT p.IdProduit, p.NomProduit, u.Nom, p.Prix, i.lien
                    FROM produit p
                    JOIN utilisateur u ON u.IdUtilisateur = p.IdUtilisateur
                    JOIN image i ON i.IdImage = p.IdImage";
    $stmt = $pdo->query($sql_requete);
    $produits = $stmt->fetchAll();

    //Récupération des valeurs des catégories dans la BDD
    $sql = "SELECT categorie.Nom, image.lien
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
        <script src="../js/fonction.js"></script>

        <section class="affichage_produit affichage_produit2 affichage_produit3" id="affichage_produit">
            <?php
                if(count($produits) > 0){
                    foreach($produits as $row_count){
                        echo "<div class='produit'>";
                            echo "<a href='' class='lien_produit'>";
                                echo "<img class='img_produit' src='" . $row_count['lien'] . "'/>";
                                echo "<p> Vendeur : " . htmlspecialchars($row_count['Nom']) . "</p>";
                                echo "<h2>" . htmlspecialchars($row_count['NomProduit']) . "</h2>";
                                echo "<p>" . htmlspecialchars($row_count['Prix']) . " €</p>";
                            echo "</a>";
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
                            echo "<img class='image_categorie' src='" . $row['lien'] . "' alt='Image de la catégorie'/>";
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
            </div>

            <div class="logo_langue">
                <a href="accueil_unishop.php"><img src="../../logos/logo-png.png" width="80" height="50" alt="Logo du site"></a>
                <select>
                    <option>Français</option>
                </select>
            </div>

            <div class="droits">
                <div id="liste_droits">
                    <a class="footer_lien" href="conditions.php">Conditions générales du site</a>
                    <a class="footer_lien" href="">Vos informations personnelles</a>
                </div>
                <span>© 2024, UniShop</span>
            </div>            
        </footer>
    </body>
</html>