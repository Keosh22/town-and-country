<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$server = new Server;
session_start();

if (isset($_POST['payment'])) {
  $ACTIVE = "ACTIVE";
  $payment = filter_input(INPUT_POST, 'payment', FILTER_SANITIZE_SPECIAL_CHARS);
  $month = filter_input(INPUT_POST, 'month', FILTER_SANITIZE_SPECIAL_CHARS);
  $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_SPECIAL_CHARS);
  $date_created = date("Y-m-d H:i:sA", strtotime("now"));
  $table_body = "";
  $table_head = "";
  $response = [];
  $amount = 0;
  $number = 0;
  $current_date = date("F j, Y - g:iA", strtotime("now"));
  $report_date = "";
  $admin = $_SESSION['admin_name'];



  // Check if payment is MONTHLY DUES
  if ($payment == "18") {
    if (isset($month)) {
      $report_date = "Monthly report of " . date("F", strtotime($month)) . "-" . date("Y", strtotime($year)) ;
    } else {
      $report_date = "Annual report of " . $year;
    }

    $query1 = "SELECT
    payments_list.paid,
    payments_list.date_created as payment_date_created,
    payments_list.collection_fee_id,
    collection_fee.category,
    collection_fee.description
    FROM payments_list
    INNER JOIN collection_fee ON payments_list.collection_fee_id = collection_fee.id
    WHERE YEAR(payments_list.date_created) = :year AND MONTH(payments_list.date_created) = :month AND payments_list.collection_fee_id = :payment  AND  archive = :ACTIVE
    ";
    $data1 = [
      "year" => $year,
      "month" => $month,
      "payment" => $payment,
      "ACTIVE" => $ACTIVE
    ];
    $connection1 = $server->openConn();
    $stmt1 = $connection1->prepare($query1);
    $stmt1->execute($data1);
    if ($stmt1->rowCount() > 0) {

      while ($result1 = $stmt1->fetch()) {

        $paid = $result1['paid'];
        $date_created = date("F j, Y - g:iA", strtotime($result1['payment_date_created']));
        $category = $result1['category'];
        $description = $result1['description'];

        $amount += intval($paid);
        $number += 1;
      }



      $table_body = '
      <tr>
        <td></td>
        <td>' . $category . '</td>
        <td>'. date("F", strtotime($month)) . "-" . date("Y", strtotime($year)) .'</td>
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

      $response = [
        "table_body" => $table_body,
        "table_head" => $table_head,
        "payment" => $category,
        "report_date" => $report_date,
        "date_created" => $current_date,
        "admin" => $admin
      ];
    } else {
    }
  }
  echo json_encode($response);
}


?>

