<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./connection/pdo-conn_iut.php');

// Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['user']['idUtilisateur'])) {
    header('Location: login.php');
    exit();
}

$idUtilisateur = $_SESSION['user']['idUtilisateur'];
$idProduit = $_GET['idProduit'];

// Vérifier que l'utilisateur est un vendeur et le propriétaire de l'article
$stmt = $pdo->prepare("SELECT estVendeur FROM utilisateur WHERE idUtilisateur = ?");
$stmt->execute([$idUtilisateur]);
$utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT idUtilisateur FROM produit WHERE idProduit = ?");
$stmt->execute([$idProduit]);
$produit = $stmt->fetch(PDO::FETCH_ASSOC);

if ($utilisateur['estVendeur'] != 1 || $produit['idUtilisateur'] != $idUtilisateur) {
    echo "Vous n'êtes pas autorisé à modifier cet article.";
    exit();
}

// Récupérer les informations actuelles de l'article
$stmt = $pdo->prepare("SELECT nomProduit, description, prix, delayLivraison, idImage FROM produit WHERE idProduit = ?");
$stmt->execute([$idProduit]);
$article = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomProduit = $_POST['nomProduit'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $delayLivraison = $_POST['delayLivraison'];

    // Vérifier si une nouvelle image a été uploadée
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_name = basename($_FILES['image']['name']);
        $cible = "../articles/";
        $cible_file = $cible . uniqid() . "_" . $image_name;

        $imageFileType = strtolower(pathinfo($cible_file, PATHINFO_EXTENSION));
        $allowed_type = ['jpg', 'jpeg', 'png'];
        if (!in_array($imageFileType, $allowed_type)) {
            echo "Fichier non accepté.";
        } else {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $cible_file)) {
                // Enregistrer le chemin de l'image dans la table `image`
                $stmt = $pdo->prepare("INSERT INTO image (lien) VALUES (?)");
                $stmt->execute([$cible_file]);
                $idImage = $pdo->lastInsertId();

                // Mettre à jour l'image principale du produit
                $stmt = $pdo->prepare("UPDATE produit SET idImage = ? WHERE idProduit = ?");
                $stmt->execute([$idImage, $idProduit]);
            } else {
                echo "Erreur de l'upload de l'image.";
            }
        }
    }

    // Mettre à jour les autres informations de l'article
    $stmt = $pdo->prepare("UPDATE produit SET nomProduit = ?, description = ?, prix = ?, delayLivraison = ? WHERE idProduit = ?");
    $stmt->execute([$nomProduit, $description, $prix, $delayLivraison, $idProduit]);

    echo "Les informations de l'article ont été mises à jour avec succès.";
    header("Location: pageArticle.php?idProduit=$idProduit");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pageArticle.css">
    <title>Modifier les informations de l'article</title>
</head>
<body>
    <header>
        <a class="accueil" href="index.php">&larr;</a>
    </header>

    <h1>Modifier les informations de l'article</h1>

    <div class="container">
        <section class="formulaire">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="title">
                    <label for="nomProduit">Nom du produit</label>
                    <input type="text" name="nomProduit" id="nomProduit" value="<?php echo htmlspecialchars($article['nomProduit']); ?>" required maxlength="200"/>
                </div>

                <div class="description">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" required maxlength="5000"><?php echo htmlspecialchars($article['description']); ?></textarea>
                </div>

                <div class="price">
                    <label for="prix">Prix</label>
                    <input type="number" name="prix" id="prix" value="<?php echo htmlspecialchars($article['prix']); ?>" required step="0.01"/>
                </div>

                <div class="delivery">
                    <label for="delayLivraison">Délai de livraison (jours)</label>
                    <input type="number" name="delayLivraison" id="delayLivraison" value="<?php echo htmlspecialchars($article['delayLivraison']); ?>" required/>
                </div>

                <div class="image">
                    <label for="image">Image de l'article</label>
                    <input type="file" name="image" id="image"/>
                </div>

                <div class="button">
                    <button type="submit">Mettre à jour l'article</button>
                </div>
            </form>
        </section>
    </div>

    <footer>
        <div class="return_top">
            <p id="retourHaut">Retour en haut</p>
        </div>

        <div class="logo_langue">
            <a href="index.php"><img src="../logos/logo-png.png" width="80" height="50" alt="Logo du site"></a>
            <select>
                <option>Français</option>
            </select>
        </div>

        <div class="droits">
            <div id="liste_droits">
                <a class="footer_lien" href="conditions.php">Conditions générales du site</a>
                <a class="footer_lien" href="">Vos informations personnelles</a>
            </div>
            <span>© 2024, UniShop</span>
        </div>            
    </footer>
</body>
</html>