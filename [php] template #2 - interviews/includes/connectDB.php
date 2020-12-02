<?php
    // ---- includes ----
    require_once 'functions.php';
    require_once 'config.php';
    // ------------------


    // Exception Headling: connect to Database
    try{
        $dsn = 'mysql:host=localhost;dbname=interview';
        $pdo = new PDO($dsn, 'mysql', 'mysql');

    }catch(PDOException $e){
        echo 'Соединение оборвалось: ' . $e->getMessage();
        exit;
    }



?>