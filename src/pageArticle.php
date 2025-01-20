<?php
    require_once('header02.php');

    // Vérifier que l'utilisateur est connecté
    $idUtilisateur = isset($_SESSION['user']['idUtilisateur']) ? $_SESSION['user']['idUtilisateur'] : null;
    

    

    $stmt = $pdo->prepare("SELECT estVendeur FROM utilisateur WHERE idUtilisateur = ?");
    $stmt->execute([$idUtilisateur]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);


    $idProduit = $_GET['idProduit'];
    $stmt = $pdo->prepare("SELECT nomProduit,description,prix,delayLivraison,idImage
                        FROM produit 
                        WHERE idProduit = ?");
    $stmt->execute([$idProduit]);
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);

    // Récupérer l'image principale du produit
    $idImage = $produit['idImage'];
    $stmt = $pdo->prepare("SELECT lien FROM image WHERE idImage = ?");
    $stmt->execute([$idImage]);
    $imagePrincipale = $stmt->fetchColumn();

    // Récupérer les autres images du produit

    $stmt = $pdo->prepare("
    SELECT lien 
    FROM image
    JOIN produit ON image.idProduit = produit.idProduit 
    WHERE image.idProduit = ?  
    LIMIT 5");
    $stmt->execute([$idProduit]);
    $images = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    $stmt = $pdo->prepare("
    SELECT utilisateur.nom, avis.contenu, avis.idAvis, avis.note
    FROM avis
    JOIN utilisateur ON avis.idUtilisateur = utilisateur.idUtilisateur
    WHERE avis.idProduit = ?
    ");
    $stmt->execute([$idProduit]);
    $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_comment'])) {
        
        $nouveauAvis = $_POST['new_comment'];
        $idProduit = $_GET['idProduit'];
        $idUtilisateur = $_SESSION['user']['idUtilisateur'];
        $note = $_POST['note'];
    
        
        $stmt = $pdo->prepare("INSERT INTO avis (idProduit, idUtilisateur, contenu, note) VALUES (?, ?, ?, ?)");
        $stmt->execute([$idProduit, $idUtilisateur, $nouveauAvis, $note]);
    
        
        header("Location: pageArticle.php?idProduit=$idProduit");
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['del_comment'])) {
        $idAvis = $_POST['idAvis'];
        $idUtilisateur = $_SESSION['user']['idUtilisateur']; 
    
        
        $stmt = $pdo->prepare("SELECT idUtilisateur FROM avis WHERE idAvis = ?");
        $stmt->execute([$idAvis]);
        $avis = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($avis && $avis['idUtilisateur'] == $idUtilisateur) {
    
            $stmt = $pdo->prepare("DELETE FROM avis WHERE idAvis = ?");
            $stmt->execute([$idAvis]);
    
            
            header("Location: pageArticle.php?idProduit=" . $_GET['idProduit']);
            exit();
        } else {
        
            echo "Action non autorisée.";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idProduit = $_POST['idProduit'];
        $idUser = $_SESSION['user']['idUtilisateur'];

        $requete = $pdo->prepare("SELECT idPanier FROM panier WHERE idUtilisateur = ?");
        $requete->execute([$idUser]);
        $panierSQL = $requete->fetch();

        if ($panierSQL) {
            $idPanier = $panierSQL['idPanier'];
        } else {
            $requete = $pdo->prepare("INSERT INTO panier(idUtilisateur) VALUES(?)");
            $requete->execute([$idUser]);
            $idPanier = $pdo->lastInsertId();
        }

        if (isset($_POST['ajout_panier'])) {
            $requeteSQL = $pdo->prepare("INSERT INTO produitspanier(idPanier, idProduit, quantitee) VALUES(?, ?, 1) ON DUPLICATE KEY UPDATE quantitee = quantitee + 1");
            $requeteSQL->execute([$idPanier, $idProduit]);
            echo "<script>showMessage('Produit ajouté au panier');</script>";
        } else if (isset($_POST['enlever_panier'])) {
            $requeteSQL = $pdo->prepare("DELETE FROM produitspanier WHERE idPanier = ? AND idProduit = ?");
            $requeteSQL->execute([$idPanier, $idProduit]);
            echo "<script>showMessage('Produit enlevé du panier');</script>";
        }
        echo "<script>window.location.href = window.location.href;</script>";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pageArticle.css">
    <title><?php echo htmlspecialchars($produit['nomProduit']); ?></title>
</head>
<body>
    <div class = "page_content">
        <div class="product_container">
            <div class="left_section">
                <div class="image_gallery">
                    <div class="thumbnail_list">
                    <?php foreach ($images as $image): ?>
                            <img src="<?php echo htmlspecialchars($image);?>" alt="Image produit" class="thumbnail">
                        <?php endforeach; ?>
                    </div>
                    <div class="main_image">
                        <img src="<?php echo htmlspecialchars($imagePrincipale); ?>" alt="Photo principale du produit">
                    </div>
                </div>

                <?php 
                    $nombreAvis= count($avis);
                ?>
                <div class="review_section">
                    <span class="review_count"><?php echo $nombreAvis . ' avis';?></span>
                    
                    <div class="average_star_rating">
                        <?php
                            
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
                        ?>
                        <span class="note_moyenne"><?php echo number_format($noteMoyenne, 1); ?></span>
                    </div>
                    <div class="review_bar"></div>
                        <div class="comments">
                            <?php 
                            $requeteCommentaire = $pdo->prepare("SELECT note FROM avis WHERE idUtilisateur = ? AND idProduit = ?");
                            $requeteCommentaire->execute([$idUtilisateur, $idProduit]);
                            $commentaireExistant = $requeteCommentaire->fetch();
                            $noteExistant = $commentaireExistant ? $commentaireExistant['note'] : 0;
                            if ($nombreAvis > 0): 
                            ?>
                                <?php foreach ($avis as $avisItem): ?>
                                    <div class="comment">
                                        <strong class="author">
                                            </i><?php echo htmlspecialchars($avisItem['nom']); ?>
                                            <div class="user_star_rating">
                                                <?php
                                                    // Afficher les étoiles en fonction de la note de l'utilisateur
                                                    for ($i = 1; $i <= 5; $i++) {
                                                        $filled = $i <= $noteExistant ? 'filled' : '';
                                                        echo "<span class='star $filled' data-value='$i'>&#9733;</span>";
                                                        echo "<!-- Classe appliquée: star $filled -->";
                                                    }
                                                ?>
                                            </div>
                                        </strong>
                                        <p class="comment_text"><?php echo htmlspecialchars($avisItem['contenu']); ?></p>
                                        <?php if ($_SESSION['user']['idUtilisateur'] == $idUtilisateur && isset($avisItem['idAvis'])): ?>
                                            <div class="del_button">
                                                <form action="" method="POST">
                                                    <input type="hidden" name="idAvis" value="<?php echo htmlspecialchars($avisItem['idAvis']); ?>">
                                                    <button type="submit" name="del_comment">Supprimer</button>
                                                </form>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>Aucun avis pour cet article.</p>
                            <?php endif;
                            ?>
                        
                        <?php if (isset($_SESSION['user']['idUtilisateur'])): ?>
                            <form action="" method="POST" class="add_comment_form">
                                <textarea name="new_comment" placeholder="Ajoutez votre avis..." required></textarea>
                                <input type="hidden" name="note" id="note" value="<?php echo htmlspecialchars($noteExistant); ?>">
                                <?php if (!$commentaireExistant): ?>
                                <div class="user_star_rating_form">
                                    <span class="star" data-value="1">&#9733;</span>
                                    <span class="star" data-value="2">&#9733;</span>
                                    <span class="star" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <span class="star" data-value="5">&#9733;</span>
                                </div>
                                <?php endif; ?>
                                <button type="submit">Publier</button>
                            </form>
                        <?php else: ?>
                            <p><a href="login.php">Connectez-vous</a> pour ajouter un commentaire.</p>
                        <?php endif; ?>
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_comment'])) {
                                $newComment = $_POST['new_comment'];
                                $note = $commentaireExistant ? $commentaireExistant['note'] : $_POST['note'];

                                // Insérer le nouveau commentaire dans la base de données
                                $requete = $pdo->prepare("INSERT INTO commentaires (idUtilisateur, idProduit, contenu, note) VALUES (?, ?, ?, ?)");
                                $requete->execute([$idUser, $idProduit, $newComment, $note]);

                                // Recharger la page pour afficher le nouveau commentaire
                                echo "<script>window.location.href = window.location.href;</script>";
                                exit();
                            }
                            ?>
                        </div>
                </div>
            </div>

            <div class="product_details">
                <?php
                    echo "<h1 class=product_name>" . htmlspecialchars($produit['nomProduit']) . "</h1>";
                    echo "<p class=product_description>". htmlspecialchars($produit['description']). "</p>";
                    echo "<p class=product_price>". htmlspecialchars($produit['prix']). "€". "</p>";
                    echo "<p class=product_delivery>". "Delai de livraison: ". htmlspecialchars($produit['delayLivraison']). " Jours". "</p>";
                ?>
                
                

                <div class="product_sizes">
                    <button class="size">XS</button>
                    <button class="size">S</button>
                    <button class="size">M</button>
                    <button class="size">L</button>
                    <button class="size">XL</button>
                </div>

                <div class="action_buttons">
                    <button class="buy_button" onclick="window.location.href='paiement.php'">Acheter</button>
                    <form action="" method="POST" id="cart_form">
                        <input type="hidden" name="idProduit" value="<?php echo htmlspecialchars($_GET['idProduit']); ?>">
                        <?php
                        if (isset($_SESSION['user']['idUtilisateur'])) {
                            $idUser = $_SESSION['user']['idUtilisateur'];
                            $idProduit = $_GET['idProduit'];
                
                            // Vérifier si le produit est déjà dans le panier
                            $requete = $pdo->prepare("SELECT pp.idProduit FROM produitspanier pp JOIN panier p ON pp.idPanier = p.idPanier WHERE p.idUtilisateur = ? AND pp.idProduit = ?");
                            $requete->execute([$idUser, $idProduit]);
                            $produitDansPanier = $requete->fetch();
                
                            if ($produitDansPanier) {
                                // Si le produit est dans le panier, afficher le bouton "Enlever du Panier"
                                echo '<button type="submit" name="enlever_panier" class="cart_button_delete" id="cart_button">Enlever du Panier</button>';
                            } else {
                                // Si le produit n'est pas dans le panier, afficher le bouton "Ajouter au Panier"
                                echo '<button type="submit" name="ajout_panier" class="cart_button" id="cart_button">Ajouter au Panier</button>';
                            }
                        } else {
                            // Si l'utilisateur n'est pas connecté, afficher un message ou rediriger vers la page de connexion
                            echo '<button type="button" class="cart_button" onclick="window.location.href=\'login.php\'">Connectez-vous pour ajouter au panier</button>';
                        }
                        ?>
                    </form>
                </div>
                <div id="message_panier" class="message_panier"></div>
                <?php
                
                ?>                       
                <div class="extra_options">
                    <button class="more_options">...</button>
                    <div class="more_options_menu">
                        <?php if ($utilisateur['estVendeur'] == 1): ?>
                            <button class="edit_info_button" onclick="window.location.href='pageModifInfoArticle.php?idProduit=<?php echo $_GET['idProduit']; ?>'">Modifier les infos de l'article</button>
                        <?php endif; ?>
                        <button class="view_cart_button" onclick="window.location.href='panier.php'">Voir panier</button>
                        <!-- Ajoutez d'autres options ici -->
                    </div>
                    <button class="share_button">Partager</button>
                </div>
            </div>
        </div>
        <script src="js/pageArticle.js"></script>
    </div>
    <footer>
        <?php require_once("footer.php"); ?>
    </footer>
</body>
</html>
