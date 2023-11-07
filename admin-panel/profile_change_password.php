<!-- SERVER -->
<?php 
require_once("../libs/server.php");
session_start();
?>


<?php 
if(isset($_POST['change_password'])){

  $current_pass = $_POST['current_password'];
  $new_pass = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
  $confirm_pass = $_POST['confirm_password'];
  $id = $_SESSION['user_id'];
  

  if(empty($current_pass) || empty($new_pass) || empty($confirm_pass) || empty($id) || empty($password) ){

    $server = new Server;
    $query = "UPDATE admin_users SET password = :password WHERE id = :id";
    $data = ["password" => $new_pass , "id" => $id];
    $path = "../admin-panel/profile.php";
    $server->updateUser($query, $data, $path);
  } else {
    
  }
}
?>