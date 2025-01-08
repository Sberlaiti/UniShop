<?php
    require_once("header02.php");
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //Début de la fonction pour envoyer un mail
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if(!isset($_SESSION['user'])) $_SESSION['user'] = null;

    $sql_requete = "SELECT mail FROM utilisateur WHERE idUtilisateur = ?";
    $stmt = $pdo->prepare($sql_requete);
    $stmt->execute([$_SESSION['user']['idUtilisateur']]);
    $userMail = $stmt->fetch(PDO::FETCH_ASSOC)['mail'];

    require './PHPMailer-master/src/Exception.php';
    require './PHPMailer-master/src/PHPMailer.php';
    require './PHPMailer-master/src/SMTP.php';

    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $objet = filter_input(INPUT_POST, 'objet', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $btn = filter_input(INPUT_POST, 'envoyer', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $messageEnvoye = false;

    if(isset($btn)) {
        $mail = new PHPMailer(true);
        try {
            // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Serveur SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'aunishop786@gmail.com'; // Adresse email SMTP
            $mail->Password = 'xuqbmxmukupigbbn'; // Mot de passe SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
    
            // Destinataires
            $mail->setFrom($userMail, $nom . ' ' . $prenom, $userMail); // Adresse de l'expéditeur
            $mail->addAddress('aunishop786@gmail.com'); // Adresse de destination
    
            // Contenu de l'email
            $mail->isHTML(false);
            $mail->Subject = $objet;
            $mail->Body = "Nom: " . $nom . "\nPrénom: " . $prenom . "\nEmail: " . $email . "\n\nMessage:\n" . $message;
    
            $mail->send();
            $messageEnvoye = true;
        } catch (Exception $e) {
            echo "Une erreur s'est produite lors de l'envoi du message : {$mail->ErrorInfo}";
        }
    }
    //Fin de l'envoi du mail
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="./css/contact.css">
        <link rel="icon" href="../logos/logo-png.png" type="image/icon">
        <title>Prendre contact - UniShop</title>
    </head>

    <body>
        <?php if($messageEnvoye): ?>
            <div class="container_reussite">
                <h1 class="title">Service client</h1>
                <p class="reussite">
                    Votre message a bien été envoyé et nous vous répondrons dans les plus brefs délais.<br>
                    Nous apprécions votre patience et votre confiance en notre service.<br>
                    Cordialement, l'équipe UniShop. <?php echo $userMail; ?>
                </p>
            </div>
        <?php else: ?>
            <p id="description">! Veuiller remplir ce formulaire afin de répondre à votre question ou bien votre réclamation dans de bonnes conditions et dans les meilleurs délais !</p>    
            <div class="contact_container">
                <h1 class="title">Service client</h1>
                <div class="contact">
                    <form action="contact.php" method="POST">
                        <div class="row">
                            <input type="text" id="nom" name="nom" required placeholder="Last name"/>
                            <input type="text" id="prenom" name="prenom" required placeholder="First name"/>
                        </div>

                        <input type="text" id="objet" name="objet" required placeholder="Title of your object"/>

                        <input type="email" id="email" name="email" required placeholder="Your email address"/>

                        <textarea id="message" name="message" required placeholder="Your message..."></textarea>

                        <button id="envoyer" name="envoyer">Envoyer</button>
                    </form>
        <?php endif; ?>
                 </div>
            </div>

        <br>

        <footer>
            <?php require_once("footer.php"); ?>
        </footer>
        <script src="./js/contact.js"></script>
    </body>
</html>