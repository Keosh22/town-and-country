<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server;

if (isset($_POST['construction_payment_id']) && isset($_POST['transaction_number_archive']) && isset($_POST['password'])) {

  $construction_payment_id = filter_input(INPUT_POST, 'construction_payment_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $transaction_number_archive = filter_input(INPUT_POST, 'transaction_number_archive', FILTER_SANITIZE_SPECIAL_CHARS);

  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);



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

    $query2 = "UPDATE construction_payment SET archive = :INACTIVE WHERE id = :payment_id AND transaction_number = :transaction_number";
    $data2 = ["INACTIVE" => $INACTIVE, "payment_id" => $construction_payment_id, "transaction_number" => $transaction_number_archive];
    $connection2 = $server->openConn();
    $stmt2 = $connection2->prepare($query2);
    $stmt2->execute($data2);
    if ($stmt2->rowCount() > 0) {
      $_SESSION['status'] = "Success";
      $_SESSION['text'] = "The log has been archived successfuly";
      $_SESSION['status_code'] = "success";
      $action = "Archive the Transaction No#: " . $transaction_number . " Construction Payment" ;
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