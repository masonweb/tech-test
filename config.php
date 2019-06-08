<?php

    $dsn = "mysql:dbname=testemasonweb;host=localhost";
    $dbuser = "root";
    $dbpass = "";

    try{
        $pdo = new PDO($dsn,$dbuser,$dbpass);

        

    }catch(PDOException $e){
        echo "erro: ".$e->getMessage();
    }




?>