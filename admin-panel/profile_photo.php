<!-- SERVER -->
<?php
require_once("../libs/server.php");
session_start();
?>

<?php

 $server = new Server;

if(isset($_POST['change_photo'])){
  // PHOTO
  $name = $_FILES['photo']['name'];
  $size = $_FILES['photo']['size'];
  $type = $_FILES['photo']['type'];
  $temp = $_FILES['photo']['tmp_name'];
  $folder = "../uploads/" . $name;
  $id = $_SESSION['admin_id'];
  



  $query = "UPDATE admin_users SET photo = :photo WHERE id = :id";
  $data =  [
    "photo" => $name, 
    "id" => $id];
  $path = "../admin-panel/profile.php";
  
  move_uploaded_file($temp, $folder);
  $server->updatePhoto($query, $data, $path);


  

  


  
}

?>
