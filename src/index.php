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
        <section class="affichage_categorie">            
            <div class="bloc_categorie">
            <?php
                //Affichage des catégories
                if($result->rowCount() > 0){
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        echo "<a href='produits.php?idCategorie=" . $row['idCategorie'] . "' class='lien_produit'>";
                            echo "<div class='categorie'>";                            
                                echo "<img class='image_categorie' src='" . $row['lien'] . "' alt='Image de la catégorie'/>";
                                 echo "<p class='nom_categorie'>" . htmlspecialchars($row['nomCategorie']) . "</p>";                            
                            echo "</div>";
                        echo "</a>";
                    }
                    //clonage des catégories pour un affichage complet du défilement
                    $result->execute();
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        echo "<div class='categorie'>";
                            echo "<a href='produits.php?idCategorie=" . $row['idCategorie'] . "' class='lien_produit'>";
                                echo "<img class='image_categorie' src='" . $row['lien'] . "' alt='Image de la catégorie'/>";
                                echo "<p class='nom_categorie'>" . htmlspecialchars($row['nomCategorie']) . "</p>";
                            echo "</a>";
                        echo "</div>";
                    }
                }
                else{
                    echo "<p class='no_categorie'>Aucune catégorie disponible<br>! Merci de bien vouloir patienter le temps de régler le soucis !</p>";
                }
            ?>
            </div>
        </section>

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

        <div class="jeu_promo">
            <?php if($_SESSION['user'] != null): ?>
                <a href="game.php"><p>Envie de gagner un code promo ?<br>Jouer au jeu !</p></a>
            <?php else: ?>
                <a href="login.php"><p>Envie de gagner un code promo ?<br>Jouer au jeu !</p></a>
            <?php endif; ?>
        </div>

        <br>

        <footer>
            <?php require_once("footer.php"); ?>
        </footer>
        <script src="./js/index.js"></script>
    </body>
</html>