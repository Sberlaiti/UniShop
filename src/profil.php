<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('connection/pdo-conn.php');
    require_once('header02.php');
?>


<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/profil.css"/>
    <!-- Pour utiliser FontAwesome (Icônes) -->
    <script src="https://kit.fontawesome.com/3b8e4ae998.js" crossorigin="anonymous"></script>
    <title>Profil</title>
</head>
<body>
        <div class="container">
            <div class="containerProfile">
                <!-- Récupérer l'image profil de l'utilisateur -->
                <img src="./images/frenchFlag.png" alt="">
                <p>Profil</p>
                <div class="personalInformation">
                    
                </div>
            </div>
                      
        </div>
    
</body>
</html>