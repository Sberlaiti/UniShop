<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('./header02.php');

    // Initialisation des variables de session
    $_SESSION['IdUtilisateur'] = 3333;


    // var_dump($panier);
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
        // Recherche des elements dans le panier de l'utilisateur
        $sql_requete = "SELECT * FROM panier WHERE IdUtilisateur = :IdUtilisateur";
        $stmt = $pdo->prepare($sql_requete);
        $stmt->execute(['IdUtilisateur' => $_SESSION['IdUtilisateur']]);
        $panier = $stmt->fetchAll();

        if(count($panier) == 0) {
            echo "<h1>Votre panier est vide</h1>";
        } else { ?>
            <div class="container">
                <div class="cartList">
                    <?php
                        foreach($panier as $produit) {
                            $sql_requete = "SELECT * FROM produit WHERE IdProduit = :IdProduit";
                            $stmt = $pdo->prepare($sql_requete);
                            $stmt->execute(['IdProduit' => $produit['IdProduit']]);
                            $article = $stmt->fetch();
                    ?>
                            <div class="cartItems">
                                <img src="./images/frenchFlag.png" alt="Image de l'article">
                                <div class="cartItems-infos">
                                    
                                    <!-- Créer javascript pour ajouter au favoris et supprimer du panier -->
                                    <div class="cartItems-infos-name">
                                        <!-- Créer un lien vers la page de l'article -->
                                        <a><?php echo $article['Nom']; ?></a>
                                        <!-- Lier le button à la page du vendeur  -->
                                        <a class="cartItems-infos-seller" href=""><button> Vendeur : <?php echo $article['AppartientVendeur']; ?></button></a>
                                        <div class="cartItems-infos-name-ope">
                                            <button class="addFavourites"><i class="fa-duotone fa-solid fa-heart"></i></button>
                                            <button class="delete"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </div>
                    
                                    <p class="description"><?php echo $article['Description']; ?></p>
                                    
                                    <!-- Verifier la disponibilité du produit -->
                                    <div class="productOptions"> 
                                        <p >Taille : </p>
                                        <select name="" id="productOptions">
                                            <option value="1"> XS</option>
                                            <option value="2">S</option>
                                            <option value="3">M</option>
                                            <option value="4">L</option>
                                            <option value="5">XL</option>
                                        </select>
                                    </div>
                                    
                                    <!-- Modifier le prix en fonction de la quantité -->
                                    <div class="cartItems-infos-price">
                                        <p><?php echo $article['Prix']; ?> €</p>
                                        <div class="amount">
                                            <button class="minus">-</button>
                                            <?php
                                                // Afficher la quantité de l'article
                                                echo "<p>".$produit['Quantitée']."</p>";
                                            ?>
                                            <button class="plus">+</button>
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
                                $sql_requete = "SELECT * FROM produit WHERE IdProduit = :IdProduit";
                                $stmt = $pdo->prepare($sql_requete);
                                $stmt->execute(['IdProduit' => $produit['IdProduit']]);
                                $article = $stmt->fetch();
                                $total += $article['Prix'] * $produit['Quantitée'];
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
                            echo $total; 
                            ?> €</p>
                    </div>

                    <div class="cartSummery_Button">
                        <button class="cartInfos_Validate">Valider</button>
                    </div>
                </div>
            </div>

        <?php }
    ?>

</body>
</html>