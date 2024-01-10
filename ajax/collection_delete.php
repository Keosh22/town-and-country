<?php
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;
?>

<?php
if(isset($_POST['collection_id'])){
  $collection_id = $_POST['collection_id'];

  $query = "DELETE FROM collection_fee WHERE id = :collection_id";
  $data = ["collection_id" => $collection_id];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
}

header("Refresh: 0");
?>


