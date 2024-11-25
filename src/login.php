<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('./header02.php');


    // Transferer ce code dans une fonction PHP qui prend en parametre le mail et le MDP + hachage
    // Faire la même chose avec la fonction de création de compte
    // Faire la même chose pour signout

    // On verifie si l'utiilisateur a tapé quelque chose (email et password) et si c'est un mail
    if(isset($_POST["email"]) && isset($_POST["password"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email_User'] = strtolower($_POST["email"]);
        $_SESSION['password_User'] = $_POST["password"];

        // On cherche si le compte existe
        $research_email = "SELECT COUNT(*) FROM user WHERE email = '" .$_SESSION['email_User'] ."'";
        $already_SignUp = $pdo->query($research_email);
        $already_SignUp = $already_SignUp->fetchColumn();
                
        // Si le compte n'existe pas on le crée
        if (!$already_SignUp) {
            header('Location: pseudo.php');
        } else {
            $get_Password = "SELECT mdp FROM user WHERE email = '" .$_SESSION['email_User'] ."'";
            $get_Password = $pdo->query($get_Password);
            $get_Password = $get_Password->fetchColumn();

            // On verifie si le mot de passe correspond
            if($get_Password == $_SESSION['password_User']) {
                $research_id = "SELECT idUser FROM user WHERE email = '" .$_SESSION['email_User'] ."'";
                $research_id = $pdo->query($research_id);
                $research_id = $research_id->fetchColumn();
                    
                $_SESSION['idUser'] = $research_id;
                $_SESSION['login'] = true;
                    
                // On verifie si l'utilisateur est admin
                $admin = "SELECT admin FROM user WHERE email = '" .$_SESSION['email_User'] ."'";
                $admin = $pdo->query($admin);
                $admin = $admin->fetchColumn();
                if($admin) $_SESSION['admin'] = true;
                    header('Location: index.php');
                } else {
                    echo "Mot de passe incorrect";
                }
            } 
        } else if (isset($_POST['email'])) {
            echo "Veuillez entrer un email valide";
        }


    // var_dump($panier);
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/login.css"/>
    <!-- Pour utiliser FontAwesome (Icônes) -->
    <script src="https://kit.fontawesome.com/3b8e4ae998.js" crossorigin="anonymous"></script>
    <title>Panier</title>
</head>
<body>
    <div class="containerLogin">
        <h1>Sign Up / Sign In</h1>
        
        <div class="containerLoginForm">
            <form action="login.php" method="POST">
                <input id="email-box" class="box" type="text" name="email" required placeholder="E-mail"/> <br />
                <input id='password-box' class='box' type='password' name="password" required placeholder='Password'/> <br />
                <input id='button_Seconnecter' class="button" type='submit' value='Sign In'/>
            </form>
        </div>
    </div>
</body>
</html>