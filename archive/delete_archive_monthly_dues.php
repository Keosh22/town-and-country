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
  $collection_id = filter_input(INPUT_POST, 'collection_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $AVAILABLE = "AVAILABLE";

  $query = "DELETE FROM payments_list WHERE id = :archive_id";
  $data = ["archive_id" => $archive_id];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  if ($stmt->rowCount() > 0) {
    $query3 = "UPDATE collection_list SET status = :AVAILABLE WHERE id = :collection_id";
    $data3 = ["AVAILABLE" => $AVAILABLE, "collection_id" => $collection_id];
    $connection3 = $server->openConn();
    $stmt3 = $connection3->prepare($query3);
    $stmt3->execute($data3);
    if ($stmt3->rowCount() > 0) {
      $_SESSION['status'] = "This record has been permanently deleted!";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "success";
    }
  }
} else {
}
?>