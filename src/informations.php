<?php
    require_once("header02.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="./css/conditions.css">
        <link rel="icon" href="../logos/logo-png.png" type="image/icon">
        <title>Vos informations personnelles - UniShop</title>
    </head>

    <body>
        <br>

        <section class="main_section">
            <div id="acces_rapide">
                <h2 id="title_acces">Accès rapide</h2>
                <p class="titre_acces" data-target="1">1. Donnéee collectives</p>
                <p class="titre_acces" data-target="2">2. Utilisation de vos données</p>
                <p class="titre_acces" data-target="3">3. Partage des informations</p>
                <p class="titre_acces" data-target="4">4. Protection de vos données</p>
                <p class="titre_acces" data-target="5">5. Vos droits</p>
                <p class="titre_acces" data-target="6">6. Durée de conservation des données</p>
                <p class="titre_acces" data-target="7">7. Modification de cette politique</p>
            </div>

            <div class="affichage">
                <h1>Vos informations personnelles - UniShop</h1>
                <p>Chez UniShop, nous attachons une grande importance à la confidentialité et à la protection de vos informations personnelles. 
                    Que vous soyez acheteur ou vendeur particulier sur notre plateforme, nous nous engageons à garantir la sécurité et la transparence concernant l’utilisation de vos données.
                </p>

                <hr>

                <h2 id="1">1. Données collectées</h2>
                <p>
                    Lorsque vous créez un compte ou interagissez avec notre plateforme, nous pouvons collecter les informations suivantes :
                </p>
                <ul>
                    <li>Informations d'inscription : nom, prénom, adresse e-mail, mot de passe.</li>
                    <li>Informations de profil vendeur (pour les utilisateurs souhaitant vendre) : coordonnées bancaires pour les paiements, adresse postale pour la gestion des livraisons.</li>
                    <li>Informations sur vos transactions : historique des achats et ventes, montant des transactions, communications entre acheteurs et vendeurs.</li>
                    <li>Données techniques : adresse IP, type d’appareil, informations de navigation.</li>
                </ul>

                <h2 id="2">2. Utilisation de vos données</h2>
                <p>Vos informations personnelles sont utlisées pour :</p>
                <ul>
                    <li>Créer et gérer votre compte utilisateur.</li>
                    <li>Faciliter vos transactions (achats ou ventes) en toute sécurité.</li>
                    <li>Protéger notre plateforme contre les fraudes et activités non autorisées.</li>
                    <li>Améliorer l’expérience utilisateur et personnaliser les contenus affichés.</li>
                    <li>Respecter nos obligations légales et réglementaires.</li>
                </ul>

                <h2 id="3">3. Partage de vos informations</h2>
                <p>
                    UniShop s'engage à ne pas vendre vos données personnelles. 
                    Nous ne partageons vos informations qu’avec :
                </p>
                <ul>
                    <li>Nos partenaires de service (systèmes de paiement, prestataires de livraison) uniquement pour exécuter vos transactions.</li>
                    <li>Les autorités compétentes si cela est requis par la loi.</li>
                </ul>

                <h2 id="4">4. Protection de vos données</h2>
                <p>
                    Nous utilisons des mesures de sécurité avancées pour protéger vos données contre tout accès non autorisé, perte ou altération. 
                    Ces mesures incluent le cryptage des informations sensibles, la limitation des accès et la surveillance régulière de nos systèmes.
                </p>

                <h2 id="5">5. Vos droits</h2>
                <p>
                    Conformément à la réglementation en vigueur (RGPD), vous disposez des droits suivants :
                </p>
                <ul>
                    <li>Accès à vos données personnelles.</li>
                    <li>Modifier ou supprimer vos informations.</li>
                    <li>Limiter ou vous opposer à certains traitements de vos données.</li>
                    <li>Porter plainte auprès de l’autorité compétente en matière de protection des données si vous estimez que vos droits ne sont pas respectés.</li>
                </ul>

                <h2 id="6">6. Durée de conservation des données</h2>
                <p>
                    Nous conservons vos informations personnelles aussi longtemps que nécessaire pour fournir nos services ou pour répondre à nos obligations légales. 
                    Lorsque vos données ne sont plus nécessaires, nous les supprimons de manière sécurisée.
                </p>

                <h2 id="7">7. Modification de cette politique</h2>
                <p>
                    UniShop se réserve le droit de mettre à jour cette politique à tout moment pour refléter les évolutions légales ou technologiques. Nous vous informerons en cas de modifications importantes.<br>
                    En utilisant notre plateforme, vous acceptez les termes de cette politique de confidentialité. 
                    Si vous avez des questions ou préoccupations, n’hésitez pas à nous écrire.
                </p>
            </div>
        </section>
        <h1 id="confiance">UniShop - La confiance au coeur de vos transactions !</h1>

        <footer>
            <?php require_once("footer.php"); ?>       
        </footer>
        <script src="./js/conditions.js"></script>  
    </body>
</html>