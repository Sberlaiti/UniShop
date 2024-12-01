<?php
    session_start(); 
    $_SESSION['idUtilisateur'] = 3333; 
    $_SESSION['prenom'] = 'Daviv';

    require_once('../connection/pdo-conn.php');
    $idProduit = $_GET['idProduit'];
    $stmt = $pdo->prepare("SELECT nomProduit,description,prix,delayLivraison,idImage
                        FROM produit 
                        WHERE idProduit = ?");
    $stmt->execute([$idProduit]);
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare("SELECT lien FROM image WHERE idImage <= 5"); // Limiter à 5 images
    $stmt->execute();
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
        $idUtilisateur = $_SESSION['idUtilisateur'];
        $note = $_POST['note'];
    
        
        $stmt = $pdo->prepare("INSERT INTO avis (idProduit, idUtilisateur, contenu, note) VALUES (?, ?, ?, ?)");
        $stmt->execute([$idProduit, $idUtilisateur, $nouveauAvis, $note]);
    
        
        header("Location: pageArticle.php?idProduit=$idProduit");
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['del_comment'])) {
        $idAvis = $_POST['idAvis'];
        $idUtilisateur = $_SESSION['idUtilisateur']; 
    
        
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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pageArticle.css">
    <title>Détail du Produit</title>
</head>
<body>
    <div class="product_container">
        <div class="left_section">
            <div class="image_gallery">
                <div class="thumbnail_list">
                    <?php foreach ($images as $image): ?>
                        <img src="<?php echo htmlspecialchars($image);?>" alt="Image produit" class="thumbnail">
                    <?php endforeach; ?>
                </div>
                <div class="main_image">
                    <img src="<?php echo htmlspecialchars($images[0] ?? ''); ?>" alt="Photo principale du produit">
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
                </div>
                <div class="review_bar"></div>
                    <div class="comments">
                        <?php if ($nombreAvis > 0): ?>
                            <?php foreach ($avis as $avisItem): ?>
                                <div class="comment">
                                    <strong class="author"></i><?php echo htmlspecialchars($avisItem['nom']); ?></strong>
                                    <p><?php echo htmlspecialchars($avisItem['contenu']); ?></p>
                                    <div class="user_star_rating">
                                        <?php
                                            // Afficher les étoiles en fonction de la note de l'utilisateur
                                            for ($i = 1; $i <= 5; $i++) {
                                                $filled = $i <= $avisItem['note'] ? 'filled' : '';
                                                echo "<span class='star $filled' data-value='$i'>&#9733;</span>";
                                                echo "<!-- Classe appliquée: star $filled -->";
                                            }
                                        ?>
                                    </div>
                                    <?php if ($_SESSION['idUtilisateur'] == 3333 && isset($avisItem['idAvis'])): ?>
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
                        <?php endif; ?>
                       
                        <form action="" method="POST" class="add_comment_form">
                            <textarea name="new_comment" placeholder="Ajoutez votre avis..." required></textarea>
                            <input type="hidden" name="note" id="note" value="0">
                            <div class="user_star_rating_form">
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>
                            </div>
                            <button type="submit" >Publier</button>
                        </form>
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
                <button class="buy_button">Acheter</button>
                <button class="cart_button">Ajouter au Panier</button>
            </div>

            <div class="extra_options">
                <button class="more_options">...</button>
                <button class="share_button">Partager</button>
            </div>
        </div>
    </div>
    <script src="../js/pageArticle.js"></script>
</body>
</html>
