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
    <div class="container_Profile">
        <?php if($_SESSION['user'] != null) { ?>
        <div class="container_Menu">
                <h2>MENU</h2>
                <div class="menu_Profile" onclick="highlight(this)">
                    <a href="profile.php" class="menu_Profile"> <i class="fa-solid fa-gear"></i>Profile</a>
                </div>
                <div class="menu_Orders" onclick="highlight(this)">
                    <a href="orders.php" class="menu_Orders"><i class="fa-solid fa-box"></i>Orders</a>
                </div>

                <?php if($_SESSION['user']['estVendeur'] == 1) { ?>
                    <div class="menu_Dashboard" onclick="highlight(this)">
                        <a href="dashboard.php" class="dashboard"><i class="fa-solid fa-chart-simple"></i>oDashboard</a>
                    </div>
                <?php } ?>

                <?php if($_SESSION['user']['admin'] == 1) { ?>
                    <div class="menu_Admin" onclick="highlight(this)">
                        <a href="admin.php" class="menu_Admin"><i class="fa-solid fa-user-tie"></i>Admin</a>
                    </div>
                <?php } ?>
        </div>

        <div class="container_Info">
            <div class="info_Profile">
                <div class="info_Profile_1">
                    <img src="./images/italianFlag.png" alt="UserLogo">
                    <p><?php echo $_SESSION['user']['pseudo'] ?></p>
                    <button>Log Out</button>
                </div>
                <div class="info_Profile_2">
                    <div class="firstName_Zone">
                        <h2>First Name : </h2>  <p><?php echo $_SESSION['user']['prenom'] ?></p>
                    </div>
                    <div class="lastName_Zone">
                        <h2>Last Name : </h2> <p><?php echo $_SESSION['user']['nom'] ?></p>
                    </div>
                    <div class="email_Zone">
                        <h2>Email : </h2> <p> <?php echo $_SESSION['user']['mail'] ?> </p>
                    </div>
                </div>
            </div>
        <?php } else {?>
            <h1 class="notConnected">Vous n'êtes pas connecté</h1>
        <?php } ?>
    </div>
    <script src="./js/profile.js"></script>
</body>
</html>