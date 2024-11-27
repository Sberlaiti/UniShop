<?php
    require_once('pdo-conn.php');
    $idProduit = $_GET['idProduit'];
    $stmt = $pdo->prepare("SELECT Nom,Description,Prix,delayLivraison
                        FROM produit 
                        WHERE idProduit = ?");
    $stmt->execute([$idProduit]);
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);

    /*$stmt = $pdo->prepare("SELECT contenu
                       FROM avis
                       WHERE idProduit = 1");
    $stmt->execute();
    $avis = $stmt->fetchAll();*/

    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pageArticle.css">
    <title>Détail du Produit</title>
</head>
<body>
    <script src = ""></script>
    <div class="product-container">
        <div class="left-section">
            <div class="image-gallery">
                <div class="thumbnail-list">
                    <img src="../articles/preview-6.jpeg" alt="Angle 1" class="thumbnail">
                    <img src="../articles/preview-2.jpeg" alt="Angle 2" class="thumbnail">
                    <img src="../articles/preview-3.jpeg" alt="Angle 3" class="thumbnail">
                    <img src="../articles/preview-4.jpeg" alt="Angle 4" class="thumbnail">
                    <img src="../articles/preview-5.jpeg" alt="Angle 5" class="thumbnail">
                </div>
                <div class="main-image">
                    <img src="../articles/preview-5.jpeg" alt="Photo article">
                </div>
            </div>

            <?php /*
                $nombreAvis= count($avis);
            */?>
            <div class="review-section">
                <span class="review-count"><?php /* echo $nombreAvis . ' avis'; */?>500</span>
                <!--<span class="rating">5 / 5</span>-->
                <div class="star-rating">
                    <span class="star" data-value="1">&#9733;</span>
                    <span class="star" data-value="2">&#9733;</span>
                    <span class="star" data-value="3">&#9733;</span>
                    <span class="star" data-value="4">&#9733;</span>
                    <span class="star" data-value="5">&#9733;</span>
                </div>
                <div class="review-bar"></div>
            </div>
            <script>
                const thumbnails = document.querySelectorAll('.thumbnail-list .thumbnail');
                const mainImage = document.querySelector('.main-image img');

                thumbnails.forEach(thumbnail => {
                    thumbnail.addEventListener('click', () => {
                        mainImage.src = thumbnail.src;
                        mainImage.alt = thumbnail.alt;
                    });
                });
            </script>

            <!--div class= "avis">
                <?php /*if ($nombreCommentaires > 0): ?>
                    <?php foreach ($commentaires as $commentaire): ?>
                        <div class="comment">
                            <strong class ="author"><i class ="icon-user"></i><?php echo $produit['nom']; ?></strong>
                            <p><?php echo $avis['contenu']; ?></p>
                            <?php if($_SESSION['idUtilisateur'] == 2){
                                echo'
                                <div class = del-button>
                                    <form action="pageArticle" method ="GET">
                                        <button type="submit">Supprimer</button>
                                    </form>
                                </div>';
                            }?>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Aucun commentaire pour cet article.</p>
                <?php endif; */?>
            </div-->



        </div>
        <script>
            const productRating = 1;
            const stars = document.querySelectorAll('.star-rating .star');

            stars.forEach(star => {
                const starValue = parseFloat(star.getAttribute('data-value'));
                if (starValue <= productRating) {
                    star.classList.add('filled');
                } else if (starValue - productRating < 1 && starValue - productRating > 0) {
                    // Pour un remplissage partiel de l'étoile
                    star.style.color = `linear-gradient(90deg, #f8d64e ${productRating % 1 * 100}%, #ddd ${productRating % 1 * 100}%)`;
                }
            });
        </script>

        <div class="product-details">
            <?php
                echo "<h1 class=product-name>" . htmlspecialchars($produit['Nom']) . "</h1>";
                echo "<p class=product-description>". htmlspecialchars($produit['Description']). "</p>";
                echo "<p class=product-price>". htmlspecialchars($produit['Prix']). "€". "</p>";
                echo "<p class=product-delivery>". "Delai de livraison: ". htmlspecialchars($produit['delayLivraison']). " Jours". "</p>";
            ?>
            
            

            <div class="product-sizes">
                <button class="size">XS</button>
                <button class="size">S</button>
                <button class="size">M</button>
                <button class="size">L</button>
                <button class="size">XL</button>
            </div>

            <div class="action-buttons">
                <button class="buy-button">Acheter</button>
                <button class="cart-button">Ajouter au Panier</button>
            </div>

            <div class="extra-options">
                <button class="more-options">...</button>
                <button class="share-button">Partager</button>
                <button class="favorite-button">Aimer</button>
            </div>
        </div>
    </div>

</body>
</html>
