<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>
<style>



</style>
<?php
$server = new Server;

if (isset($_GET['transactionNumber'])) {

  // $payment_id = $_GET['payment_id'];
  $transactionNumberId = $_GET['transactionNumber'];




  $table_result = "";
  $number = 0;
  $total_ammount = 0;
  $query1 = "SELECT 
        payments_list.id as payment_id,
        payments_list.transaction_number as payment_list_tnumber,
        payments_list.date_created as date_paid,
        homeowners_users.firstname,
        homeowners_users.middle_initial,
        homeowners_users.lastname,
        homeowners_users.account_number,
        homeowners_users.blk as homeowners_blk,
        homeowners_users.lot as homeowners_lot,
        homeowners_users.street as homeowners_street,
        homeowners_users.phase as homeowners_phase,
        collection_fee.category,
        collection_fee.fee,
        collection_list.month,
        collection_list.year
        FROM payments_list 
        INNER JOIN homeowners_users ON payments_list.homeowners_id = homeowners_users.id
        INNER JOIN property_list ON payments_list.property_id = property_list.id
        INNER JOIN collection_list ON payments_list.collection_id = collection_list.id
        INNER JOIN collection_fee ON payments_list.collection_fee_id = collection_fee.id
        WHERE payments_list.transaction_number = :transactionNumberId 
        ";
  $data1 = ["transactionNumberId" => $transactionNumberId];
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
    }
  }




  $name = $firstname . " " . $middle_initial . " " . $lastname;
  $address = "BLK-" . $blk . " LOT-" . $lot . " " . $street . ", " . $phase;
}

?>
<div class="receipt-wrapper">

  <h1 class="text-center title-receipt">Payment Receipt</h1>
  <h5 class="text-center title-receipt">Town And Country Heights Subdivision</h5>
  <div class="divider-receipt"></div>
  <div class="flex">
    <div class="w-50">
      <h4 class="details-title">Homeowners Details</h4>
      <p>Account Number: <b id="account_number"><?php echo $account_number; ?></b></p>
      <p>Name: <b id="name"><?php echo $name; ?></b></p>
      <p>Current Address: <b id="current_address"><?php echo $address; ?></b></p>
    </div>
    <div class="w-50">
      <h4 class="details-title">Payment Details</h4>
      <p>Transaction Number: <b id="transaction_number"><?php echo $transaction_number; ?></b></p>
      <p>Date Paid: <b id="date_paid"><?php echo $date_paid; ?></b></p>
    </div>
  </div>
  <div class="divider-receipt"></div>
  <h4>Payment Summary:</h4>
  <table class="table">
    <thead>
      <tr>
        <th scope="col" width="5%">#</th>
        <th scope="col" width="20%">Category</th>
        <th scope="col" width="15%">Amount</th>
        <th scope="col" width="60%">Details</th>
      </tr>
    </thead>
    <tbody class="table_result">
      <?php

      // Payment Summary
      $query2 = "SELECT
  payments_list.id as payment_list_id,
  collection_fee.category,
  collection_fee.fee,
  collection_list.year,
  collection_list.month,
  property_list.blk as property_blk,
  property_list.lot as property_lot,
  property_list.street as property_street,
  property_list.phase as property_phase
  FROM payments_list 
  INNER JOIN collection_fee ON payments_list.collection_fee_id = collection_fee.id
  INNER JOIN collection_list ON payments_list.collection_id = collection_list.id 
  INNER JOIN property_list ON payments_list.property_id = property_list.id
  WHERE payments_list.transaction_number = :transaction_number
  ";
      $data2 = ["transaction_number" => $transaction_number];
      $connection2 = $server->openConn();
      $stmt2 = $connection2->prepare($query2);
      $stmt2->execute($data2);
      if ($stmt2->rowCount() > 0) {
        while ($result2 = $stmt2->fetch()) {
          $category = $result2['category'];
          $fee = $result2['fee'];
          $month = $result2['month'];
          $year = $result2['year'];
          $payment_list_id = $result2['payment_list_id'];

          $property_blk = $result2['property_blk'];
          $proeprty_lot = $result2['property_lot'];
          $property_street = $result2['property_street'];
          $property_phase = $result2['property_phase'];

          $property = "BLK-" . $property_blk . " LOT-" . $proeprty_lot . " " . $property_street . ", " . $property_phase;
          $number = $number + 1;
          $total_ammount += $fee;
      ?>
          <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $category; ?></td>
            <td><?php echo $fee; ?></td>
            <td><?php echo $property . '-' . $month . ' ' . $year; ?></td>
          </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>

  <div class="flex">
    <div class="w-50"></div>
    <div class="w-50">
      <div class="row align-items-center">
        <div class="col-auto">
          <label for="total_amount" class="form-label">Total Amount:</label>
        </div>
        <div class="col-4">
          <input type="text" class="form-control" id="total_amount" value="<?php echo $total_ammount; ?>">
        </div>
      </div>
    </div>
  </div>
</div>