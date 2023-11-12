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
    // TCH0001
      $id = $row['account_number'];
      // 0001
      $get_number = str_replace("TCH", "", $id);
      // 0001 + 1
      $id_increment = $get_number + 1;
      $get_string = str_pad($id_increment, 4, 0, STR_PAD_LEFT);

      // TCH0001 = Username
      $account_number = "TCH" . $get_string;

      $default_pass = "Tch". $get_string . "@";
      // echo $default_pass;
      // echo $account_number;
      $return_arr[] = array("account_number" => $account_number, "default_pass" => $default_pass);
  }
  echo json_encode($return_arr);
}
?>