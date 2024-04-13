<?php
require_once("./libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$userserver = new Server; // Open/Close connection
session_start();

if (isset($_GET['update_password'])) {
  if (isset($_GET['token_input']) && isset($_GET['homeowners_id_input']) && isset($_GET['email_address_input']) && isset($_GET['new_password']) && isset($_GET['confirm_password'])) {


    $token = $_GET['token_input'];
    $email = $_GET['email_address_input'];
    $id = filter_input(INPUT_GET, 'homeowners_id_input', FILTER_SANITIZE_SPECIAL_CHARS);
    $new_password = $_GET['new_password'];
    $confirm_password = $_GET['confirm_password'];
    $hash_password = password_hash($_GET['new_password'], PASSWORD_DEFAULT);

    if ($new_password == $confirm_password) {
      $query1 = "UPDATE homeowners_users SET password = :hash_password WHERE id = :id AND token = :token AND email = :email";
      $data1 = [
        "hash_password" => $hash_password,
        "id" => $id,
        "token" => $token,
        "email" => $email
      ];
      $connection1 = $userserver->openConn();
      $stmt1 = $connection1->prepare($query1);
      $stmt1->execute($data1);
      if ($stmt1->rowCount() > 0) {
       
        $_SESSION['status'] = "Success!";
        $_SESSION['text'] = "Your password has been changed successfuly";
        $_SESSION['status_code'] = "success";
        
        header("location: index.php");
        unset($_SESSION['token_verify']);
        unset($_SESSION['forgot_password_timestamp']);
     
      } else {
        $_SESSION['status'] = "Error!";
        $_SESSION['text'] = "Something went wrong";
        $_SESSION['status_code'] = "error";
      }
    }
  }
}

?>