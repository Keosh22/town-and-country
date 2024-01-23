<?php
require_once "../libs/server.php";
session_start();


$server = new Server;

if(isset($_POST["update_info"])){
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
    $middle_initial = filter_input(INPUT_POST, 'middle_initial', FILTER_SANITIZE_SPECIAL_CHARS);
    $middle_initial_format = strtoupper($middle_initial) . ".";
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = $_POST['phone_number'];
    $id = $_SESSION['user_id'];

    if (!empty($firstname) || !empty($lastname) || !empty($email) || !empty($phone)) {
    
        $query = "UPDATE homeowners_users SET firstname = :firstname, lastname = :lastname, middle_initial = :middle_initial, email = :email, phone_number = :phone_number  WHERE id = :id";
        $data = [
          "firstname" => $firstname,
          "lastname" => $lastname,
          "middle_initial" => $middle_initial_format,
          "email" => $email,
          "phone_number" => $phone,
          "id" => $id
        ];
        $path = "../user/profile.php";
    
        $_SESSION['status'] = "Update Success!";
        $_SESSION['text'] = "Your account has been updated successfully.";
        $_SESSION['status_code'] = "success";
    
        $server->update($query, $data, $path);
    }
    else{
    }
    
}



?>