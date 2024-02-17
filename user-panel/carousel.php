<?php
session_start();

require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');

$server = new Server;

$query = "SELECT about, content, DATE(date) as date, DATE(date_created) as date_created FROM announcement WHERE status = 'ACTIVE';";

$connection = $server->openConn();
$stmt = $connection->prepare($query);
$stmt->execute();


//$response = array();
$data = array();

if ($stmt->rowCount() > 0) {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $data[] = $row;
    };
};
header('Content-Type: application/json');
echo json_encode($data);

?>