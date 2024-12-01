<?
    require_once("header02.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/conditions.css">
        <link rel="icon" href="../logos/logo-png.png" type="image/icon">
        <title>Coditions générales d'utilisation et de vente - Service client UniShop</title>
    </head>

    <body>
        <section class="affichage">
            <h1>Conditions générales d'utilisation et de vente</h1>
            <p>Dernière mise à jour le ...</p>

            <p>Bienvenue sur UniShop</p>
            <p>UniShop est un site de vente en ligne qui propose une gamme variée de produits disponibles à la vente en ligne. 
                Chaque produit est décrit de manière détaillée sur sa fiche produit. 
                Les photographies sont les plus fidèles possible mais ne peuvent garantir une parfaite ressemblance avec le produit final.
                Les utilisateurs peuvent vendre leurs produits en les mettant sur le site, sous réserve de respecter les conditions définies ci-après.
            </p>

            <hr>

            <h2>1. Inscriptions et accès</h2>
            <h3>1.1. Création de compte</h3>
            <p>Pour acheter ou vendre sur UniShop, l'utilisateur doit créer un compte en fournissant des information exactes et complètes. 
                L'utilisateur est seul responsable de la confidentialité de ses identifiants et de l'utilisation de son compte.
            </p>
            
            <h3>1.2 Accès en tant que vendeur</h3>
            <p>Pour proposer des produits à la vente, l'utilisateur doit activer le mode vendeur dans son compte et fournir les informations suivantes :</p>
            <ol>
                <li>Une </li>
            </ol>
            <p>UniShop se réserve le droit de vérifier ces informations et de refuser un accès vendeur en cas de non conformité.</p>

            <h2>2. Prix</h2>
            <p>Les prix affichés sur le site sont en euros (€) et incluant toutes taxes (TTC). 
                Les frais de livraisons sont précisées lors de la validation de la commande. 
                UniShop se réserve le droit de modifier ses prix à tout moment, mais les produits seront facturés sur la base des tarifs en vigueur au moemnt de la validation.
            </p>
            
            <h2>3. Commandes</h2>
            <p>Pour passer une commande, l'utilisateur doit :</p>
            <ul>
                <li>Sélectionner les produits souhaités et les ajouter au panier.</li>
                <li>Valider le contenu du panier.</li>
                <li>Remplir les informations de livraison et de facturation.</li>
                <li>Choisir un mode de paiement proposé et procéder au paiment.</li>
            </ul>
            <p>Toute commande est considérée comme ferme et définitive dès réception du paiement. 
                UniShop se réserve le droit d'annuler ou de refuser une commande en cas de litige avec le client.
            </p>

            <h2>4. Paiement</h2>
            <p>Le paiement peut être effectué par les moyens suivants :</p>
            <ol>
                <li>Carte bancaire(Visa, Mastercard, etc...)</li>
                <li>PayPal</li>
            </ol>
            <p>Les transactions sont sécurisées grâce à un protocole de cryptage (SSL) garantissant la confidentialité des données.</p>

            <h2>5. Livraison (pas de livraions juste pour faire genre)</h2>
            <h3>5.1 Délais de livraison</h3>
            <p>Les délais de livraison sont indiqués lors de la commande et peuvent varier en fonction du mode de livraison choisi. 
                UniShop ne surait être tenu responsable des retards causés par le transporteur.
            </p>
            
            <h3>5.2 Frais de livraison</h3>
            <p>Les frais de livraison sont clairement indiqués avant la validation de la commande.</p>

            <h3>5.3 Réception des produits</h3>
            <p>Le client doit vérifier l'état des produits lors de leur réception.
                En cas de dommages ou de produits manquants, le client doit informer UniShop sous 48 heures.
            </p>

            <h2>6. Droit de rétraction</h2>
            <p>
                Conformément à la législation en vigueur (Code de la consommation, article L221-18), le client dispose d'un délai de 14 jours à compter de la réception des produits pour exercer son droit de rétraction, 
                sauf exceptions prévues par la loi (produits personnalisés, périssables, etc...). 
                Pour exercer ce droit, le client doit informer UniShop par écrit (email ou courrier) et retourner les produits dans leur état d'origine à ses frais. Un remboursement sera effectué sous 14 jours après réception des produits retournés.
            </p>

            <h2>7. Garantie</h2>
            <p>Les produits bénéficient de la garantie légale de conformité (articles L217-4 et suivants du Code de la consommation) et de la garantie contre les vices cachés (article 1641 et suivants du Code civil). 
                En cas de défaut ou non-conformité, le client peut contacter UniShop pour une réparation, un remplacement ou un remboursement, selon les cas.
            </p>

            <h2>8. Responsabilité</h2>
            <p>
                UniShop ne peut être tenu responsable des dommages indirects liés à l'utilisation des produits. En cas de force majeur, UniShop ne saurait être tenu responsable de l'inexécution des obligations prévues par les CGV.
            </p>

            
        </section>

        <footer>
            <div class="return_top">
                <p id="retourHaut">Retour en haut</p>
                <script src="../js/fonction.js"></script>
            </div>

            <div class="logo_langue">
                <a href="index.php"><img src="../logos/logo-png.png" width="80" height="50"></a>
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