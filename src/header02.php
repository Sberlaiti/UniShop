<?php 
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('connection/pdo-conn.php');

    // Initialisation des variables de session
    if(!isset($_SESSION['user'])) $_SESSION['user'] = null;

?>

<html lang="fr">
<head>
    <link rel="icon" href="../logos/logo-png.png" type="image/icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/header02.css"/>
    <!-- Pour utiliser FontAwesome (Icônes) -->
    <script src="https://kit.fontawesome.com/3b8e4ae998.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="headerContainer">
            <a href="index.php"><h1>UniShop</h1></a>

            <section class="navSection">
                <nav>
                    <ul>
                        <li><a href="">Catalog</a></li>
                        <li><a href="">Sale</a></li>
                        <li><a href="">Games</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href="">Others</a></li>
                    </ul>
                </nav>
            </section>

            <section class="options">
                <div class="searchBar">
                    <input type="text" placeholder="Search...">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>

                
                <div class="accountButton">
                    <?php if($_SESSION['user'] == null) {?>
                        <a href="login.php">
                            <i class="fa-solid fa-user"></i>
                            <p>Sign In</p>
                    <?php } else { ?>
                        <a href="profil.php">
                            <img src="./images/italianFlag.png" alt="UserLogo"><p><?php echo $_SESSION['user']['nom'] ?></p>
                    <?php } ?>
                    </a>
                </div>


                <div class="cartButton">
                    <?php if($_SESSION['user'] == null) {?>
                        <a href="login.php">
                    <?php } else { ?>
                        <a href="panier.php"> 
                    <?php } ?>
                    <i class="fa-solid fa-shopping-cart"></i>
                    </a>
                </div>
            </section>
        </div>


        <script src="./js/header.js"></script>
    </header>
</body>
</html>