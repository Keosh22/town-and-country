<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$server = new Server;
$default_date = date("Y/m/d g:i A", strtotime("now"));
?>

<?php

if (isset($_POST['payment_id'])) {

  $transaction_number = $_POST['transaction_number'];
  $payment_id = $_POST['payment_id'];
  $table_result = "";
  $number = 0;
  $total_ammount = 0;

  if (isset($_POST['archive_status']) && $_POST['archive_status'] == "ACTIVE") {
    $archive_status = filter_input(INPUT_POST, 'archive_status', FILTER_SANITIZE_SPECIAL_CHARS);
  } else {
    $archive_status = filter_input(INPUT_POST, 'archive_status', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  $query1 = "SELECT 
        payments_list.id as payment_id,
        payments_list.transaction_number as payment_list_tnumber,
        payments_list.date_created as date_paid,
        payments_list.remarks,
        payments_list.paid,
        homeowners_users.firstname,
        homeowners_users.middle_initial,
        homeowners_users.lastname,
        homeowners_users.account_number,
        homeowners_users.blk as homeowners_blk,
        homeowners_users.lot as homeowners_lot,
        homeowners_users.street as homeowners_street,
        homeowners_users.phase as homeowners_phase,
        collection_fee.category,
        collection_fee.fee
        FROM payments_list 
        INNER JOIN homeowners_users ON payments_list.homeowners_id = homeowners_users.id
        INNER JOIN collection_fee ON payments_list.collection_fee_id = collection_fee.id
        WHERE payments_list.transaction_number = :transaction_number AND payments_list.id = :payment_id AND payments_list.archive = :archive_status
        ";
  $data1 = ["transaction_number" => $transaction_number, "payment_id" => $payment_id, "archive_status" => $archive_status];
  $connection1 = $server->openConn();
  $stmt1 = $connection1->prepare($query1);
  $stmt1->execute($data1);
  if ($stmt1->rowCount() > 0) {
    while ($result1 = $stmt1->fetch()) {
      $payment_id_result = $result1['payment_id'];
      $date_paid = date("F j, Y-g:iA", strtotime($result1['date_paid']));
      $transaction_number = $result1['payment_list_tnumber'];

      $account_number = $result1['account_number'];
      $firstname = $result1['firstname'];
      $middle_initial = $result1['middle_initial'];
      $lastname = $result1['lastname'];


      $blk = $result1['homeowners_blk'];
      $lot = $result1['homeowners_lot'];
      $street = $result1['homeowners_street'];
      $phase = $result1['homeowners_phase'];

      $remarks = $result1['remarks'];
      $fee = $result1['fee'];
      $paid = $result1['paid'];
      $category = $result1['category'];

      $number = $number + 1;

      $name = $firstname . " " . $middle_initial . " " . $lastname;
      $address = "BLK-" . $blk . " LOT-" . $lot . " " . $street . ", " . $phase;
      $total_amount = $paid;
      $table_result = '
      <tr>
      <td>' . $number . '</td>
      <td>' . $category . '</td>
      <td>' . $paid . '</td>
      <td>' . $remarks . ' ' . date("Y", strtotime($date_paid)) . '</td>
      </tr>
      ';
    }
  }

  $summary = array(
    "account_number" => $account_number,
    "name" => $name,
    "address" => $address,
    "transaction_number" => $transaction_number,
    "date_paid" => $date_paid,
    "remarks" => $remarks,
    "table_result" => $table_result,
    "total_amount" => $total_amount

  );

  // $table_result = '
  // <tr>
  // <td>'. $number .'</td>
  // <td>'. $category .'</td>
  // <td>'. $fee .'</td>
  // <td>'. $remarks .' '. date("Y",strtotime($date_paid)).'</td>
  // </tr>
  // ';
  // $total_ammount = $fee;


  // $name = $firstname . " " . $middle_initial . " " . $lastname;
  // $address = "BLK-" . $blk . " LOT-" . $lot . " " . $street . ", " . $phase;
  // $summary = array(
  //   "name" => $name,
  //   "address" => $address,
  //   "payment_id" => $payment_id_result,
  //   "date_paid" => $date_paid,
  //   "transaction_number" => $transaction_number,
  //   "account_number" => $account_number,
  //   "table_result" => $table_result,
  //   "total_amount" => $total_ammount,
  //   "remarks" => $remarks
  // );


  echo json_encode($summary);
} else {
  $_SESSION['status'] = "Warning";
  $_SESSION['text'] = "Something went wrong.";
  $_SESSION['status_code'] = "warning";
}
?>