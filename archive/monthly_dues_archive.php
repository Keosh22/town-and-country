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
  $collection_id = filter_input(INPUT_POST, 'collection_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $AVAILABLE = "AVAILABLE";
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


      $_SESSION['status'] = "Success";
      $_SESSION['text'] = "The log has been archived successfully";
      $_SESSION['status_code'] = "success";
      $action = "Archive the Transaction No#: " . $transaction_number . " Monthly Dues" ;
      $server->insertActivityLog($action);
    }
  } else {
    $_SESSION['status'] = "Failed!";
    $_SESSION['text'] = "You input a wrong password";
    $_SESSION['status_code'] = "error";
  }
} else {
}
?>