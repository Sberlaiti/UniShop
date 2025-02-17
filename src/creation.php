<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once("header02.php");

    // Initialisation des variables de session
    if(!isset($_SESSION['user'])) $_SESSION['user'] = null;

    $idUtilisateur = $_SESSION['user']['idUtilisateur'];

    $stmt = $pdo->prepare("SELECT estVendeur, admin FROM utilisateur WHERE idUtilisateur = ?");
    $stmt->execute([$idUtilisateur]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['creation'])){
        $nomProduit = $_POST['nomProduit'];
        $prix = $_POST['prix'];
        $description = $_POST['description'];
        $categorie = $_POST['categorie'];

        $prixPromotion = $_POST['prixPromotion'];

        // Gérer le téléchargement de l'image
        $image_name = basename($_FILES['image']['name']);

        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
            $cible = "../articles/"; // Dossier de destination
            $cible_file = $cible . $image_name; // Chemin de destination avec un id unique

            // Vérification du type de fichier
            $imageFileType = strtolower(pathinfo($cible_file, PATHINFO_EXTENSION));
            $allowed_type = ['jpg', 'jpeg', 'png'];
            if(!in_array($imageFileType, $allowed_type)) {
                echo "Fichier non accepté.";
            } else {
                if(move_uploaded_file($_FILES['image']['tmp_name'], $cible_file)) {
                    // Insérer l'image dans la table des images
                    $sqlImage = "INSERT INTO image (lien) VALUES(?)";
                    $stmtImage = $pdo->prepare($sqlImage);
                    $stmtImage->execute([$cible_file]);
                    
                    // Récupérer l'ID de l'image insérée
                    $imageId = $pdo->lastInsertId();

                    // Insérer le produit dans la table des produits
                    if($prixPromotion == null){
                        $sqlProduct = "INSERT INTO produit (nomProduit, prix, description, idCategorie, idImage, dateCreation, idUtilisateur) VALUES(?, ?, ?, ?, ?, NOW(), ?)";
                        $stmtProduct = $pdo->prepare($sqlProduct);
                        $stmtProduct->execute([$nomProduit, $prix, $description, $categorie, $imageId, $_SESSION['user']['idUtilisateur']]);
                    }
                    else{
                        $sqlProduct = "INSERT INTO produit (nomProduit, prix, prixPromotion, description, idCategorie, idImage, dateCreation, idUtilisateur, enPromotion) VALUES(?, ?, ?, ?, ?, ?, NOW(), ?, 1)";
                        $stmtProduct = $pdo->prepare($sqlProduct);
                        $stmtProduct->execute([$nomProduit, $prix, $prixPromotion, $description, $categorie, $imageId, $_SESSION['user']['idUtilisateur']]);
                    }
                }
                else{
                    echo "Erreur";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="./css/creation.css">
        <link rel="icon" href="../logos/logo-png.png" type="image/icon">
        <title>Création d'un produit - UniShop</title>
    </head>

    <body>
        <h1 class="title_autres">Création d'un produit</h1>
        <?php
            if($utilisateur['estVendeur'] == 1){
                ?>
                <section class="main_bloc">
                    
                    <div class="bloc_affichage">
                        <form action="creation.php" method="POST" enctype="multipart/form-data">
                            <div class="bloc">
                                <label for="nomProduit">Nom du produit</label>
                                <input type="text" id="nomProduit" name="nomProduit" required>
                            </div>

                            <div class="bloc">
                                <label for="prix">Prix</label>
                                <input type="number" id="prix" name="prix" required>
                            </div>

                            <?php
                                if($utilisateur['admin'] == 1){
                                    ?>
                                    <div class="bloc">
                                        <label for="prixPromotion">Prix en promotion</label>
                                        <input type="number" id="prixPromotion" name="prixPromotion">
                                    </div>
                                    <?php
                                }
                            ?>

                            <div class="bloc">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" required></textarea>
                            </div>

                            <div class="bloc">
                                <label for="categorie">Catégorie</label>
                                <select id="categorie" name="categorie" required>
                                    <?php
                                        $sql = "SELECT idCategorie, nomCategorie FROM categorie";
                                        $stmt = $pdo->query($sql);
                                        $categories = $stmt->fetchAll();

                                        foreach($categories as $categorie){
                                            echo "<option value='" . $categorie['idCategorie'] . "'>" . $categorie['nomCategorie'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="bloc">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" required>
                            </div>
                            
                            <button type="submit" name="creation">Créer produit</button>
                        </form>
                    </div>
                </section>
                <?php
            } else {
                echo "<h1>Vous n'êtes pas autorisé à accéder à cette page.</h1>";
            }
        ?>
    </body>
</html>