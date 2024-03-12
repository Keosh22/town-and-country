<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$server = new Server;
session_start();

if (isset($_POST['payment']) && isset($_POST['year'])) {
  $ACTIVE = "ACTIVE";
  $payment = filter_input(INPUT_POST, 'payment', FILTER_SANITIZE_SPECIAL_CHARS);
  $month = filter_input(INPUT_POST, 'month', FILTER_SANITIZE_SPECIAL_CHARS);
  $month_num = date("m", strtotime($month));
  $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_SPECIAL_CHARS);
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


  // Check if payment is MONTHLY DUES
  if (strtolower($payment) == strtolower("Monthly Dues") || strtolower($payment) == strtolower("Membership Fee")) {

    // $checkCategory = "";
    // $query = "SELECT id,category FROM collection_fee WHERE category = :payment status = :ACTIVE";
    // $data = ["payment" => $payment, "ACTIVE" => $ACTIVE];
    // $connection = $server->openConn();
    // $stmt = $connection->prepare($query);
    // $stmt->execute($data);
    // if ($stmt->rowCount() > 0) {
    //   while ($result = $stmt->fetch()) {
    //     $collection_fee_category = $result['category'];
    //     if ($checkCategory == $collection_fee_category) {
    //     } else {
    //       $collection_fee_id = $result['id'];
    //     }
    //     $checkCategory = $collection_fee_category;
    //   }
    // }



    $query1 = "SELECT
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
    $data1 = [
      "year" => $year,
      "month" => $month_num,
      "payment" => $payment,
      "ACTIVE" => $ACTIVE
    ];
    $connection1 = $server->openConn();
    $stmt1 = $connection1->prepare($query1);
    $stmt1->execute($data1);
    if ($stmt1->rowCount() > 0) {
      if (isset($month)) {
        $report_date = "Monthly report of " . date("F", strtotime($month)) . "-" . date("Y", strtotime($year));
      } else {
        $report_date = "Annual report of " . $year;
      }
      $current_date = date("F j, Y - g:iA", strtotime("now"));
      $admin = $_SESSION['admin_name'];
      while ($result1 = $stmt1->fetch()) {
        $payment_id = $result1['payment_id'];
        $paid = $result1['paid'];
        $date_created = date("F j, Y - g:iA", strtotime($result1['payment_date_created']));
        $category = $result1['category'];
        $description = $result1['description'];
        $amount += intval($paid);
        $number += 1;
      }

      if (isset($payment_id)) {
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
  // Construction Payment
  elseif (strtolower($payment) == strtolower("Material Delivery") || strtolower($payment) == strtolower("Construction Bond") || strtolower($payment) == strtolower("Construction Clearance")) {


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

      if (isset($month)) {
        $report_date = "Monthly report of " . date("F", strtotime($month)) . "-" . date("Y", strtotime($year));
      } else {
        $report_date = "Annual report of " . $year;
      }
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
          <th width="10%">Payment</th>
          <th width="10%">Date</th>
          <th width="10%">Refunded</th>
          <th width="10%">Outstanding total</th>
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
  } elseif (strtolower($payment) != strtolower("Material Delivery") || strtolower($payment) != strtolower("Construction Bond") || strtolower($payment) != strtolower("Construction Clearance") || strtolower($payment) != strtolower("Monthly Dues") || strtolower($payment) != strtolower("Membership Fee")) {




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





  $response = [
    "table_body" => $table_body,
    "table_head" => $table_head,
    "payment" => $category,
    "report_date" => $report_date,
    "date_created" => $current_date,
    "admin" => $admin,
    "disabled" => $isDisabled
  ];
  echo json_encode($response);
}


?>

