<?php
require_once("../libs/server.php");
date_default_timezone_set('Asia/Manila');
?>

<?php
session_start();
$server = new Server;
if (isset($_POST['property_id']) && isset($_POST['collection_fee_id']) &&  isset($_POST['amount']) && isset($_POST['delivery_date'])) {

  $property_id = filter_input(INPUT_POST, 'property_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $collection_fee_id = filter_input(INPUT_POST, 'collection_fee_id', FILTER_SANITIZE_SPECIAL_CHARS);

  $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_SPECIAL_CHARS);
  $delivery_date = filter_input(INPUT_POST, 'delivery_date', FILTER_SANITIZE_SPECIAL_CHARS);
  $paid_by = filter_input(INPUT_POST, 'paid_by', FILTER_SANITIZE_SPECIAL_CHARS);
  $date_created = date("Y-m-d H:s:iA", strtotime("now"));
  $admin_name = $_SESSION['admin_name'];

  // $query1 = "SELECT transaction_number FROM construction_payment ORDER BY transaction_number DESC LIMIT 1";
  // $connection1 = $server->openConn();
  // $stmt1 = $connection1->prepare($query1);
  // $stmt1->execute();
  // if ($stmt1->rowCount() > 0) {
  //   if ($result1 = $stmt1->fetch()) {
  //     $transaction_number = $result1['transaction_number'];
  //     $get_number = str_replace("C", "", $transaction_number);
  //     $increment_number = $get_number + 1;
  //     $get_string = str_pad($increment_number, 8, 0, STR_PAD_LEFT);
  //     $new_transaction_number = "C" . $get_string;
  //   }
  $new_transaction_number = $server->transactionNumberGenerator();

  $query = "INSERT INTO construction_payment (transaction_number, property_id, collection_fee_id, paid, date_created, delivery_date, paid_by, admin) VALUES (:transaction_number, :property_id, :collection_fee_id, :paid, :date_created, :delivery_date, :paid_by, :admin_name)";
  $data = [
    "transaction_number" => $new_transaction_number,
    "property_id" => $property_id,
    "collection_fee_id" => $collection_fee_id,
    "paid" => $amount,
    "date_created" => $date_created,
    "delivery_date" => $delivery_date,
    "paid_by" => $paid_by,
    "admin_name" => $admin_name
  ];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  if ($stmt->rowCount() > 0) {
    $_SESSION['status'] = "Payment Success!";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "success";
    $action = "Payment: Transaction No# " . $new_transaction_number . " Material delivery payment";
    $server->insertActivityLog($action);
  } else {
    $_SESSION['status'] = "Payment Failed!";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "error";
  }

  echo  $new_transaction_number;
}

?>

