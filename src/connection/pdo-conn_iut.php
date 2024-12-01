<?php 
    $dbname = "p2311763";
    $dbuser = "p2311763";
    $dbpassword = "728965";
    $dbhost = "iutdoua-web.univ-lyon1.fr";

    try {
        $pdo= new PDO("mysql:host=" .$dbhost .";dbname=" .$dbname, $dbuser, $dbpassword);
    } catch(PDOException $err) {
        echo "DataBase Connection Failed: " . $err->getMessage();
        exit();
    }
?>