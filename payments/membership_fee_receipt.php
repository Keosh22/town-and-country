<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>
<style>



</style>
<?php
$server = new Server;

if (isset($_GET['transactionNumber']) || isset($_GET['transactionNumber'])) {

  // $payment_id = $_GET['payment_id'];
  $transactionNumberId = $_GET['transactionNumber'];
  $membership_fee = "Membership Fee";



  $table_result = "";
  $number = 0;
  $total_ammount = 0;

  if (isset($_GET['archive_status']) && $_GET['archive_status'] == "ACTIVE") {
    $archive_status = filter_input(INPUT_GET, 'archive_status', FILTER_SANITIZE_SPECIAL_CHARS);
  } else {
    $archive_status = filter_input(INPUT_GET, 'archive_status', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  $query1 = "SELECT 
        payments_list.id as payment_id,
        payments_list.transaction_number as payment_list_tnumber,
        payments_list.date_created as date_paid,
        payments_list.remarks,
        payments_list.admin,
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
        WHERE payments_list.transaction_number = :transactionNumberId AND collection_fee.category = :membership_fee AND payments_list.archive = :archive_status
        ";
  $data1 = ["transactionNumberId" => $transactionNumberId, "membership_fee" => $membership_fee, "archive_status" => $archive_status];
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

      $admin_name = $result1['admin'];
    }
  }




  $name = $firstname . " " . $middle_initial . " " . $lastname;
  $address = "BLK-" . $blk . " LOT-" . $lot . " " . $street . ", " . $phase;
}

?>
<div class="receipt-wrapper">
  <h2 class="text-center title-receipt"><b>Payment Receipt</b></h2>
  <h5 class="text-center title-receipt m-0">Town And Country Heights Homeowners' ASSN. INC.</h5>
  <p class="text-center title-receipt text-secondary mb-1">Clubhouse 1 La Salle Avenue, Town & Country Heights San Luis, Antipolo City</p>
  <div class="divider-receipt"></div>
  <div class="flex">
    <div class="w-50">
      <h5 class="details-title text-secondary">Homeowners Details</h5>
      <p class="m-0">Account Number: <b id="account_number"><?php echo $account_number; ?></b></p>
      <p class="m-0">Name: <b id="name"><?php echo $name; ?></b></p>
      <p class="m-0">Current Address: <b id="current_address"><?php echo $address; ?></b></p>
    </div>
    <div class="w-50">
      <h5 class="details-title text-secondary">Payment Details</h5>
      <p class="m-0">Transaction Number: <b id="transaction_number"><?php echo $transaction_number; ?></b></p>
      <p class="m-0">Date Paid: <b id="date_paid"><?php echo $date_paid; ?></b></p>
      <p class="m-0">Remarks: <b id="remarks"><?php echo $remarks; ?></b></p>
    </div>
  </div>
  <div class="divider-receipt"></div>
  <h5 class="text-secondary">Payment Summary:</h5>
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
  payments_list.paid,
  collection_fee.category,
  collection_fee.fee
  FROM payments_list 
  INNER JOIN collection_fee ON payments_list.collection_fee_id = collection_fee.id
  WHERE payments_list.transaction_number = :transaction_number AND collection_fee.category = :membership_fee AND payments_list.archive = :archive_status
  ";
      $data2 = ["transaction_number" => $transaction_number, "membership_fee" => $membership_fee, "archive_status" => $archive_status];
      $connection2 = $server->openConn();
      $stmt2 = $connection2->prepare($query2);
      $stmt2->execute($data2);
      if ($stmt2->rowCount() > 0) {
        while ($result2 = $stmt2->fetch()) {
          $category = $result2['category'];
          $fee = $result2['fee'];
          $paid = $result2['paid'];
          $payment_list_id = $result2['payment_list_id'];



          $number = $number + 1;

      ?>
          <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $category; ?></td>
            <td><?php echo $paid; ?></td>
            <td><?php echo  $remarks . " " . date("Y", strtotime($date_paid)); ?></td>
          </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>

  <div class="flex">
    <div class="w-50">
      <div class="row align-items-center">
        <div class="col-12 d-flex">
          <span class="border-bottom"><b id="admin_name"><?php echo $admin_name; ?></b></span>
        </div>
        <div class="col-12 d-flex">
          <span class="text-secondary">Process by</span>
        </div>
      </div>
    </div>
    <div class="w-50">
      <div class="row justify-content-end">
        <div class="col-auto">
          <label for="total_amount" class="form-label">Total Amount:</label>
        </div>
        <div class="col-4">
          <input type="text" class="form-control" id="total_amount" value="<?php echo $paid; ?>">
        </div>
      </div>
    </div>
  </div>
</div>