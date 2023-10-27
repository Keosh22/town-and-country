<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone-number"];
    $street_address = $_POST["street-address"];
    $phase = $_POST["phase"];
    $city = $_POST["city"];
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];


    try{
        require_once "dbh-inc.php";

        $query = "INSERT INTO users(firstname, lastname, email, contact_number, street_address, phase, city, username, pwd) VALUES(:firstname, :lastname, :email, :contact_number, :street_address, :phase, :city, :username, :pwd);";

        $statement = $pdo->prepare($query);

        $statement->bindParam(":firstname", $firstname);
        $statement->bindParam(":lastname", $lastname);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":contact_number", $phone_number);
        $statement->bindParam(":street_address", $street_address);
        $statement->bindParam(":phase", $phase);
        $statement->bindParam(":city", $city);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":pwd", $pwd);

        $statement->execute();

        $pdo = null;
        $statement = null;

        header("Location: ../admin-login/login.php");
    }
    catch (PDOException $e){
        die("Query failed" . $e->getMessage());
    }


}