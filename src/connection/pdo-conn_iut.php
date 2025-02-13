<?php 
    $dbname = "p2301446";
    $dbuser = "p2301446";
    $dbpassword = "719724";
    $dbhost = "iutdoua-web.univ-lyon1.fr";

    try {
        $pdo= new PDO("mysql:host=" .$dbhost .";dbname=" .$dbname, $dbuser, $dbpassword);
    } catch(PDOException $err) {
        echo "DataBase Connection Failed: " . $err->getMessage();
        exit();
    }
?>