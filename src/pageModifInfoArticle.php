<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./connection/pdo-conn.php');

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

if ($utilisateur['estVendeur'] != 0 || $produit['idUtilisateur'] != $idUtilisateur) {
    echo "Vous n'êtes pas autorisé à modifier cet article.";
    exit();
}

$requeteImages = $pdo->prepare("SELECT * FROM image WHERE idProduit = ?");
$requeteImages->execute([$idProduit]);
$images = $requeteImages->fetchAll();

// Récupérer les informations actuelles de l'article
$stmt = $pdo->prepare("SELECT nomProduit, description, prix, delayLivraison, idImage FROM produit WHERE idProduit = ?");
$stmt->execute([$idProduit]);
$article = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomProduit = $_POST['nomProduit'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $delayLivraison = $_POST['delayLivraison'];

    // Mettre à jour les autres informations de l'article
    $stmt = $pdo->prepare("UPDATE produit SET nomProduit = ?, description = ?, prix = ?, delayLivraison = ? WHERE idProduit = ?");
    $stmt->execute([$nomProduit, $description, $prix, $delayLivraison, $idProduit]);

    // Vérifier si de nouvelles images ont été uploadées
    foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
        if ($_FILES['images']['error'][$index] == 0) {
            $image_name = basename($_FILES['images']['name'][$index]);
            $cible = "../articles/";
            $cible_file = $cible . uniqid() . "_" . $image_name;

            $imageFileType = strtolower(pathinfo($cible_file, PATHINFO_EXTENSION));
            $allowed_type = ['jpg', 'jpeg', 'png'];
            if (!in_array($imageFileType, $allowed_type)) {
                echo "Fichier non accepté.";
            } else {
                if (move_uploaded_file($tmpName, $cible_file)) {
                    // Enregistrer le chemin de l'image dans la table `image`
                    $stmt = $pdo->prepare("UPDATE image SET lien = ? WHERE idImage = ?");
                    $stmt->execute([$cible_file, $images[$index]['idImage']]);
                } else {
                    echo "Erreur de l'upload de l'image.";
                }
            }
        }
    }

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
        <form method="post" enctype="multipart/form-data" class="formulaire">
            <div class="image">
                <label for="images">Images du produit (5 maximum) :</label>
                <table>
                    <?php foreach ($images as $index => $image): ?>
                        <tr>
                            <td>
                                <img src="<?php echo htmlspecialchars($image['lien']); ?>" alt="Image produit" width="100">
                            </td>
                            <td>
                                <?php echo htmlspecialchars($image['idImage']); ?>
                            </td>
                            <td>
                                <input type="file" name="images[<?php echo $index; ?>]" accept="images/*">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (count($images) < 5): ?>
                        <tr>
                            <td colspan="3">
                                <input type="file" name="images[<?php echo count($images); ?>]" accept="image/*">
                            </td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
            <div class="infos">
                <label for="nomProduit">Nom du produit :</label>
                <input type="text" id="nomProduit" name="nomProduit" value="<?php echo htmlspecialchars($article['nomProduit']); ?>" required>

                <label for="description">Description :</label>
                <textarea id="description" name="description" required><?php echo htmlspecialchars($article['description']); ?></textarea>

                <label for="prix">Prix :</label>
                <input type="number" id="prix" name="prix" value="<?php echo htmlspecialchars($article['prix']); ?>" required>

                <label for="delayLivraison">Délai de livraison (jours) :</label>
                <input type="number" id="delayLivraison" name="delayLivraison" value="<?php echo htmlspecialchars($article['delayLivraison']); ?>" required>

                <div class="button">
                    <button type="submit">Modification du produit terminé</button>
                </div>
            </div>
        </form>
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