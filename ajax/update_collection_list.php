<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$server = new Server;
session_start();
$current_date = date("Y-m-d H:i:sA", strtotime("now"));
$current_year = date("Y", strtotime("now"));


if (isset($_POST['id_array']) && isset($_POST['homeowners_id']) && isset($_POST['property_id'])) {


  $paid = "PAID";


  // collection id in array
  $id_array = $_POST['id_array'];
  $homeowners_id = $_POST['homeowners_id'];
  $property_id = $_POST['property_id'];
  $collection_fee_id = $_POST['collection_fee_id'];
  $paid_amount = $_POST['amount'];
  $remarks = filter_input(INPUT_POST, 'remarks', FILTER_SANITIZE_SPECIAL_CHARS);
  $paid_by = filter_input(INPUT_POST, 'paid_by', FILTER_SANITIZE_SPECIAL_CHARS);
  $balance = $_POST['balance'];
  $i = 0;
  $admin = $_SESSION['admin_name'];



  foreach ($id_array as $id) {

    
    $current_balance = $balance[$i];
    //Update status to PAID
    $query1 = "UPDATE collection_list SET status = :paid, date_paid = :date_paid WHERE id = :id";
    $data1 = [
      "paid" => $paid,
      "id" => $id,
      "date_paid" => $current_date
    ];
    $connection1 = $server->openConn();
    $stmt1 = $connection1->prepare($query1);
    $stmt1->execute($data1);


    // check if there is existing record
    $query2 = "SELECT * FROM payments_list WHERE collection_id = :id";
    $data2 = ["id" => $id];
    $connection2 = $server->openConn();
    $stmt2 = $connection2->prepare($query2);
    $stmt2->execute($data2);
    $count = $stmt2->rowCount();


    if ($count > 0) {
      $_SESSION['status'] = "Error";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "error";
    } else {

      if (empty($transaction_number)) {
        $ACTIVE = "ACTIVE";
        $transaction_number = $server->transactionNumberGenerator();
        // // Transaction Number Generator
        // $query4 = "SELECT transaction_number FROM transaction_number_list ORDER BY transaction_number DESC LIMIT 1";
        // // $data4 = ["ACTIVE" => $ACTIVE];
        // $connection4 = $server->openConn();
        // $stmt4 = $connection4->prepare($query4);
        // $stmt4->execute();
        // if ($stmt4->rowCount() > 0) {
        //   if ($row = $stmt4->fetch()) {

        //     $result = $row['transaction_number'];
        //     $get_number = str_replace("TN-", "", $result);
        //     $id_increment = $get_number + 1;
        //     $get_string = str_pad($id_increment, 7, 0, STR_PAD_LEFT);
        //     $transaction_number = "TN-" . $get_string;

            // $query5 = "INSERT INTO transaction_number_list (transaction_number) VALUES (:transaction_number)";
            // $data5 = ["transaction_number" => $transaction_number];
            // $connection5 = $server->openConn();
            // $stmt5 = $connection5->prepare($query5);
            // $stmt5->execute($data5);
        //   }
        // }
      } 
   
      // if there is no record, Insert a paid receipt record to this table
      $query3 = "INSERT INTO payments_list (transaction_number, homeowners_id, property_id, collection_id, collection_fee_id, date_created, paid, remarks, admin, paid_by) VALUES (:transaction_number, :homeowners_id, :property_id, :collection_id, :collection_fee_id, :date_created, :paid, :remarks, :admin, :paid_by)";
      $data3 = [
        "transaction_number" => $transaction_number,
        "homeowners_id" => $homeowners_id,
        "property_id" => $property_id,
        "collection_id" => $id,
        "collection_fee_id" => $collection_fee_id,
        "date_created" => $current_date,
        "paid" => $current_balance,
        "remarks" => $remarks,
        "admin" => $admin,
        "paid_by" => $paid_by
      ];
      $connection3 = $server->openConn();
      $stmt3 = $connection3->prepare($query3);
      $stmt3->execute($data3);
    }
    $i += 1;
  }


echo $transaction_number;



  $_SESSION['status'] = "Payment Success";
  $_SESSION['text'] = "";
  $_SESSION['status_code'] = "success";
  $action = "Payment: Transaction No# " . $transaction_number . " Monthly Dues";
  $server->insertActivityLog($action);
} else {
  $_SESSION['status'] = "Something went wrong";
  $_SESSION['text'] = "";
  $_SESSION['status_code'] = "error";
}


?>

