<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('./header02.php');
    require_once('./php/fetchCart.php');
    $panier = get_cart($pdo);

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
                                <img src="./images/frenchFlag.png" alt="Image de l'article">
                                <!-- Deplacer le prix et le bouton en bas -->
                                <div class="cartItems-infos">
                                    <!-- Créer javascript pour ajouter au favoris et supprimer du panier -->
                                    <div class="cartItems-infos-name">
                                        <!-- Créer un lien vers la page de l'article -->
                                        <a><?php echo $article['nomProduit']; ?></a>
                                        
                                        <?php
                                            if ($article['idUtilisateur'] == 1) {
                                                $pseudo_Vendeur = "Unishop";
                                            } else {
                                                $sql_requete = "SELECT pseudo FROM utilisateur WHERE idUtilisateur = :idUtilisateur";
                                                $stmt = $pdo->prepare($sql_requete);
                                                $stmt->execute(['idUtilisateur' => $article['idUtilisateur']]);
                                                $pseudo_Vendeur = $stmt->fetch();

                                            }
                                        ?>
                                        
                                        <a class="cartItems-infos-seller" href="produits.php?idUtilisateur=<?php echo $article['idUtilisateur']; ?>"><button> Vendeur : <?php echo $pseudo_Vendeur; ?></button></a>
                                        <div class="cartItems-infos-name-ope">
                                                <button class="addFavourites" data-id=<?php echo $article['idProduit']?>><i class="fa-duotone fa-solid fa-heart"></i></button>
                                                <button class="delete" data-id=<?php echo $article['idProduit']?>><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </div>
                    
                                    <!-- <p class="description"><?php echo $article['description']; ?></p> -->
                                    
                                    <!-- Verifier la disponibilité du produit -->
                                    
                                    <!-- Modifier le prix en fonction de la quantité -->
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
                                                // Afficher la quantité de l'article
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
                        <p> - 18%</p>
                    </div>

                    <div class="cartSummery_Total">
                        <p>Total : </p>
                        <p><?php 
                            $total = $total - ($total * 0.18);
                            $total = number_format($total, 2);
                            echo $total; 
                            ?> €</p>
                    </div>

                    <div class="cartSummery_Button">
                        <form action="paiement.php" method="POST">
                            <input type="hidden" name="total" value="<?php echo $total; ?>">
                            <a href="./paiement.php"><button class="cartInfos_Paiement">Paiement</button></a>
                        </form>
                    </div>
                </div>

                <div class="cartSummery_DiscountCode">
                    <form action="apply_discount.php" method="POST">
                        <label for="discount_code">Code de réduction :</label>
                        <input type="text" id="discount_code" name="discount_code" placeholder="Entrez votre code">
                        <button type="submit">Appliquer</button>
                    </form>
                </div>
            </div>

        <?php } ?>
        <footer>
            <?php require_once('./footer.php'); ?>
        </footer>
    <script src="./js/panier.js"></script>
</body>
</html>