<?php

// creating data source name

$dsn = "mysql:host=localhost; port=3308; dbname=practice";
$dbusername = "lesthuuur";
$dbpassword = "lesthuuur23";

try{

    // $pdo = php database object
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo "Connection Fail: " . $e->getMessage();
}

