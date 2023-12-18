<?php
require_once("../libs/server.php");
?>

<?php
$server = new Server;
$query = "SELECT * FROM street_list";
$connection = $server->openConn();
$stmt = $connection->prepare($query);
$stmt->execute();
$count = $stmt->rowCount();
if ($count) {
  $row = $stmt->fetchAll();
  echo json_encode($row);
} else {
  echo "No record found";
}



?>

