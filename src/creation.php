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
        $delayLivraison = $_POST['delayLivraison'];
        $categorie = $_POST['categorie'];
        $prixPromotion = $_POST['prixPromotion'];

        $images = $_FILES['images'];

        // Insérer le produit dans la table des produits
        if ($prixPromotion == null) {
            $sqlProduct = "INSERT INTO produit (nomProduit, prix, description, idCategorie, dateCreation, idUtilisateur, delayLivraison) VALUES(?, ?, ?, ?, NOW(), ?, ?)";
            $stmtProduct = $pdo->prepare($sqlProduct);
            $stmtProduct->execute([$nomProduit, $prix, $description, $categorie, $_SESSION['user']['idUtilisateur'], $delayLivraison]);
        } else {
            $sqlProduct = "INSERT INTO produit (nomProduit, prix, prixPromotion, description, idCategorie, dateCreation, idUtilisateur, enPromotion, delayLivraison) VALUES(?, ?, ?, ?, ?, NOW(), ?, 1, ?)";
            $stmtProduct = $pdo->prepare($sqlProduct);
            $stmtProduct->execute([$nomProduit, $prix, $prixPromotion, $description, $categorie, $_SESSION['user']['idUtilisateur'], $delayLivraison]);
        }

        // Récupérer l'ID du produit inséré
        $produitId = $pdo->lastInsertId();

        for($i = 0; $i < count($images['name']); $i++){
            $image_name = basename($images['name'][$i]);

            if ($images['error'][$i] == 0) {
                $cible = "../articles/"; // Dossier de destination
                $cible_file = $cible . $image_name; // Chemin de destination avec un id unique
    
                // Vérification du type de fichier
                $imageFileType = strtolower(pathinfo($cible_file, PATHINFO_EXTENSION));
                $allowed_type = ['jpg', 'jpeg', 'png'];
                if (!in_array($imageFileType, $allowed_type)) {
                    echo "Fichier non accepté.";
                } 
                else {
                    if (move_uploaded_file($images['tmp_name'][$i], $cible_file)) {
                        // Insérer l'image dans la table des images
                        $sqlImage = "INSERT INTO image (lien, idProduit) VALUES(?, ?)";
                        $stmtImage = $pdo->prepare($sqlImage);
                        $stmtImage->execute([$cible_file, $produitId]);
                    } else {
                        echo "Erreur lors du téléchargement de l'image.";
                    }
                }
            }
        }

        $idImage = $pdo->lastInsertId();

        if($idImage != null){
            $sql = "UPDATE produit SET idImage = ? WHERE idProduit = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$idImage, $produitId]);
        }

        //Stockage du message de confirmation
        $_SESSION['message'] = "Le produit a été créé avec succès.";

        header("Location: index.php");
        exit();
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
        <?php
            if($utilisateur['estVendeur'] == 1){
                ?>
                <p id="description">INFORMATION : Vous devez ajouter au plus 3 images pour le produit à vendre et vous pouvez en ajouter jusqu'à 5.</p>
                <?php
            }
        ?>
        <section class="main_bloc">
            <h1 class="title_autres">Création d'un produit</h1>
        <?php
            if($utilisateur['estVendeur'] == 1){
                ?>                    
                    <div class="bloc_affichage">
                        <form id="creationForm" action="creation.php" method="POST" enctype="multipart/form-data">
                            <input type="text" id="nomProduit" name="nomProduit" class="input" placeholder="Nom du produit" required>
                            
                            <input type="number" id="prix" name="prix" class="input" min="0" placeholder="Prix du produit" required>
                            <span id="priceError" style="color: red; display: none;">Le prix doit être inférieur au prix normal et positif.</span>

                            <?php
                                if($utilisateur['admin'] == 1){
                                    ?>
                                    <input type="number" id="prixPromotion" name="prixPromotion" min="0" placeholder="Prix du produit en promotion (optionnel)" class="input">
                                    <span id="promotionError" style="color: red; display: none;">Le prix promotionnel doit être inférieur au prix normal et positif.</span>
                                    <?php
                                }
                            ?>

                            <input type="number" id="delayLivraison" name="delayLivraison" class="input" min="0" placeholder="Délai de livraison" required>

                            <textarea id="message" name="description" required placeholder="Description du produit"></textarea>

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
                                
                            <input type="file" id="image" name="images[]" class="inputImage" required multiple>
                            
                            <button type="button" class="envoyer">Créer produit</button>

                            <div id="confirmationModal" class="modal">
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <h2>Êtes-vous sur des informations du produit ?</h2>
                                    <p><strong>Nom du produit :</strong> <span id="confirmNomProduit"></span></p>
                                    <p><strong>Description :</strong> <span id="confirmDescription"></span></p>
                                    <p><strong>Prix :</strong> <span id="confirmPrix"></span></p>
                                    <p><strong>Délai de livraison :</strong> <span id="confirmDelayLivraison"></span></p>
                                    <?php
                                        if($utilisateur['admin'] == 1){
                                            ?>
                                            <p><strong>Prix Promotionnel :</strong> <span id="confirmPrixPromotion"></span></p>
                                            <?php
                                        }
                                    ?>
                                    <button type="button" name="creation" class="confirm_button">Confirmer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
                <?php
            } else {
                echo "<h1>Vous n'êtes pas autorisé à accéder à cette page.</h1>";
            }
        ?>

        <footer>
            <?php require_once("footer.php"); ?>
        </footer>

        <script src="./js/creation.js"></script>
    </body>
</html>