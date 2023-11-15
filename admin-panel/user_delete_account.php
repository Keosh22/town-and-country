<?php
// Server
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;

if (isset($_POST['submit'])) {

  $user_id = $_SESSION['admin_id'];
  $id = $_POST['delete_id'];
  $password = $_POST['password'];

  if (!empty($password)) {
    $query = "SELECT * FROM admin_users WHERE id = :id";
    $data = ["id" => $user_id];
    $pass = $password;
    $path = "../admin-panel/user.php";
    $isTrue = $server->verifyPassword($query, $data, $pass, $path);

    if ($isTrue) {
      
      $query = "SELECT * FROM admin_users WHERE id = :id";
      $data = ["id" => $id];
      $connection = $server->openConn();
      $stmt = $connection->prepare($query);
      $stmt->execute($data);
      if($stmt->rowCount() > 0 ){
        while($result = $stmt->fetch()){
          $account_number = $result['account_number'];
          $firstname = $result['firstname'];
        }
      }


      $query = "DELETE FROM admin_users WHERE id = :id";
      $data = ["id" => $id];
      $path = "../admin-panel/user.php";
      $server->delete($query, $data, $path);

      
    
      $action = "Delete account of ".$account_number.": ".$firstname."";
      $server->insertActivityLog($action);
      
    } else {
      $_SESSION['status'] = "Account Deletion Failed!";
      $_SESSION['text'] = "You input a wrong password";
      $_SESSION['status_code'] = "error";
    }
  }
}
?>