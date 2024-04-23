<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server;

if (isset($_POST['tenant_id']) && isset($_POST['password']) ) {

  $tenant_id = filter_input(INPUT_POST, 'tenant_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);



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

    $query2 = "UPDATE property_list SET tenant = NULL WHERE tenant = :tenant_id";
    $data2 = ["tenant_id" => $tenant_id];
    $connection2 = $server->openConn();
    $stmt2 = $connection2->prepare($query2);
    $stmt2->execute($data2);
    if ($stmt2->rowCount() > 0) {

      $_SESSION['status'] = "Success";
      $_SESSION['text'] = "Tenant successfully removed.";
      $_SESSION['status_code'] = "success";
      // $action = "Archive the Transaction No#: " . $transaction_number . " Monthly Dues" ;
      // $server->insertActivityLog($action);
    }
  } else {
    $_SESSION['status'] = "Failed!";
    $_SESSION['text'] = "You input a wrong password";
    $_SESSION['status_code'] = "error";
  }
  header("location: ../admin-panel/homeowners.php");
} else {
  header("location: ../admin-panel/homeowners.php");
  $_SESSION['status'] = "Failed!";
  $_SESSION['text'] = "Something went wrong!";
  $_SESSION['status_code'] = "error";
}
?>