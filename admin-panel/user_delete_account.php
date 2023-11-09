<?php
// Server
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;

if(isset($_POST['submit'])){

  $user_id = $_SESSION['user_id'];
  $id = $_POST['delete_id'];
  $password = $_POST['password'];

  if(!empty($password)){
    $query = "SELECT * FROM admin_users WHERE id = :id";
    $data = ["id" => $user_id];
    $pass = $password;
    $path = "../admin-panel/user.php";
    $isTrue = $server->verifyPassword($query, $data, $pass, $path);
  
    if($isTrue){
      $query = "DELETE FROM admin_users WHERE id = :id";
      $data = ["id" => $id];
      $path = "../admin-panel/user.php";
    
      $server->delete($query, $data, $path);
    } else {
      $_SESSION['status'] = "Account Deletion Failed!";
      $_SESSION['text'] = "You input a wrong password";
      $_SESSION['status_code'] = "error";
      
    }
    
  }

 

}
?>