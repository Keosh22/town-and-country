<?php 
require_once("../libs/server.php"); 
?>

<?php 
$server = new Server;
if(isset($_POST['id'])){
  $street_id = $_POST['id'];
  $query = "SELECT * FROM street_list WHERE id = :street_id";
  $data = ["street_id" => $street_id];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  $row = $stmt->fetch();


  echo json_encode($row);
  
}
?>

