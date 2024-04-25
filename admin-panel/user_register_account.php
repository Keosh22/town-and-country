<?php
// Server
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;
if (isset($_POST['register'])) {
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $confirm_password = $_POST['confirm_password'];
  $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
  $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $phone_number = $_POST['phone_number'];
  // $filename = $_FILES["photo"]["name"];
  // $tmpName = $_FILES["photo"]["tmp_name"];


  // Username Validation
  // $queryUsername = "SELECT * FROM admin_users WHERE username = :username";
  // $dataUsername = ["username" => $username];
  // $path = "../admin-panel/user.php";
  // $result = $server->checkUsername($queryUsername, $dataUsername, $path);










  if (empty($username) && empty($password) && empty($confirm_password) && empty($firstname) && empty($email) && empty($email) && empty($phone_number)) {
  }

  // if (empty($username) || empty($password) || empty($firstname) || empty($lastname) || empty($email) || empty($phone_number)) {


  // } 
  else {

    $query1 = "SELECT email FROM admin_users WHERE email = :email LIMIT 1";
    $data1 = ["email" => $email];
    $connection1 = $server->openConn();
    $stmt1 = $connection1->prepare($query1);
    $stmt1->execute($data1);
    if ($stmt1->rowCount() > 0) {
      $_SESSION['status'] = "Register Failed!";
      $_SESSION['text'] = "Email already exist";
      $_SESSION['status_code'] = "error";
      header("location: ../admin-panel/user.php");
    } else {

      // Account Number generator
      $queryAccountNumber = "SELECT * FROM admin_users ORDER BY account_number DESC LIMIT 1";
      $connection = $server->openConn();
      $stmt = $connection->prepare($queryAccountNumber);
      $stmt->execute();

      if ($rowCount = $stmt->rowCount() > 0) {
        if ($row = $stmt->fetch()) {
          // ADM001
          $id = $row['account_number'];
          // 001
          $get_number = str_replace("ADM", "", $id);
          // 001 + 1 = 2
          $id_increment = $get_number + 1;
          // Add 0 to the left max. 3 digits
          $get_string = str_pad($id_increment, 3, 0, STR_PAD_LEFT);

          $account_number = "ADM" . $get_string;

          // Insert data 
          $query = "INSERT INTO admin_users (account_number,username,password,firstname,lastname,email,phone_number) VALUES (:account_number, :username, :password, :firstname, :lastname, :email, :phone_number)";

          $data = [
            "account_number" => $account_number,
            "username" => $username,
            "password" => $password,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "email" => $email,
            "phone_number" => $phone_number
          ];

          $path = "../admin-panel/user.php";

          $server->register($query, $data, $path);
        }
      }
    }
  }
}





?>



