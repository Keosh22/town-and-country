<?php
// Server
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;

if (isset($_POST['homeowners_id'])) {
  $homewners_id = filter_input(INPUT_POST, 'homeowners_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $account_number = filter_input(INPUT_POST, 'account_number', FILTER_SANITIZE_SPECIAL_CHARS);
  $INACTIVE = "INACTIVE";
  $ACTIVE = "ACTIVE";
  $MEMBERSHIP_FEE = 4;




  // Check if there is proeprty registered 
  // Will not delete if there is current registered property
  $query = "SELECT homeowners_id FROM property_list WHERE homeowners_id = :homeowners_id AND archive = :ACTIVE ";
  $data = ["homeowners_id" => $homewners_id, "ACTIVE" => $ACTIVE];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  if ($stmt->rowCount() > 0) {
    $_SESSION['status'] = "Deletion Failed!";
    $_SESSION['text'] = "Account has property active. You can't delete this account.";
    $_SESSION['status_code'] = "error";
  } else {





    // Archive membership fee payment record
    $query1 = "SELECT homeowners_id FROM payments_list WHERE homeowners_id = :homeowners_id AND archive = :ACTIVE AND collection_fee_id = :MEMBERSHIP_FEE";
    $data1 = ["homeowners_id" => $homewners_id, "ACTIVE" => $ACTIVE, "MEMBERSHIP_FEE" => $MEMBERSHIP_FEE];
    $connection1 = $server->openConn();
    $stmt1 = $connection1->prepare($query1);
    $stmt1->execute($data1);
    if ($stmt1->rowCount() > 0) {
      while ($result1 = $stmt1->fetch()) {

        $query2 = "UPDATE payments_list SET archive = :INACTIVE WHERE homeowners_id = :homeowners_id";
        $data2 = ["INACTIVE" => $INACTIVE, "homeowners_id" => $homewners_id];
        $connection2 = $server->openConn();
        $stmt2 = $connection2->prepare($query2);
        $stmt2->execute($data2);
      }
    }
    $_SESSION['status'] = "Account archive successfuly!";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "success";
    // Archive homeowners account
    $query3 = "UPDATE homeowners_users SET archive = :INACTIVE WHERE id = :homeowners_id";
    $data3 = ["INACTIVE" => $INACTIVE, "homeowners_id" => $homewners_id];
    $connection3 = $server->openConn();
    $stmt3 = $connection3->prepare($query3);
    $stmt3->execute($data3);
    if ($stmt3->rowCount() > 0) {
     
      $action = "Archive the Account of Acc No#: " . $account_number ;
      $server->insertActivityLog($action);
    }
  
  }
}


?>