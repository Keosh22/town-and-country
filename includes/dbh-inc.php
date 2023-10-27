<?php

// creating data source name


// take note, I have a different port configuration on my pc. 
// baguhin niyo to if hindi port 3308 gamit niyo
// default is 3307
$dsn = "mysql:host=localhost; port=3308; dbname=tch";

$dbusername = "lesthuuur";
$dbpassword = "lesthuuur23";

try{

    // $pdo = php database object
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo "Connection Fail: " . $e->getMessage();
}

