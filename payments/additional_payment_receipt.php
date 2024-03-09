<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>
<style>



</style>
<?php
session_start();
$server = new Server;

if (isset($_GET['transactionNumber']) && isset($_GET['paymentId'])) {

  // $payment_id = $_GET['payment_id'];
  $transactionNumberId = $_GET['transactionNumber'];
  $paymentId = $_GET['paymentId'];
  $admin_name = $_SESSION['admin_name'];


  $table_result = "";
  $number = 0;
  $total_ammount = 0;

  $ACTIVE = "ACTIVE";
  $month_dues = "Monthly Dues";
  $membership_fee = "Membership Fee";
  $construction_bond = "Construction Bond";
  $construction_clearance = "Construction Clearance";
  $material_delivery = "Material Delivery";
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
   WHERE payments_list.collection_fee_id = :paymentId AND payments_list.archive = :ACTIVE AND payments_list.transaction_number = :transactionNumberId
   ";
  $data = [
    "paymentId" => $paymentId,
    "ACTIVE" => $ACTIVE,
    "transactionNumberId" => $transactionNumberId
  ];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  if ($stmt->rowCount() > 0) {
    while ($result1 = $stmt->fetch()) {
      $quantity = $result1['quantity'];
      $amount = $result1['paid'];
      $payment = $result1['category'];
      $date_paid = date("F j, Y g:iA", strtok("now"));
      $remarks = $result1['remarks'];
      $paid_by = $result1['paid_by'];

      $total_ammount += $amount;
      $table_result .= '
      <tr>
      <td>'. $quantity .'</td>
      <td>'. $payment .'</td>
      <td>'. $amount .'</td>
    </tr>
      ';
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
      <h5 class="details-title text-secondary">Payment Details</h5>
      <p class="m-0">Transaction Number: <b id="transaction_number"><?php echo $transactionNumberId; ?></b></p>
      <p class="m-0">Paid By: <b id="paid_by"><?php echo $paid_by; ?></b></p>
      <p class="m-0">Date Paid: <b id="date_paid"><?php echo $date_paid; ?></b></p>
     
    </div>
    <div class="w-50">
    <p class="m-0">Remarks: <b id="remarks"><?php echo $remarks; ?></b></p>

    </div>
  </div>
  <div class="divider-receipt"></div>
  <h5 class="text-secondary">Payment Summary:</h5>
  <table class="table">
    <thead>
      <tr>
        <th scope="col" width="5%">Quantity</th>
        <th scope="col" width="20%">Payment</th>
        <th scope="col" width="15%">Amount</th>
      </tr>
    </thead>
    <tbody class="table_result">
    <?php echo $table_result; ?>
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
          <input type="text" class="form-control" id="total_amount" value="<?php echo $total_ammount; ?>">
        </div>
      </div>
    </div>
  </div>
</div>