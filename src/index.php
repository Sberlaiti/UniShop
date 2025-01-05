<?php
    require_once("header02.php");

    // Initialisation des variables de session
    if(!isset($_SESSION['user'])) $_SESSION['user'] = null;

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //Récupération des données de la table article
    $sql_requete = "SELECT p.idProduit, p.nomProduit, u.nom, p.prix, i.lien
                    FROM produit p
                    JOIN utilisateur u ON u.idUtilisateur = p.idUtilisateur
                    JOIN image i ON i.idImage = p.idImage";
    $stmt = $pdo->query($sql_requete);
    $produits = $stmt->fetchAll();

    //Récupération des valeurs des catégories dans la BDD
    $sql = "SELECT categorie.nomCategorie, image.lien, categorie.idCategorie
            FROM categorie
            JOIN image ON categorie.idImage = image.idImage
            ORDER BY categorie.nomCategorie";
    $result = $pdo->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="./css/index.css">
        <link rel="icon" href="../logos/logo-png.png" type="image/icon">
        <title>UniShop</title>
    </head>

    <body>
        <br>

        <div class="title_categories">
            <h2>Les derniers produits</h2>
        </div>
        <section class="affichage_produit affichage_produit2 affichage_produit3" id="affichage_produit">
            <?php
                $maxProduits = 6;
                $produitsAffiches = 0;

                if(count($produits) > 0){
                    foreach($produits as $row_count){
                        if($produitsAffiches < $maxProduits){              
                            echo "<div class='produit'>";
                                echo "<a href='pageArticle.php?idProduit=". $row_count['idProduit'] . "' id='lien_produit'>";
                                    echo "<img class='img_produit' src='" . htmlspecialchars($row_count['lien']) . "'/>";
                                    echo "<p class='titre_vendeur'> Vendeur : " . htmlspecialchars($row_count['nom']) . "</p>";
                                    echo "<h3 class'titre_produit'>" . htmlspecialchars($row_count['nomProduit']) . "</h3>";
                                    echo "<p class='prix_produit'>" . htmlspecialchars($row_count['prix']) . " €</p>";
                                echo "</a>";
                            echo "</div>";
                            $produitsAffiches++;
                        }
                    }
                    if(count($produits) > $maxProduits){
                        echo "<div class='voir_plus'><a href='produits.php'>Voir plus</a></div>";
                    }
                } else {
                    echo "<div class='no_produit'>
                            <p>Aucun produit disponible. Revenez un prochain jour !</p>
                        </div>";
                }
            ?>
        </section>

        <br>

        <div class="title_categories">
            <h2>! Jouer aux jeux pour avoir un code de réduction !</h2>
        </div>
        <section class="affichage_externe">
            <?php
                if($_SESSION['user']!=null){
                    ?>
                    <div class="jeu">
                        <a href="game.php">
                            <img class="img_jeu" src="./images/roue_fortune.jpg" alt="Image du jeu"/>
                            <p>Roue de la fortune</p>
                        </a>
                    </div>
                    <?php
                }
                else{
                    echo '<div class="jeu">
                            <a href="login.php">
                                <img class="img_jeu" src="./images/roue_fortune.jpg" alt="Image du jeu"/>
                                <p>Roue de la fortune</p>
                            </a>
                        </div>';
                }
            ?>
        </section>

        <br>

        <div class="title_categories">
            <h2>Explorez par catégories</h2>
        </div>
        <section class="affichage_categorie">
            
            <?php
                //Affichage de chaque catégorie avec défilement
                if($result->rowCount() > 8){
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        echo "<div class='categorie'>";
                            echo "<a href='produits.php?idCategorie=" . $row['idCategorie'] . "' class='lien_produit'>";
                                echo "<img class='image_categorie' src='" . $row['lien'] . "' alt='Image de la catégorie'/>";
                                echo "<p class='categories'>" . htmlspecialchars($row['nomCategorie']) . "</p>";
                            echo "</a>";
                        echo "</div>";
                    }
                }
                //Affichage de chaque catégorie sans défilement
                else if($result->rowCount() > 0){
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        echo "<div class='categorie'>";
                            echo "<a href='produits.php?idCategorie=" . $row['idCategorie'] . "' class='lien_produit'>";
                                echo "<img class='image_categorie' src='" . $row['lien'] . "' alt='Image de la catégorie'/>";
                                echo "<p class='categories'>" . htmlspecialchars($row['nomCategorie']) . "</p>";
                            echo "</a>";
                        echo "</div>";
                    }
                }
                else{
                    echo "<p class='no_categories'>Aucune catégorie disponible<br>! Merci de bien vouloir patienter le temps de régler le soucis !</p>";
                }
            ?>
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
        <script src="./js/index.js"></script>
    </body>
</html>