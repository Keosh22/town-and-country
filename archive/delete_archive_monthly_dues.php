<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server;

if (isset($_POST['payment_id'])) {
  $archive_id = filter_input(INPUT_POST, 'payment_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $transaction_number = filter_input(INPUT_POST, 'transaction_number', FILTER_SANITIZE_SPECIAL_CHARS);

  $query = "DELETE FROM archive_payments_list WHERE id = :archive_id";
  $data = ["archive_id" => $archive_id];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  if($stmt->rowCount() > 0){
    $_SESSION['status'] = "This record has been permanently deleted!";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "success";
  }
  
} else {
}
?>