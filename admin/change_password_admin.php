<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$server = new Server; // Open/Close connection
session_start();

if (isset($_GET['update_password'])) {
  if (empty($_GET['token_input']) && empty($_GET['email_address_input']) && empty($_GET['admin_id']) && isset($_GET['new_password']) && isset($_GET['confirm_password'])) {
    $_SESSION['status'] = "Errors!";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
  } else {
    $token = filter_input(INPUT_GET, 'token_input', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_GET, 'email_address_input', FILTER_SANITIZE_SPECIAL_CHARS);
    $id = filter_input(INPUT_GET, 'admin_id', FILTER_SANITIZE_SPECIAL_CHARS);
    $new_password = filter_input(INPUT_GET, 'new_password', FILTER_SANITIZE_SPECIAL_CHARS);
    $confirm_password = filter_input(INPUT_GET, 'confirm_password', FILTER_SANITIZE_SPECIAL_CHARS);
    $hash_password = password_hash($new_password, PASSWORD_DEFAULT);
    $_SESSION['status'] = "Empty!";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    if ($new_password == $confirm_password) {
      $query1 = "UPDATE admin_users SET password = :hash_password WHERE id = :id AND token = :token AND email = :email";
      $data1 = [
        "hash_password" => $hash_password,
        "id" => $id,
        "token" => $token,
        "email" => $email
      ];
      $connection1 = $server->openConn();
      $stmt1 = $connection1->prepare($query1);
      $stmt1->execute($data1);
      if ($stmt1->rowCount() > 0) {
        $_SESSION['status'] = 'Success!';
        $_SESSION['text'] = 'Your password has been changed successfuly';
        $_SESSION['status_code'] = 'success';
        header("location: ../admin/index.php");
        session_unset();
        session_destroy();
      } else {
        $_SESSION['status'] = "Error!";
        $_SESSION['text'] = "Something went wrong";
        $_SESSION['status_code'] = "error";
        header("location: ../admin/index.php");
      }
    } else {
      header("location: ../admin/index.php");
    }
  }
} else {
  header("location: ../admin/index.php");
}


?>