<?php
require_once("../libs/server.php");
?>
<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server; // Open/Close connection

$account_number = $_SESSION['account_number'];
$firstname = $_SESSION['firstname'];
$action = "Logged out";
$time_log = date("Y-m-d H:i:sA", strtotime("now"));

$query = "INSERT INTO activity_log (account_number, firstname, action, date) VALUES (:account_number, :firstname, :action, :date)";
$data = [
  "account_number" => $account_number,
  "firstname" => $firstname,
  "action" => $action,
  "date" => $time_log
];

$connection = $server->openConn();
$stmt = $connection->prepare($query);
$stmt->execute($data);
$count = $stmt->rowCount();

if ($count > 0) {
} else {
  $_SESSION['status'] = "Warning";
  $_SESSION['text'] = "Something went wrong.";
  $_SESSION['status_code'] = "warning";
}


?>
<?php

session_unset();
session_destroy();
header("location: ../admin/index.php");

?>
