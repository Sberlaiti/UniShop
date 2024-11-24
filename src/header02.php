<?php 
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('connection/pdo-conn.php');

?>


<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/header02.css"/>
    <!-- Pour utiliser FontAwesome (Icônes) -->
    <script src="https://kit.fontawesome.com/3b8e4ae998.js" crossorigin="anonymous"></script>
    <title>Header</title>
</head>
<body>
    <header>
        <div class="headerContainer">
            <h1> UniShop </h1>

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

                <a href="">
                    <div class="accountButton">
                        <img src="./images/italianFlag.png" alt="UserLogo"><p>Ilyas</p>
                    </div>
                </a>

                <a href="panier.php">
                    <div class="cartButton">
                        <i class="fa-solid fa-shopping-cart"></i>
                    </div>
                </a>
            </section>
        </div>


        <script src="./js/header.js"></script>
    </header>
</body>
</html>