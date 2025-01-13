<?php
    require_once("header02.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Initialisation des variables de session
    if(!isset($_SESSION['user'])) $_SESSION['user'] = null;

    //Récupération des valeurs des catégories dans la BDD
    $sql = "SELECT nomCategorie, idCategorie
            FROM categorie
            ORDER BY nomCategorie";
    $result = $pdo->query($sql);

    //Récupération de l'id du panier de l'utilisateur
    if($_SESSION['user'] != null){
        $idPanier = "SELECT idPanier
                    FROM panier
                    WHERE idUtilisateur = " . $_SESSION['user']['idUtilisateur'];
        $stmtPanier = $pdo->query($idPanier);
    }

    //Récupération des avis
    $requete = "SELECT avis.note, avis.idProduit
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
        <link rel="stylesheet" href="./css/produits.css">
        <link rel="icon" href="../logos/logo-png.png" type="image/icon">
        <title><?php
        //Titre de la page en fonction de la catégorie sélectionnée 
            if(isset($_GET['idCategorie']) && $_GET['idCategorie'] != "0"){
                $idCategorie = $_GET['idCategorie'];
                $sql_requete = "SELECT nomCategorie
                                FROM categorie
                                WHERE idCategorie = :idCategorie";
                $stmt = $pdo->prepare($sql_requete);
                $stmt->execute(['idCategorie' => $idCategorie]);
                $categorie = $stmt->fetch();
                echo htmlspecialchars($categorie['nomCategorie']);
            } else {
                echo "Tous les produits";
            }
        ?> - UniShop</title>
    </head>

    <body>
        <br>

        <section class="main_section">
            <section id="liste_categories">
                <?php
                    echo "<div class='categories'>";
                        echo "<label>";
                            echo "<input type='radio' name='categorie' value='0' ";
                            if (!isset($_GET['idCategorie']) || $_GET['idCategorie'] == "0") {
                                echo "checked"; // Par défaut, tous les produits
                            }
                            echo "/> Tous les produits";
                        echo "</label>";
                    echo "</div>";

                    if ($result->rowCount() > 0) {
                        foreach ($result as $row_count) {
                            echo "<div class='categories'>";
                                echo "<label>";
                                    echo "<input type='radio' name='categorie' value='" . $row_count['idCategorie'] . "' ";
                                    if (isset($_GET['idCategorie']) && $_GET['idCategorie'] == $row_count['idCategorie']) {
                                        echo "checked"; // Maintenir la sélection après rechargement
                                    }
                                    echo "/> " . htmlspecialchars($row_count['nomCategorie']);
                                echo "</label>";
                            echo "</div>";
                        }
                    }
                ?>
            </section>

            <br>

            <section class="affichage_produit affichage_produit2 affichage_produit3" id="affichage_produit">
                <?php
                    if(isset($_GET['idCategorie']) && $_GET['idCategorie'] != "0"){
                        // On cherche par catégorie
                        $idCategorie = $_GET['idCategorie'];
                        $sql_requete = "SELECT p.idProduit, p.nomProduit, p.prix, i.lien, u.pseudo
                                        FROM produit p
                                        JOIN utilisateur u ON u.idUtilisateur = p.idUtilisateur
                                        JOIN image i ON i.idImage = p.idImage
                                        WHERE p.idCategorie = :idCategorie";
                        $stmt = $pdo->prepare($sql_requete);
                        $stmt->execute(['idCategorie' => $idCategorie]);
                        $produits = $stmt->fetchAll();
                    } else {
                        // Aucun filtre
                        $sql_requete = "SELECT p.idProduit, p.nomProduit, u.pseudo, p.prix, i.lien
                                        FROM produit p
                                        JOIN utilisateur u ON u.idUtilisateur = p.idUtilisateur
                                        JOIN image i ON i.idImage = p.idImage";
                        $stmt = $pdo->query($sql_requete);
                        $produits = $stmt->fetchAll();
                    }

                    if(count($produits) > 0){
                        foreach($produits as $row_count){              
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
                                        $avisProduit = array_filter($avis, function($row_avis) use ($row_count) {
                                            return $row_avis['idProduit'] == $row_count['idProduit'];
                                        });

                                        $nombreAvis = count($avisProduit);                                    
                                        $noteMoyenne = 0;
                                        if ($nombreAvis > 0) {
                                            $totalNotes = array_sum(array_column($avisProduit, 'note'));
                                            $noteMoyenne = $totalNotes / $nombreAvis;
                                        }
                                        
                                        for ($i = 1; $i <= 5; $i++) {
                                            $filled = $i <= $noteMoyenne ? 'filled' : '';
                                            echo "<span class='star $filled' data-value='$i'>&#9733;</span>";
                                        }
                                        echo "<p class='review_count'>" . $nombreAvis . ' avis' . "</p>";
                                        ?>
                                    </div>
                                    <?php
                                    echo "<p class='prix_produit'>" . htmlspecialchars($row_count['prix']) . " €</p>";
                                echo "</a>";
                                if($_SESSION['user'] != null){
                                    ?>
                                    <form method="POST" action="">
                                        <input type="hidden" name="idProduit" value="<?php echo $row_count['idProduit']; ?>">
                                        <button class="ajout_panier" type="submit" name="ajout_panier">Ajouter au panier</button>
                                    </form>
                                    <?php
                                }
                                else{
                                    echo "<button class='ajout_panier' onclick='window.location.href=\"login.php\"'>Ajouter au panier</button>";
                                }
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='no_produit'>
                                <p>Aucun produit disponible. Revenez un prochain jour !</p>
                            </div>";
                    }

                    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajout_panier'])){
                        $idProduit = $_POST['idProduit'];
                        $idUser = $_SESSION['user']['idUtilisateur'];

                        $requete = $pdo->prepare("SELECT idPanier FROM panier WHERE idUtilisateur = ?");
                        $requete->execute([$idUser]);
                        $panierSQL = $requete->fetch();

                        if($panierSQL){
                            $idPanier = $panierSQL['idPanier'];
                        } else {
                            $requete = $pdo->prepare("INSERT INTO panier(idUtilisateur) VALUES(?)");
                            $requete->execute([$idUser]);
                            $idPanier = $pdo->lastInsertId();
                        }
                        $requeteSQL = $pdo->prepare("INSERT INTO produitsPanier(idPanier, idProduit, quantitee) VALUES(?, ?, 1) ON DUPLICATE KEY UPDATE quantitee = quantitee + 1");
                        $requeteSQL->execute([$idPanier, $idProduit]);
                        ?>
                        <div class="message_panier">Produit ajouté au panier</div>
                        <?php
                    }
                ?>
            </section>
        </section>
        <br>

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
        <script src="./js/produits.js"></script>
    </body>
</html>