<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once("header02.php");
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/profile.css"/>
    <!-- Pour utiliser FontAwesome (Icônes) -->
    <script src="https://kit.fontawesome.com/3b8e4ae998.js" crossorigin="anonymous"></script>
    <title>Profile</title>
</head>
<body>
    <div class="nav">
        <a href="others.php" class="retour"><i class="fas fa-arrow-left"></i> Others</a>
        <span>&gt;</spac>
        <span class="titre_cond">Profil</span>
    </div>
    <div class="container_Profile">
        <?php if($_SESSION['user'] != null) { ?>
        <div class="container_Menu">
                <h2>MENU</h2>
                <button onclick="showSection('profile')">
                    <div id="profile" class="menu_Profile" onclick="highlight(this)">
                        <a href="profile.php" class="menu_Profile"> <i class="fa-solid fa-gear"></i>Profile</a>
                    </div>
                </button>
                <button onclick="showSection('orders')">
                    <div id="orders" class="menu_Orders" onclick="highlight(this)">
                        <a href="orders.php" class="menu_Orders"><i class="fa-solid fa-box"></i>Orders</a>
                    </div>
                </button>

                <?php if($_SESSION['user']['estVendeur'] == 1) { ?>
                    <button onclick="showSection('dashboard')">
                        <div class="menu_Dashboard" onclick="highlight(this)">
                            <a href="dashboard.php" class="dashboard"><i class="fa-solid fa-chart-simple"></i>oDashboard</a>
                        </div>
                    </button>
                <?php } ?>

                <?php if($_SESSION['user']['admin'] == 1) { ?>
                    <button onclick="showSection('admin')">
                        <div class="menu_Admin" onclick="highlight(this)">
                            <a href="admin.php" class="menu_Admin"><i class="fa-solid fa-user-tie"></i>Admin</a>
                        </div>
                    </button>
                <?php } ?>
        </div>

        <div class="container_Info">
            <div class="info_Profile section">
                <div class="info_Profile_1">
                    <img src="./images/italianFlag.png" alt="UserLogo">
                    <p><?php echo $_SESSION['user']['pseudo'] ?></p>
                    
                    <button class="logout">Log Out</button>
                </div>

                <hr>

                <div class="info_Profile_2">
                    <div class="firstName_Zone">
                        <h2>Prenom : </h2>  <p><?php echo $_SESSION['user']['prenom'] ?></p>
                    </div>
                    <div class="lastName_Zone">
                        <h2>Nom : </h2> <p><?php echo $_SESSION['user']['nom'] ?></p>
                    </div>
                    <div class="email_Zone">
                        <h2>Email : </h2> <p> <?php echo $_SESSION['user']['mail'] ?> </p>
                    </div>

                    <div class="adress_Zone">
                        <h2>Adresse : </h2> <p> <?php echo $_SESSION['user']['adresse'] ?> </p>
                    </div>

                    <div class="telephone_Zone">
                        <h2>Téléphone : </h2> <p> <?php echo $_SESSION['user']['telephone'] ?> </p>
                    </div>


                </div>
            </div>

            <div class="info_Orders section hidden">
                <h2>Orders</h2>
                <div class="order">
                    <div class="order_1">
                        <h3>Order Number : </h3> <p>1</p>
                    </div>
                    <div class="order_2">
                        <h3>Order Date : </h3> <p>01/01/2021</p>
                    </div>
                    <div class="order_3">
                        <h3>Order Status : </h3> <p>Delivered</p>
                    </div>
                    <div class="order_4">
                        <h3>Order Total : </h3> <p>100€</p>
                    </div>
            </div>
        </div>

        <?php } else {?>
            <h1 class="notConnected">Vous n'êtes pas connecté</h1>
        <?php } ?>
    <script src="./js/profile.js"></script>
</body>
</html>