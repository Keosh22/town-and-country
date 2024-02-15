<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server;

if (isset($_POST['construction_payment_id']) && isset($_POST['transaction_number'])) {

  $transaction_number = filter_input(INPUT_POST, 'transaction_number', FILTER_SANITIZE_SPECIAL_CHARS);
  $construction_payment_id = filter_input(INPUT_POST, 'construction_payment_id', FILTER_SANITIZE_SPECIAL_CHARS);

  $INACTIVE = "INACTIVE";

  $query = "DELETE FROM construction_payment WHERE id = :construction_payment_id AND transaction_number = :transaction_number AND archive = :INACTIVE";
  $data = ["construction_payment_id" => $construction_payment_id, "transaction_number" => $transaction_number, "INACTIVE" => $INACTIVE];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  if ($stmt->rowCount() > 0) {
    $_SESSION['status'] = "This record has been permanently deleted!";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "success";
  }
} else {
}
?>