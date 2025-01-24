<?php
    require_once('header02.php');

    // Vérifier que l'utilisateur est connecté
    $idUtilisateur = isset($_SESSION['user']['idUtilisateur']) ? $_SESSION['user']['idUtilisateur'] : null;
    

    
    
    $stmt = $pdo->prepare("SELECT idUtilisateur,estVendeur FROM utilisateur WHERE idUtilisateur = ?");
    $stmt->execute([$idUtilisateur]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);


    $idProduit = $_GET['idProduit'];
    $stmt = $pdo->prepare("SELECT idProduit,nomProduit,description,prix,delayLivraison,idImage,idUtilisateur,enPromotion,prixPromotion
                        FROM produit 
                        WHERE idProduit = ? AND (enPromotion = 1 OR enPromotion = 0)");
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
    SELECT utilisateur.nom, avis.contenu, avis.idAvis, avis.note, avis.dateCreation, avis.idUtilisateur
    FROM avis
    JOIN utilisateur ON avis.idUtilisateur = utilisateur.idUtilisateur
    WHERE avis.idProduit = ?
    ");
    $stmt->execute([$idProduit]);
    $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idProduit']) && isset($_POST['prix'])) {
        $_SESSION['total'] = $_POST['prix'];

        $sql_requete = $pdo->prepare("SELECT idPanier FROM panier WHERE idUtilisateur = :idUtilisateur");
        $sql_requete->execute(['idUtilisateur' => $_SESSION['user']['idUtilisateur']]);
        $idPanier = $sql_requete->fetch()['idPanier'];

        $sql_requete = $pdo->prepare("DELETE FROM produitspanier WHERE idPanier = :idPanier");
        $sql_requete->execute(['idPanier' => $idPanier]);

        $sql_requete = $pdo->prepare("INSERT INTO produitspanier (idPanier, idProduit, quantitee) VALUES (:idPanier, :idProduit, 1)");
        $sql_requete->execute([
            'idPanier' => $idPanier,
            'idProduit' => $_POST['idProduit']
        ]);

        header("Location: paiement.php");
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_comment'])) {
        
        $nouveauAvis = $_POST['new_comment'];
        $idProduit = $_GET['idProduit'];
        $idUtilisateur = $_SESSION['user']['idUtilisateur'];
        $note = $_POST['note'];
    
        
        $stmt = $pdo->prepare("INSERT INTO avis (idProduit, idUtilisateur, contenu, note, dateCreation) VALUES (?, ?, ?, ?, NOW())");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                        <?php if ($noteMoyenne > 0): ?>
                            <span class="note_moyenne"><?php echo number_format($noteMoyenne, 1); ?></span>
                        <?php endif; ?>
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
                                            <?php echo htmlspecialchars($avisItem['nom']); ?>
                                            <div class="user_star_rating">
                                                <?php
                                                    // Afficher les étoiles en fonction de la note de l'utilisateur
                                                    for ($i = 1; $i <= 5; $i++) {
                                                        $filled = $i <= $avisItem['note'] ? 'filled' : '';
                                                        echo "<span class='star $filled' data-value='$i'>&#9733;</span>";
                                                    }
                                                ?>
                                            </div>
                                        </strong>
                                        <p class="comment_text"><?php echo htmlspecialchars($avisItem['contenu']); ?></p>
                                        <p class="comment_date">Posté le : <?php echo htmlspecialchars($avisItem['dateCreation']); ?></p>
                                        <?php if ($idUtilisateur && $_SESSION['user']['idUtilisateur'] == $avisItem['idUtilisateur']): ?>
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
                    if ($produit['enPromotion'] && $produit['prixPromotion'] !== null) {
                        echo "<p class=product_price>". htmlspecialchars($produit['prixPromotion']). "€ <del>" . htmlspecialchars($produit['prix']) . "€</del>" . "</p>";
                    } else {
                        echo "<p class=product_price>". htmlspecialchars($produit['prix']). "€". "</p>";
                    }
                    echo "<p class=product_delivery>". "Delai de livraison: ". htmlspecialchars($produit['delayLivraison']). " Jours". "</p>";
                ?>

                <div class="action_buttons">
                    <?php
                        if (isset($_SESSION['user']['idUtilisateur'])) {
                            // Afficher les boutons "Acheter" et "Ajouter au Panier" si l'utilisateur est connecté
                            echo '<form method="POST" id="cart_form">';
                            echo    '<input type="hidden" name="idProduit" value="' . htmlspecialchars($produit['idProduit']) . '">';
                            echo    '<input type="hidden" name="prix" value="' . ($produit['enPromotion'] && $produit['prixPromotion'] !== null ? htmlspecialchars($produit['prixPromotion']) : htmlspecialchars($produit['prix'])) . '">';
                            echo    '<button type="submit" class="buy_button">Acheter</button>';
                            echo '</form>';
                            echo '<form action="" method="POST" id="cart_form">';
                            echo    '<input type="hidden" name="idProduit" value="' . htmlspecialchars($_GET['idProduit']) . '">';
                            echo    '<button type="submit" name="ajout_panier" class="cart_button" id="cart_button">Ajouter au Panier</button>';
                            echo '</form>';
                        } else {
                            // Rediriger l'utilisateur non connecté vers la page de connexion
                            echo '<button class="buy_button" onclick="window.location.href=\'login.php\'">Acheter</button>';
                            echo '<button class="cart_button" onclick="window.location.href=\'login.php\'">Ajouter au Panier</button>';
                        }
                    ?>
                </div>

                <div id="message_panier" class="message_panier"></div>

                <div class="extra_options">
                    <?php
                        if($idUtilisateur){
                            if ($utilisateur['estVendeur'] == 1 && $utilisateur['idUtilisateur'] == $produit['idUtilisateur']) {
                                echo '<button class="edit_info_button" onclick="window.location.href=\'pageModifInfoArticle.php?idProduit=' . $_GET['idProduit'] . '\'">';
                                echo '<i class="fa-solid fa-pen-to-square"></i> Modifier les infos de l\'article';
                                echo '</button>';
                            }
                        }
                    ?>
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
