<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('./header02.php');
    require_once('./php/signIN_Functions.php');
    require_once('./php/signUp_Functions.php');


    // On utilise la fonction login pour connecter l'utilisateur
    $signIN_error= 0;
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signIN'])) {
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
        if (login($email, $password, $pdo)) {
            header('Location: header.php');
            exit;
        } else {
            $signIN_error = -1;
        }
    }

    // On utilise la fonction createUser pour créer un utilisateur
    $signUP_error = 0;
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signUP'])) {
        $name = $_POST['name'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $pseudo = $_POST['pseudo'];
    
        switch (createUser($name, $firstname, $email, $password, $pseudo, $pdo)) {
            case -1:
                $signUP_error = -1;
                break;
            case -2:
                $signUP_error = -2;
                break;
            case 1:
                login($email, $password, $pdo);
                header('Location: header.php');
        exit;
        }
    }

    // TODO: Modifier la base de donnée pour donner una valeur automatique à l'id

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
    <div class="container_SignIn">
        <h1>Sign In</h1>
        
        <div class="container_SignIn_Form">
            <form action="login.php" method="POST">
                <input id="email-box" class="box" type="text" name="email" required placeholder="E-mail"/> <br />
                <input id='password-box' class='box' type='password' name="password" required placeholder='Password'/> <br />
                <input id='signIN_button' class="button" name="signIN" type='submit' value='Sign In'/>
            </form>

            <div class="error">
                <?php if($signIN_error == -1) { ?>
                    <p>Invalid email or password</p>
                <?php } ?>
            </div>
        </div>

        <div class="go_to_SignUp">
            <button>Don't have an account ?</button>
        </div>
    </div>


    <div class="container_SignUp">
        <h1>Sign Up</h1>

        <div class="container_SignUp_Form">
            <form action="login.php" method="POST">
                <input id="name-box" class="box" type="text" name="name" required placeholder="Nom"/> <br />
                <input id="firstname-box" class="box" type="text" name="firstname" required placeholder="First Name"/> <br />
                <input id="email-box" class="box" type="text" name="email" required placeholder="E-mail"/> <br />
                <input id='password-box' class='box' type='password' name="password" required placeholder='Password'/> <br />
                <input id="pseudo-box" class="box" type="text" name="pseudo" required placeholder="Pesudo"/> <br />
                <input id='signUP_button' class="button" name="signUP" type='submit' value='Sign Up'/>
            </form>
        </div>
        
        <div class="error">
                <?php if($signUP_error == -1) { ?>
                            <p>E-mail déjà utilisé</p>
                <?php } else if($signUP_error == -2) {?>
                            <p>Pseudo déjà utilisé</p>
                <?php } ?>
            </div>

        <div class="go_to_SignIn">
            <button>Already have an account ?</button>
        </div>
    </div>
</body>
</html>