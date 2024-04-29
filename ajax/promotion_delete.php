<?php
require_once("../libs/server.php");
?>

<?php
$server = new Server;
session_start();
if(isset($_POST['promotion_id'])){

  $promotion_id = $_POST['promotion_id'];

  $query = "SELECT * FROM promotion WHERE id = :promotion_id";
  $data = ["promotion_id" => $promotion_id];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);

  if($stmt->rowCount() > 0){
    while($result = $stmt->fetch()){
      $photo_name = $result['photo'];
    }
  }
  unlink("../promotion_photos/".$photo_name);

  $query = "DELETE FROM promotion WHERE id = :promotion_id";
  $data = ["promotion_id" => $promotion_id];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  if($count > 0){
    $_SESSION['status'] = "Promotion Deleted!";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "success";
  } else {
    $_SESSION['status'] = "Promotion delete failed!";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "danger";
  }

  

}
?>