<?php
require_once("../libs/server.php");
?>

<?php
$server = new Server;
if(isset($_POST['announcement_id'])){
  $announcement_id = $_POST['announcement_id'];

  $query = "DELETE FROM announcement WHERE id = :announcement_id";
  $data = ["announcement_id" => $announcement_id];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  if($count > 0){
    $_SESSION['status'] = "Announcement Deleted!";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "success";
  } else {
    $_SESSION['status'] = "Announcement delete failed!";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "danger";
  }

}
  
?>