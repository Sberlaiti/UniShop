<?php
    require_once("header02.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    // On recuperer les elements du panier de l'utilisateur
    $sql_requete = "SELECT * FROM panier WHERE idUtilisateur = :idUtilisateur";
    $stmt = $pdo->prepare($sql_requete);
    $stmt->execute(['idUtilisateur' => $_SESSION['user']['idUtilisateur']]);
    $panier = $stmt->fetchAll();

    // On calcule le total du panier
    $total = 0;
    foreach($panier as $produit) {
        $sql_requete = "SELECT * FROM produit WHERE idProduit = :idProduit";
        $stmt = $pdo->prepare($sql_requete);
        $stmt->execute(['idProduit' => $produit['idProduit']]);
        $article = $stmt->fetch();
        $total += $article['prix'] * $produit['quantitee'];
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/paiement.css">
    <script src="https://kit.fontawesome.com/3b8e4ae998.js" crossorigin="anonymous"></script>
    <title>Paiement</title>
</head>
<body>
    <div class="container">
        <div class="container_payment">
            <h1>Paiement</h1>
            <p>Moyen de paiement</p>
            <div class="container_paymentMethod_other">
                <div class="paymentMethod" id="applePay">
                    <i class="fa-brands fa-apple-pay"></i>
                </div>
                <div class="paymentMethod" id="googlePay">
                    <i class="fa-brands fa-google-pay"></i>
                </div>
                <div class="paymentMethod" id="paypal">
                    <i class="fa-brands fa-paypal"></i>
                </div>
            </div>
            <p>ou utilisez votre carte bleu</p>
            <div class="container_paymentMethod_card">
                <form method="POST">
                    <div class="card_name">
                        <label for="cardName">Nom dans la carte</label>
                        <input type="text" name="cardName" class="cardInput" placeholder="John Doe">
                    </div>

                    <div class="card_number">
                        <label for="cardNumber">Numéro de la carte</label>
                        <input type="text" name="cardNumber" class="cardInput" placeholder="1234 5678 9101 1121" maxlength="19" inputmode="numeric" pattern="[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}">
                    </div>

                    <div class="card_date">
                        <label for="cardDate">Date d'expiration</label>
                        <input type="text" name="cardDate" class="cardInput" placeholder="MM/YY" maxlength="5">
                    </div>

                    <div class="card_cvv">
                        <label for="cardCVV">CVV</label>
                        <input type="text" name="cardCVV" class="cardInput" placeholder="123" maxlength="3">
                    </div>             
                </form>
                <div class="error">
                    <p class="error_message">Erreur : Date pas valide!!</p>
                </div>
            </div>
            <hr>
            <div class="subtotal">
                <p>Subtotal</p>
                <p><?php 
                    if ($_POST['total'] != null) {
                        echo $_POST['total'];
                    } else {
                        echo $total;
                    }
                 ?></p>
            </div>
            <button>Confirm</button>
        </div>
    </div>
    <script src="./js/paiement.js"></script>
</body>
</html>