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

  $query = "INSERT INTO construction_payment (property_id, collection_fee_id, paid, date_created, delivery_date, paid_by) VALUES (:property_id, :collection_fee_id, :paid, :date_created, :delivery_date, :paid_by)";
  $data = [
    "property_id" => $property_id,
    "collection_fee_id" => $collection_fee_id,
    "paid" => $amount,
    "date_created" => $date_created,
    "delivery_date" => $delivery_date,
    "paid_by" => $paid_by
  ];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  if ($stmt->rowCount() > 0) {
    $_SESSION['status'] = "Payment Success!";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "success";
  } else {
    $_SESSION['status'] = "Payment Failed!";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "error";
  }
} 
?>

