<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server;

if (isset($_POST['payment_id']) && isset($_POST['transaction_number'])) {

  $payment_id = filter_input(INPUT_POST, 'payment_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $transaction_number = filter_input(INPUT_POST, 'transaction_number', FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
  $homeowners_id = filter_input(INPUT_POST, 'homeowners_id', FILTER_SANITIZE_SPECIAL_CHARS);

  if(isset($_POST['remarks']) && strtolower($_POST['remarks']) == strtolower("Renew membership")){
    $status = "EXPIRED";
  } elseif (isset($_POST['remarks']) && strtolower($_POST['remarks']) == strtolower("New membership")){
    $status = "Non-member";
  } else {
    $status = "member";
  }

  
  $INACTIVE = "INACTIVE";

  $admin_id = $_SESSION['admin_id'];

  $query1 = "SELECT * FROM admin_users WHERE id = :admin_id";
  $data1 = ["admin_id" => $admin_id];
  $isTrue = $server->verifyPassword($query1, $data1, $password);

  if ($isTrue) {

    $connection1 = $server->openConn();
    $stmt1 = $connection1->prepare($query1);
    $stmt1->execute($data1);
    if ($stmt1->rowCount() > 0) {
      while ($result1 = $stmt1->fetch()) {
        $account_number = $result1['account_number'];
        $firstname = $result1['firstname'];
      }
    }

    $query2 = "UPDATE payments_list SET archive = :INACTIVE WHERE id = :payment_id AND transaction_number = :transaction_number";
    $data2 = ["INACTIVE" => $INACTIVE, "payment_id" => $payment_id, "transaction_number" => $transaction_number];
    $connection2 = $server->openConn();
    $stmt2 = $connection2->prepare($query2);
    $stmt2->execute($data2);
    if ($stmt2->rowCount() > 0) {
      $query3 = "UPDATE homeowners_users SET status = :status WHERE id = :homeowners_id";
      $data3 = ["status" => $status, "homeowners_id" => $homeowners_id];
      $connection3 = $server->openConn();
      $stmt3 = $connection3->prepare($query3);
      $stmt3->execute($data3);
      if($stmt3->rowCount() > 0){
        $_SESSION['status'] = "Success";
        $_SESSION['text'] = "The log has been archived successfuly";
        $_SESSION['status_code'] = "success";
        $action = "Archive the Transaction No#: " . $transaction_number . " Membership Fee" ;
        $server->insertActivityLog($action);
      }
      
    }
  } else {
    $_SESSION['status'] = "Failed!";
    $_SESSION['text'] = "You input a wrong password";
    $_SESSION['status_code'] = "error";
  }
} else {
}
?>