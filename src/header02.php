<?php 
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('connection/pdo-conn.php');

    // Initialisation des variables de session
    if(!isset($_SESSION['user'])) $_SESSION['user'] = null;

    //Récupération des valeurs des catégories dans la BDD
    $sql = "SELECT nomCategorie, idCategorie
            FROM categorie
            ORDER BY nomCategorie";
    $result = $pdo->query($sql);

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
            <h1><a href="index.php">UniShop</a></h1>

            <section class="navSection">
                <nav>
                    <ul>
                        <li id="menu_item">
                            <a href="produits.php">Catalog</a>
                            <div class="liste_deroulante">
                                <ul>
                                    <?php
                                        foreach($result as $row){
                                            echo "<li class='liste'><a href='produits.php?idCategorie=" . $row['idCategorie'] . "'>" . $row['nomCategorie'] . "</a></li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <?php
                            $sql_requete = "SELECT idCategorie
                                            FROM categorie
                                            WHERE nomCategorie = 'Promotions'";
                            $stmt = $pdo->query($sql_requete);

                            echo "<a href='produits.php?idCategorie=" . $stmt->fetch()['idCategorie'] . "'>Sale</a>";
                            ?>
                        </li>
                        <?php if($_SESSION['user'] != null) { ?>
                                <li><a href="game.php">Games</a></li>
                                <li><a href="contact.php">Contact</a></li>
                        <?php }
                            else{
                                echo '<li><a href="login.php">Games</a></li>';
                                echo '<li><a href="login.php">Contact</a></li>';
                            }
                        ?>
                        <li><a href="others.php">Others</a></li>
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
                        <a href="profile.php">
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