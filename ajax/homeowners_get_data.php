<?php
require_once("../libs/server.php");
?>

<?php
$server = new Server;
if(isset($_POST['homeowners_id'])){
  $homeowners_id = $_POST['homeowners_id'];
  $query = "SELECT * FROM homeowners_users WHERE id = :homeowners_id";
  $data = ["homeowners_id" => $homeowners_id];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  $count = $stmt->rowCount();
  $row = $stmt->fetch();

  if($count){
    echo json_encode($row);
  } else {
    echo "No records found";
  }
  
}
?>

