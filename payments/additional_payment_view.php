<?php

require_once("../libs/server.php");
date_default_timezone_set('Asia/Manila');
?>
<?php
$server = new Server;
session_start();

if (isset($_POST['transaction_number']) ) {
  $transaction_number = filter_input(INPUT_POST, 'transaction_number', FILTER_SANITIZE_SPECIAL_CHARS);
  $collection_fee_id = filter_input(INPUT_POST, 'collection_fee_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);
  $ACTIVE = "ACTIVE";
  $table_body = "";
  $table_header = "";
  $total_amount = 0;
  $admin = $_SESSION['admin_name'];
  $response = [];

  $query = "SELECT 
  payments_list.transaction_number,
  payments_list.id as payment_id,
  payments_list.date_created as date_paid,
  payments_list.collection_fee_id,
  payments_list.paid,
  payments_list.remarks,
  payments_list.paid_by,
  payments_list.date_created,
  payments_list.quantity,
  collection_fee.category,
  collection_fee.description
  FROM payments_list 
  INNER JOIN collection_fee ON payments_list.collection_fee_id = collection_fee.id
  WHERE payments_list.transaction_number = :transaction_number AND archive = :status
  ";
  $data = [
    "transaction_number" => $transaction_number,
    "status" => $status
  ];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  if ($stmt->rowCount() > 0) {
    while ($result = $stmt->fetch()) {
      $transactionNumber = $result['transaction_number'];
      $payment_category = $result['category'];
      $quantity = $result['quantity'];
      $amount = $result['paid'];
      $paid_by = $result['paid_by'];
      $date_created = date("F j, Y g:iA", strtotime($result['date_created']));
      $remarks = $result['remarks'];

      $total_amount += intval($amount);
      $table_body .= '
      <tr>
      <td>'. $quantity .'</td>
      <td>'. $payment_category .'</td>
      <td>'. $amount .'</td>
      </tr>
      ';
    }
    $table_header = '
    <tr>
    <th scope="col" width="5%">Quantity</th>
    <th scope="col" width="20%">Payment</th>
    <th scope="col" width="15%">Amount</th>
    </tr>
    ';

    $response = [
      "table_header" => $table_header,
      "table_body" => $table_body,
      "total_amount" => $total_amount,
      "transaction_number" => $transactionNumber,
      "paid_by" => $paid_by,
      "date_created" => $date_created,
      "remarks" => $remarks,
      "admin" => $admin
    ];
    
  }
  echo json_encode($response);
}
?>