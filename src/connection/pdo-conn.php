<?php 
    $dbname = "unishop";
    $dbuser = "root";
    $dbpassword = "root";
    $dbhost = "localhost";

    try {
        $pdo = new PDO("mysql:host=" .$dbhost .";dbname=" .$dbname, $dbuser, $dbpassword);
    } catch(PDOException $err) {
        echo "DataBase Connection Failed: " . $err->getMessage();
        exit();
    }
?>