<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('./header02.php');
    require_once('./php/fetchCart.php');
    require_once('./php/verify_promoCode.php');
    $panier = get_cart($pdo);

    $coefficient = 0;
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['discount_code'])) {
        $coefficient = verify_promoCode($pdo, $_SESSION['user']['idUtilisateur'], $_POST['discount_code']);
    }

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/panier.css"/>
    <!-- Pour utiliser FontAwesome (Icônes) -->
    <script src="https://kit.fontawesome.com/3b8e4ae998.js" crossorigin="anonymous"></script>
    <title>Panier</title>
</head>
<body>
    <?php
        if(count($panier) == 0) {
            echo "<div class='container_emptyCart'>";
            echo "<img src='./images/empty_cart.png' alt='Panier vide'>";
            echo "<h1>Votre panier est vide</h1>";
            echo "</div>";
        } else { ?>
            <div class="container">
                <div class="cartList">
                    <?php
                        foreach($panier as $produit) {
                            $sql_requete = "SELECT * FROM produit WHERE idProduit = :idProduit";
                            $stmt = $pdo->prepare($sql_requete);
                            $stmt->execute(['idProduit' => $produit['idProduit']]);
                            $article = $stmt->fetch();
                    ?>
                            <div class="cartItems">
                                <?php 
                                    $sql_requete = "SELECT lien FROM image WHERE idImage = :idImage";
                                    $stmt = $pdo->prepare($sql_requete);
                                    $stmt->execute(['idImage' => $article['idImage']]);
                                    $image = $stmt->fetch();

                                    echo "<img src='".$image['lien']."' alt='Image de l'article'>";
                                ?>
                                <!-- Deplacer le prix et le bouton en bas -->
                                <div class="cartItems-infos">
                                    <!-- Créer javascript pour ajouter au favoris et supprimer du panier -->
                                    <div class="cartItems-infos-name">
                                        <!-- Créer un lien vers la page de l'article -->

                                        <?php echo "<a href='pageArticle.php?idProduit=".$article['idProduit']."'>".$article['nomProduit']."</a>"; ?>
                                        
                                        <?php
                                                $sql_requete = "SELECT pseudo FROM utilisateur WHERE idUtilisateur = :idUtilisateur";
                                                $stmt = $pdo->prepare($sql_requete);
                                                $stmt->execute(['idUtilisateur' => $article['idUtilisateur']]);
                                                $pseudo_Vendeur = $stmt->fetch();

                                        ?>
                                        

                            

                                        <a class="cartItems-infos-seller" href="produits.php?idUtilisateur=<?php echo $article['idUtilisateur']; ?>"><button> Vendeur : <?php echo $pseudo_Vendeur['pseudo']; ?></button></a>
                                        <div class="cartItems-infos-name-ope">
                                                <button class="addFavourites" data-id=<?php echo $article['idProduit']?>><i class="fa-duotone fa-solid fa-heart"></i></button>
                                                <button class="delete" data-id=<?php echo $article['idProduit']?>><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </div>
                    
                                    <p class="description"><?php echo $article['description']; ?></p>
                                    
                                    <!-- Verifier la disponibilité du produit -->
                                    
                                    <div class="cartItems-infos-price">
                                        <p><?php
                                            if($article['enPromotion'] && $article['prixPromotion'] !== null) {
                                                echo $article['prixPromotion'] . "€ <del>" . $article['prix'] . "€</del>";
                                            }
                                            else {
                                            echo $article['prix'] . "€"; 
                                            } ?> 
                                        </p>
                                        <div class="amount">
                                            <button class="minus" data-id=<?php echo $article['idProduit']?>>-</button>
                                            <?php
                                                echo "<p>".$produit['quantitee']."</p>";
                                            ?>
                                            <button class="plus" data-id=<?php echo $article['idProduit']?>>+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php } ?>
                </div>

                <div class="cartSummery">
                    <h2>Résumé</h2>
                    <div class="cartSummery_Soustotal">
                        <?php 
                            $total = 0;
                            foreach($panier as $produit) {
                                $sql_requete = "SELECT * FROM produit WHERE idProduit = :idProduit";
                                $stmt = $pdo->prepare($sql_requete);
                                $stmt->execute(['idProduit' => $produit['idProduit']]);
                                $article = $stmt->fetch();
                                
                                if ($article['enPromotion'] && $article['prixPromotion'] !== null) {
                                    $total += $article['prixPromotion'] * $produit['quantitee'];
                                } else {
                                    $total += $article['prix'] * $produit['quantitee'];
                                }
                                
                            }
                            echo "<p>Sous-total : </p> 
                                    <p>".$total." €</p>";
                        ?>  
                    </div>

                    <div class="cartSummery_Livraison">
                        <p>Frais de livraison : </p>
                        <p>0.00 €</p>
                    </div>

                    <div class="cartSummery_Promo">
                        <p>Économisé : </p>
                        <p><?php 
                            if ($coefficient > 0) {
                                echo $coefficient. " %";
                            } else {
                                echo "Aucun code de réduction appliqué";
                            }
                        ?></p>
                    </div>

                    <div class="cartSummery_Total">
                        <p>Total : </p>
                        <p><?php 
                            $total = $total - ($total * ($coefficient / 100));
                            $total = number_format($total, 2);
                            echo $total; 
                            ?> €</p>
                    </div>

                    <div class="cartSummery_Button">
                        <form action="paiement.php" method="POST">
                            <input type="hidden" name="total" value="<?php echo $total; ?>">
                            <a href="./paiement.php"><button class="cartInfos_Paiement">Payer</button></a>
                        </form>
                    </div>

                    <div class="cartSummery_DiscountCode">
                    <form method="POST">
                        <label for="discount_code">Ajouter un code de réduction</label>
                        <input type="text" id="discount_code" name="discount_code" placeholder="Entrez votre code">
                        <button type="submit">Appliquer</button>
                    </form>
                </div>
                </div>

            </div>

        <?php } ?>
        <footer>
            <?php require_once('./footer.php'); ?>
        </footer>
    <script src="./js/panier.js"></script>
</body>
</html>