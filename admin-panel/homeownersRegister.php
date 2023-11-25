<?php
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;



if (isset($_POST['register'])) {
  $account_number = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_SPECIAL_CHARS);
  $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
  $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
  $middle_initial = filter_input(INPUT_POST, 'middle_initial', FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $phone_number = filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_SPECIAL_CHARS);
  $blk = filter_input(INPUT_POST, 'blk', FILTER_SANITIZE_SPECIAL_CHARS);
  $lot = filter_input(INPUT_POST, 'lot', FILTER_SANITIZE_SPECIAL_CHARS);
  $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_SPECIAL_CHARS);
  $phase = filter_input(INPUT_POST, 'phase', FILTER_SANITIZE_SPECIAL_CHARS);
  $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);




  if (empty($firstname) && empty($lastname) && empty($middle_initial) && empty($email) && empty($phone_number) && empty($blk) && empty($lot) && empty($street) && empty($phase) && empty($username) && empty($password) && empty($confirm_password)) {
  } else {
    $query = "INSERT INTO homeowners_users (account_number, username, password, firstname, lastname, middle_initial, email, phone_number, blk, lot, street, phase, status ) VALUES (:account_number, :username, :password, :firstname, :lastname, :middle_initial, :email, :phone_number, :blk, :lot, :street, :phase, :status)";
    $data = [
      "account_number" => $account_number,
      "username" => $username,
      "password" => $password,
      "firstname" => $firstname,
      "lastname" => $lastname,
      "middle_initial" => $middle_initial,
      "email" => $email,
      "phone_number" => $phone_number,
      "blk" => $blk,
      "lot" => $lot,
      "street" => $street,
      "phase" => $phase,
      "status" => $status
    ];
    $path = "../admin-panel/homeowners.php";
    $server->register($query, $data, $path);
    $action = "Register homeowners account of ".$account_number.": ".$firstname."";
    $server->insertActivityLog($action);
  }
}
?>
