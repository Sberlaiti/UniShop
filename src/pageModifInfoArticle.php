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
        <form method="post" enctype="multipart/form-data" class="formulaire">
            <div class="image">
                <label for="images">Images du produit (5 maximum) :</label>
                <input type="file" name="images[]" id="images" multiple accept="image/*">
            </div>
            <div class="infos">
                <label for="nomProduit">Nom du produit :</label>
                <input type="text" id="nomProduit" name="nomProduit" required>

                <label for="description">Description :</label>
                <textarea id="description" name="description" required></textarea>

                <label for="prix">Prix :</label>
                <input type="number" step="0.01" id="prix" name="prix" required>

                <label for="delayLivraison">Délai de livraison (jours) :</label>
                <input type="number" id="delayLivraison" name="delayLivraison" required>

                <div class="button">
                    <button type="submit">Ajouter le produit</button>
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