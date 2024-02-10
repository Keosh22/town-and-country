<?php

// use LDAP\Result;

require_once("../libs/server.php");
date_default_timezone_set('Asia/Manila');
?>
<?php
$server = new Server;
session_start();
if (isset($_POST['property_id']) && isset($_POST['construction_payment_id'])) {

  $property_id = filter_input(INPUT_POST, 'property_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $construction_payment_id = filter_input(INPUT_POST, 'construction_payment_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $response = [];
  $number = 0;
  $ACTIVE = "ACTIVE";

  // Get homeowners details
  $query1 = "SELECT 
        property_list.blk as property_blk,
        property_list.lot as property_lot,
        property_list.phase as property_phase,
        property_list.street as property_street,
        homeowners_users.firstname,
        homeowners_users.middle_initial,
        homeowners_users.lastname,
        homeowners_users.account_number
        FROM property_list 
        INNER JOIN homeowners_users ON property_list.homeowners_id = homeowners_users.id WHERE property_list.id = :property_id  LIMIT 1
        ";
  $data1 = ["property_id" => $property_id];
  $connection1 = $server->openConn();
  $stmt1 = $connection1->prepare($query1);
  $stmt1->execute($data1);
  if ($stmt1->rowCount() > 0) {
    if ($result1 = $stmt1->fetch()) {
      $blk = $result1['property_blk'];
      $lot = $result1['property_lot'];
      $street = $result1['property_street'];
      $phase = $result1['property_phase'];

      $firstname = $result1['firstname'];
      $middle_initial = $result1['middle_initial'];
      $lastname = $result1['lastname'];
      $account_number = $result1['account_number'];

      $address = "BLK-" . $blk . " LOT-" . $lot . " " . $street . " " . $phase;
      $name = $firstname . " " . $middle_initial . " " . $lastname;
    }
  }


  $query2 = "SELECT 
  construction_payment.transaction_number, 
  construction_payment.date_created as date_paid, 
  construction_payment.delivery_date, 
  construction_payment.paid_by,
  construction_payment.paid,
  collection_fee.category,
  collection_fee.description  
  FROM construction_payment 
  INNER JOIN collection_fee ON construction_payment.collection_fee_id = collection_fee.id
  WHERE construction_payment.id =  :construction_payment_id AND construction_payment.archive = :ACTIVE";
  $data2 = ["construction_payment_id" => $construction_payment_id, "ACTIVE" => $ACTIVE];
  $connection2 = $server->openConn();
  $stmt2 = $connection2->prepare($query2);
  $stmt2->execute($data2);
  if ($stmt2->rowCount() > 0) {
    if ($result2 = $stmt2->fetch()) {
      $transaction_number = $result2['transaction_number'];
      $date_created = date("M j, Y g:iA", strtotime($result2['date_paid']));
      $paid_by = $result2['paid_by'];
      $category = $result2['category'];
      $amount = $result2['paid'];
      $delivery_date = date("M j, Y", strtotime($result2['delivery_date']));
      $description = $result2['description'];
      $number += 1;
      $total_amount = $amount;
    }
  }

  $table_header = '
  <tr>
  <th scope="col" width="5%">#</th>
  <th scope="col" width="15%">Category</th>
  <th scope="col" width="5%">Amount</th>
  <th scope="col" width="15%">Delivery Address</th>
  <th scope="col" width="5%">Delivery Date</th>
</tr>

  ';


  $table = '
  <tr>
    <td>'.$number.'</td>
    <td>' . $category . '-'. $description. '</td>
    <td>' . $amount . '</td>
    <td>' . $address . '</td>
    <td>' . $delivery_date . '</td>
  </tr>
';

  $response = [
    "name" => $name,
    "address" => $address,
    "account_number" => $account_number,
    "transaction_number" => $transaction_number,
    "date_created" => $date_created,
    "paid_by" => $paid_by,
    "category" => $category,
    "paid" => $amount,
    "total_amount" => $total_amount,
    "property_id" => $property_id,
    "table" => $table,
    "table_header" => $table_header
  ];
  echo json_encode($response);
}
?>