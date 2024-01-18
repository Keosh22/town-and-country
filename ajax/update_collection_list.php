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





  foreach ($id_array as $id) {


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
        // Transaction Number Generator
        $query4 = "SELECT * FROM payments_list ORDER BY transaction_number DESC LIMIT 1";
        $connection4 = $server->openConn();
        $stmt4 = $connection4->prepare($query4);
        $stmt4->execute();
        if ($stmt4->rowCount() > 0) {
          if ($row = $stmt4->fetch()) {

            $result = $row['transaction_number'];
            $get_number = str_replace("TN", "", $result);
            $id_increment = $get_number + 1;
            $get_string = str_pad($id_increment, 8, 0, STR_PAD_LEFT);
            $transaction_number = "TN" . $get_string;
          }
        }
      } 
   
      // if there is no record, Insert a paid receipt record to this table
      $query3 = "INSERT INTO payments_list (transaction_number, homeowners_id, property_id, collection_id, date_created, paid) VALUES (:transaction_number, :homeowners_id, :property_id, :collection_id, :date_created, :paid)";
      $data3 = [
        "transaction_number" => $transaction_number,
        "homeowners_id" => $homeowners_id,
        "property_id" => $property_id,
        "collection_id" => $id,
        "date_created" => $current_date,
        "paid" => $paid
      ];
      $connection3 = $server->openConn();
      $stmt3 = $connection3->prepare($query3);
      $stmt3->execute($data3);
    }
  }




  $_SESSION['status'] = "Payment Success";
  $_SESSION['text'] = "";
  $_SESSION['status_code'] = "success";
} else {
  $_SESSION['status'] = "Error";
  $_SESSION['text'] = "";
  $_SESSION['status_code'] = "error";
}


?>

