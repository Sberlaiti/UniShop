<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Article</title>
    <link rel="stylesheet" href="pageArticle.css">
</head>
<body>
    <div class="image">

    
    </div>

    <div class="Description">
        <h2>Nom article</h2>
        <p>Voici le meilleur article au monde</p>

        <p>299.99$</p>

        <h2>Livraison</h2>
        <p>Livraison possible dans 2 jour</p>

        <div class="taille">
            <form action="pagePanier.php" method="post">
                <fieldset>
                    <legend>Taille</legend>
                    <input name="taille" type="button" value="XS">
                    <input name="taille" type="button" value="S">
                    <input name="taille" type="button" value="M">
                    <input name="taille" type="button" value="L">
                    <input name="taille" type="button" value="XL">
                </fieldset>
                <input type="submit" value="Ajouter au panier">
            </form>
        </div>
    </div>

</body>
</html>
