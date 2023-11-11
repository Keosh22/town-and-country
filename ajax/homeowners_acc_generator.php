<?php 
require_once("../libs/server.php"); 
session_start();
?>

<?php 
$server = new Server;
// Account Number Generator
$queryAccountNumber = "SELECT * FROM homeowners_users ORDER BY account_number DESC LIMIT 1";
$connection = $server->openConn();
$stmt = $connection->prepare($queryAccountNumber);
$stmt->execute();

if($rowCount = $stmt->rowCount()){
  if($row = $stmt->fetch()){
    // TCH00001
      $id = $row['account_number'];
      // 00001
      $get_number = str_replace("TCH", "", $id);
      // 00001 + 1
      $id_increment = $get_number + 1;
      $get_string = str_pad($id_increment, 4, 0, STR_PAD_LEFT);

      $account_number = "TCH" . $get_string;
      echo $account_number;
  }
}
?>