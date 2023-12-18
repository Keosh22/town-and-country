<?php
require_once("../libs/server.php");
?>

<?php
$server = new Server;
$phase = $_POST['phase'];

$query = "SELECT * FROM street_list WHERE phase = :phase";
$data = ["phase" => $phase];
$connection = $server->openConn();
$stmt = $connection->prepare($query);
$stmt->execute($data);
$count = $stmt->rowCount();
if ($count) {
  $row = $stmt->fetchAll();
  echo json_encode($row);
} else {
  echo "No record found";
}



?>

