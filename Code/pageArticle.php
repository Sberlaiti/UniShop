<?php
    require_once('pdo-conn.php');
    $stmt = $pdo->prepare("SELECT Nom,Description,Prix,delayLivraison FROM produit WHERE idProduit = 0");
    $stmt->execute();
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);

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
    <div class="product-container">
        <div class="left-section">
            <div class="image-gallery">
                <div class="thumbnail-list">
                    <img src="../articles/preview-6.jpeg" alt="Angle 1" class="thumbnail">
                    <img src="../articles/preview-2.jpeg" alt="Angle 2" class="thumbnail">
                    <img src="../articles/preview-3.jpeg" alt="Angle 3" class="thumbnail">
                    <img src="../articles/preview-4.jpeg" alt="Angle 4" class="thumbnail">
                </div>
                <div class="main-image">
                    <img src="../articles/preview-5.jpeg" alt="Photo article">
                </div>
            </div>

            <div class="review-section">
                <span class="review-count">5000 Avis</span>
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
