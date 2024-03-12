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

if (isset($_GET['payment']) && isset($_GET['year'])) {
  $ACTIVE = "ACTIVE";
  $payment = filter_input(INPUT_GET, 'payment', FILTER_SANITIZE_SPECIAL_CHARS);
  $year = filter_input(INPUT_GET, 'year', FILTER_SANITIZE_SPECIAL_CHARS);
  $month = filter_input(INPUT_GET, 'month', FILTER_SANITIZE_SPECIAL_CHARS);
  $month_num = date("m", strtotime($month));
  $date_created = date("F j, Y - g:iA", strtotime("now"));
  $table_body = "";
  $table_head = "";
  $category = "";
  $response = [];
  $amount = 0;
  $number = 0;
  $refund_amount = 0;
  $current_date = "";
  $report_date = "";
  $admin = " ";
  $isDisabled = true;

  if (strtolower($payment) == strtolower("Material Delivery") || strtolower($payment) == strtolower("Construction Bond") || strtolower($payment) == strtolower("Construction Clearance")) {

    if (isset($month)) {
      $report_date = "Monthly report of " . date("F", strtotime($month)) . "-" . date("Y", strtotime($year));
    } else {
      $report_date = "Annual report of " . $year;
    }

    $query2 = "SELECT
    construction_payment.id as construction_payment_id,
    construction_payment.paid as construction_payment_paid,
    construction_payment.refund,
    collection_fee.category as construction_payment_category,
    collection_fee.description
    FROM construction_payment
    INNER JOIN collection_fee ON construction_payment.collection_fee_id = collection_fee.id
    WHERE YEAR(construction_payment.date_created) = :year AND MONTH(construction_payment.date_created) = :month AND construction_payment.archive = :ACTIVE AND collection_fee.category = :payment 
    ";
    $data2 = [
      "year" => $year,
      "month" => $month_num,
      "ACTIVE" => $ACTIVE,
      "payment" => $payment
    ];
    $connection2 = $server->openConn();
    $stmt2 = $connection2->prepare($query2);
    $stmt2->execute($data2);
    if ($stmt2->rowCount() > 0) {
      $current_date = date("F j, Y - g:iA", strtotime("now"));
      $admin = $_SESSION['admin_name'];
      while ($result2 = $stmt2->fetch()) {
        $construction_payment_paid = $result2['construction_payment_paid'];
        $construction_payment_category = $result2['construction_payment_category'];
        $construction_payment_id = $result2['construction_payment_id'];
        $refund = $result2['refund'];

        $amount += intval($construction_payment_paid);
        if ($refund == "REFUNDED") {
          $refund_amount += intval($construction_payment_paid);
        }


        $number += 1;
      }

      $category = $payment;
      if (isset($construction_payment_id)) {
        $isDisabled = false;
      }


  
      // Construction Bond
      if (strtolower($payment) == strtolower("Construction Bond")) {
        $amount -= $refund_amount;
        $table_head = '
          <tr>
          <th width="5%">#</th>
          <th width="15%">Payment</th>
          <th width="15%">Date</th>
          <th width="10%">Refunded</th>
          <th width="10%">Outstanding Total</th>
        </tr>
          ';
        $table_body = '
          <tr>
            <td></td>
            <td>' . $construction_payment_category . '</td>
            <td>' . date("F", strtotime($month)) . "-" . date("Y", strtotime($year)) . '</td>
            <td>' . $refund_amount . '</td>
            <td>' . $amount . '</td>
          </tr>
            ';
      } else {
        $table_head = '
        <tr>
        <th width="5%">#</th>
        <th width="10%">Payment</th>
        <th width="10%">Date</th>
        <th width="10%">Total Collection</th>
      </tr>
        ';
        $table_body = '
      <tr>
        <td></td>
        <td>' . $construction_payment_category . '</td>
        <td>' . date("F", strtotime($month)) . "-" . date("Y", strtotime($year)) . '</td>
        <td>' . $amount . '</td>
      </tr>
        ';
      }
    }
  }
}

?>
<div class="receipt-wrapper py-2" id="payment_report">
  <h2 class="text-center title-receipt"><b>Payment Report</b></h2>
  <h5 class="text-center title-receipt m-0">Town And Country Heights Homeowners' ASSN. INC.</h5>
  <p class="text-center title-receipt text-secondary mb-1">Clubhouse 1 La Salle Avenue, Town & Country Heights San Luis, Antipolo City</p>
  <div class="divider-receipt"></div>
  <div class="flex">
    <div class="w-50">
      <h5 class="details-title text-secondary">Payment Report Details:</h5>
      <p class="m-0">Payment: <b id="payment_rp"><?php echo $category;  ?></b></p>
      <p class="m-0">Report Date: <b id="report_date_rp"><?php echo $report_date;  ?></b></p>
      <p class="m-0">Date Created: <b id="date_created_rp"><?php echo $date_created;  ?></b></p>
    </div>
    <div class="w-50">
      <br>
      <p class="m-0">Printed By: <b id="created_by"><?php  echo $admin; ?></b></p>
    </div>
  </div>
  <div class="divider-receipt"></div>
  <h5 class="text-secondary">Report Summary:</h5>
  <table class="table" id="print_reports_table">
    <thead id="print_reports_thead">
      <?php echo $table_head; ?>
    </thead>
    <tbody id="print_reports_tbody">
      <?php echo $table_body; ?>
    </tbody>
  </table>


</div>