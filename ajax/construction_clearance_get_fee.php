<?php
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;
?>

<?php
$collection_fee_number = "C003";
$status = 'ACTIVE';
$query1 = "SELECT id,collection_fee_number,fee FROM collection_fee WHERE collection_fee_number = :collection_fee_number AND status = :ACTIVE LIMIT 1";
$data1 = ["collection_fee_number" => $collection_fee_number, "ACTIVE" => $status];
$connection1 = $server->openConn();
$stmt1 = $connection1->prepare($query1);
$stmt1->execute($data1);
if($stmt1-> rowCount() > 0){
  if($result1 = $stmt1->fetch()){
    $fee = $result1['fee'];
    $id = $result1['id'];

  }
  $response = [
    "collection_fee" => $fee,
    "collection_fee_id" => $id,
  ];
  echo json_encode($response);
}
?>


