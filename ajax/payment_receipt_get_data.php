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

  $payment_id = $_POST['payment_id'];

  $query1 = "SELECT 
        payments_list.id as payment_id,
        payments_list.transaction_number,
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
        WHERE payments_list.id = :payment_id 
        ";
  $data1 = ["payment_id" => $payment_id];
  $connection1 = $server->openConn();
  $stmt1 = $connection1->prepare($query1);
  $stmt1->execute($data1);
  if ($stmt1->rowCount() > 0) {
    while ($result1 = $stmt1->fetch()) {
      $payment_id_result = $result1['payment_id'];
      $date_paid = date("F j, Y-g:iA", strtotime($result1['date_paid']));
      $transaction_number = $result1['transaction_number'];

      $account_number = $result1['account_number'];
      $firstname = $result1['firstname'];
      $middle_initial = $result1['middle_initial'];
      $lastname = $result1['lastname'];


      $blk = $result1['homeowners_blk'];
      $lot = $result1['homeowners_lot'];
      $street = $result1['homeowners_street'];
      $phase = $result1['homeowners_phase'];
    }

   
    $query2 = "SELECT 
    collection_fee.category,
    collection_fee.fee,
    collection_list.month,
    collection_list.year
    FROM payments_list 
    INNER JOIN collection_list ON payments_list.collection_id = collection_list.id
    INNER JOIN collection_fee ON payments_list.collection_fee_id = collection_fee.id
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
  
       $table_result = '<tr>
      <td>1</td>
      <td>' . $category . '</td>
      <td>' . $fee . '</td>
      <td>Collection of ' . $month . ' ' . $year . '</td>
      </tr>';
      }
    }

    $name = $firstname . " " . $middle_initial . " " . $lastname;
    $address = "BLK-" . $blk . " LOT-" . $lot . " " . $street . ", " . $phase;
    $summary = array(
      "name" => $name,
      "address" => $address,
      "payment_id" => $payment_id_result,
      "date_paid" => $date_paid,
      "transaction_number" => $transaction_number,
      "account_number" => $account_number,
      "table_result" => $table_result
    );
    
  }




  echo json_encode($summary);
} else {
  $_SESSION['status'] = "Warning";
  $_SESSION['text'] = "Something went wrong.";
  $_SESSION['status_code'] = "warning";
}
?>