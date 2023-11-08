<!-- SERVER -->
<?php
require_once("../libs/server.php");
session_start();
?>


<?php

$server = new Server;

if (isset($_POST['update_info'])) {

  $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
  $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $phone = $_POST['phone_number'];
  $id = $_SESSION['user_id'];

  

  if (!empty($firstname) || !empty($lastname) || !empty($email) || !empty($phone)) {

    $query = "UPDATE admin_users SET firstname = :firstname, lastname = :lastname, email = :email, phone_number = :phone_number  WHERE id = :id";
    $data = [
      "firstname" => $firstname,
      "lastname" => $lastname,
      "email" => $email,
      "phone_number" => $phone,
      "id" => $id
    ];
    $path = "../admin-panel/profile.php";

    $server->update($query, $data, $path);

  } else {
  }
}


?>