<?php
    require_once("header02.php");

    // Initialisation des variables de session
    if(!isset($_SESSION['user'])) $_SESSION['user'] = null;

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //Récupération des données de la table article
    $sql_requete = "SELECT p.idProduit, p.nomProduit, u.pseudo, p.prix, i.lien
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

    //Récupération des avis
    $requete = "SELECT avis.note
            FROM avis
            JOIN produit ON avis.idProduit = produit.idProduit
            WHERE produit.idProduit = avis.idProduit";
    $stmt = $pdo->query($requete);
    $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                                    echo "<div class='infos_produit'>";
                                        echo "<h3>" . htmlspecialchars($row_count['nomProduit']) . "</h3>";
                                        echo "<a class='cartItems-infos-seller' href=''><button>Vendeur: " . htmlspecialchars($row_count['pseudo']). "</button></a>";
                                    echo "</div>";
                                    ?>
                                    <div class="average_star_rating">
                                        <?php
                                            $nombreAvis = count($avis);                                    
                                            $noteMoyenne = 0;
                                            if ($nombreAvis > 0) {
                                                $totalNotes = array_sum(array_column($avis, 'note'));
                                                $noteMoyenne = $totalNotes / $nombreAvis;
                                            }
                                            
                                            for ($i = 1; $i <= 5; $i++) {
                                                $filled = $i <= $noteMoyenne ? 'filled' : '';
                                                echo "<span class='star $filled' data-value='$i'>&#9733;</span>";
                                                echo "<!-- Classe appliquée: star $filled -->";
                                            }
                                            echo "<p class='review_count'>" . $nombreAvis . ' avis' . "</p>";
                                        ?>
                                    </div>
                                    <?php
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
                <a href="game.php"><p>Jouer au jeu !</p></a>
            <?php else: ?>
                <a href="login.php"><p>Jouer au jeu !</p></a>
            <?php endif; ?>
        </div>

        <br>

        <footer>
            <?php require_once("footer.php"); ?>
        </footer>
        <script src="./js/index.js"></script>
    </body>
</html>