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
  $payment = urldecode(filter_input(INPUT_GET, 'payment', FILTER_SANITIZE_SPECIAL_CHARS));
  $month = filter_input(INPUT_GET, 'month', FILTER_SANITIZE_SPECIAL_CHARS);
  $month_num = date("m", strtotime($month));
  $year = filter_input(INPUT_GET, 'year', FILTER_SANITIZE_SPECIAL_CHARS);
  $date_created = date("Y-m-d H:i:sA", strtotime("now"));
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

  
  $query3 = "SELECT
  payments_list.id as payment_id,
  payments_list.paid,
  payments_list.date_created as payment_date_created,
  payments_list.collection_fee_id,
  collection_fee.category,
  collection_fee.description
  FROM payments_list
  INNER JOIN collection_fee ON payments_list.collection_fee_id = collection_fee.id
  WHERE YEAR(payments_list.date_created) = :year AND MONTH(payments_list.date_created) = :month AND collection_fee.category = :payment  AND  payments_list.archive = :ACTIVE
  ";
  $data3 = [
    "year" => $year,
    "month" => $month_num,
    "payment" => $payment,
    "ACTIVE" => $ACTIVE
  ];
  $connection3 = $server->openConn();
  $stmt3 = $connection3->prepare($query3);
  $stmt3->execute($data3);
  if ($stmt3->rowCount() > 0) {
    $admin = $_SESSION['admin_name'];
    if (isset($month)) {
      $report_date = "Monthly report of " . date("F", strtotime($month)) . "-" . date("Y", strtotime($year));
    } else {
      $report_date = "Annual report of " . $year;
    }
    while ($result3 = $stmt3->fetch()) {
      $category = $result3['category'];
      $additional_payment_id = $result3['payment_id'];
      $paid = $result3['paid'];
      $amount += intval($paid);
      $current_date = date("F j, Y - g:iA", strtotime($result3['payment_date_created']));
    }
    if (isset($additional_payment_id)) {
      $isDisabled = false;
    }

    $table_body = '
    <tr>
      <td></td>
      <td>' . $category . '</td>
      <td>' . date("F", strtotime($month)) . "-" . date("Y", strtotime($year)) . '</td>
      <td>' . $amount . '</td>
    </tr>
      ';
    $table_head = '
    <tr>
    <th width="5%">#</th>
    <th width="10%">Payment</th>
    <th width="10%">Date</th>
    <th width="10%">Total Collection</th>
  </tr>
    ';
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
      <p class="m-0">Payment: <b id="payment_rp"><?php if(isset($category)) echo $category; ?></b></p>
      <p class="m-0">Report Date: <b id="report_date_rp"><?php echo date("F", strtotime($month)) . "-" . date("Y", strtotime($year)); ?></b></p>
      <p class="m-0">Date Created: <b id="date_created_rp"><?php echo $date_created ?></b></p>
    </div>
    <div class="w-50">
      <br>
      <p class="m-0">Printed By: <b id="created_by"><?php echo $admin ?></b></p>
    </div>
  </div>
  <div class="divider-receipt"></div>
  <h5 class="text-secondary">Report Summary:</h5>
  <table class="table" id="print_reports_table">
    <thead id="print_reports_thead">
    <?php echo $table_head ?>
    </thead>
    <tbody id="print_reports_tbody">
    <?php echo $table_body ?>
    </tbody>
  </table>

  <!-- <div class="flex">
                            <div class="w-50">
                              <div class="row align-items-center">
                                <div class="col-12 d-flex">
                                  <span class="border-bottom"><b id="admin_name"></b></span>
                                </div>
                                <div class="col-12 d-flex">
                                  <span class="text-secondary">Process by</span>
                                </div>
                              </div>
                            </div>
                            <div class="w-50">
                              <div class="row align-items-center">
                                <div class="col-auto">
                                  <label for="total_amount" class="form-label">Total Amount:</label>
                                </div>
                                <div class="col-4">
                                  <input type="text" class="form-control" id="total_amount">
                                </div>
                              </div>
                            </div>
                          </div> -->
</div>