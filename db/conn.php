<?php
    $host='remotemysql.com';
    $db = 'LameCF7Tti';
    $user = 'LameCF7Tti';
    $pass = 'FySlLIPA47';
    $charset = 'utf8mb4';
    
    
    //$host='127.0.0.1';
    //$db = 'attendance_db';
   // $user = 'root';
    //$pass = '';
    //$charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{

        $pdo = new PDO($dsn, $user, $pass);
        //echo 'The Link Set';

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    }catch(PDOException $e) {
        throw new PDOException ($e ->getMessage());
        //echo"<h1 class='text-danger'>The Link Shaky... No Database found</h1>";
        

    }
    require_once 'crud.php';
    $crud = new crud($pdo);




?>