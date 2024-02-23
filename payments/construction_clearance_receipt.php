<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>
<style>



</style>
<?php
$server = new Server;
session_start();
if (isset($_GET['property_id_receipt']) && isset($_GET['transaction_number_md'])) {

  $property_id = filter_input(INPUT_GET, 'property_id_receipt', FILTER_SANITIZE_SPECIAL_CHARS);
  $transaction_number_md = filter_input(INPUT_GET, 'transaction_number_md', FILTER_SANITIZE_SPECIAL_CHARS);
  $response = [];
  $number = 0;


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
  construction_payment.admin,
  collection_fee.category,
  collection_fee.description  
  FROM construction_payment 
  INNER JOIN collection_fee ON construction_payment.collection_fee_id = collection_fee.id
  WHERE construction_payment.transaction_number =  :transaction_number_md ";
  $data2 = ["transaction_number_md" => $transaction_number_md];
  $connection2 = $server->openConn();
  $stmt2 = $connection2->prepare($query2);
  $stmt2->execute($data2);
  if ($stmt2->rowCount() > 0) {
    if ($result2 = $stmt2->fetch()) {
      $transaction_number = $result2['transaction_number'];
      $date_paid = date("M j, Y g:iA", strtotime($result2['date_paid']));
      $paid_by = $result2['paid_by'];
      $category = $result2['category'];
      $amount = $result2['paid'];
      $description = $result2['description'];
      $admin_name = $result2['admin'];
      $number += 1;
      $total_amount = $amount;
    }
  }
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

    </div>
    <div class="w-50">
      <h5 class="details-title text-secondary">Payment Details</h5>
      <p class="m-0">Transaction Number: <b id="transaction_number"><?php echo $transaction_number; ?></b></p>
      <p class="m-0">Date Paid: <b id="date_paid"><?php echo $date_paid; ?></b></p>
      <p class="m-0">Paid By: <b id="paid_by"><?php echo $paid_by; ?></b></p>
    </div>
  </div>
  <div class="divider-receipt"></div>
  <h5 class="text-secondary">Payment Summary:</h5>
  <table class="table">
    <thead>
      <tr>
        <th scope="col" width="1%">#</th>
        <th scope="col" width="15%">Category</th>
        <th scope="col" width="1%">Amount</th>
        <th scope="col" width="15%">Property</th>

      </tr>
    </thead>
    <tbody class="table_result">
      <tr>
        <td><?php echo $number; ?></td>
        <td><?php echo $category; ?></td>
        <td><?php echo $amount; ?></td>
        <td><?php echo $address; ?></td>

      </tr>
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
          <input type="text" class="form-control" id="total_amount" value="<?php echo $total_amount; ?>">
        </div>
      </div>
    </div>
  </div>
</div>