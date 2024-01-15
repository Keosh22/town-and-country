<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$server = new Server;
session_start();
$current_date = date("Y-m-d H:i:sA", strtotime("now"));


if (isset($_POST['id_array']) && isset($_POST['homeowners_id'])) {


  $paid = "PAID";


  // collection id in array
  $id_array = $_POST['id_array'];
  $homeowners_id = $_POST['homeowners_id'];


  // $array_count = count($id_array);
  // $counter = 0;

  // while ($counter < $array_count) {
  //   $id = $id_array[$counter];
  //   //Update status to PAID
  //   $query1 = "UPDATE collection_list SET status = :paid, date_paid = :date_paid WHERE id = :id";
  //   $data1 = [
  //     "paid" => $paid,
  //     "id" => $id,
  //     "date_paid" => $current_date
  //   ];
  //   $connection1 = $server->openConn();
  //   $stmt1 = $connection1->prepare($query1);
  //   $stmt1->execute($data1);

  //   // check if there is existing record
  //   $query2 = "SELECT * FROM payments_list WHERE collection_id: = :id";
  //   $data2 = ["collection_id" => $id];
  //   $connection2 = $server->openConn();
  //   $stmt2 = $connection2->prepare($query2);
  //   $stmt2->execute($data2);
  //   $count = $stmt2->rowCount();


  //   if ($count > 0) {
  //   } else {

  //     // if there is no record, Insert a paid receipt record to this table
  //     $query3 = "INSERT INTO payments_list (homeowners_id, collection_id, date_created, paid) VALUES (:homeowners_id, :collection_id, :date_created, :paid)";
  //     $data3 = [
  //       "homeowners_id" => $homeowners_id,
  //       "collection_id" => $id,
  //       "date_created" => $current_date,
  //       "paid" => $paid
  //     ];
  //     $connection3 = $server->openConn();
  //     $stmt3 = $connection3->prepare($query3);
  //     $stmt3->execute($data3);
  //   }
  //   $counter++;
  // }


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

    // // check if there is existing record
    // $query2 = "SELECT * FROM payments_list WHERE collection_id: = :id";
    // $data2 = ["collection_id" => $id];
    // $connection2 = $server->openConn();
    // $stmt2 = $connection2->prepare($query2);
    // $stmt2->execute($data2);
    // $count = $stmt2->rowCount();


    // if ($count > 0) {
    // } else {

    //   // if there is no record, Insert a paid receipt record to this table
    //   $query3 = "INSERT INTO payments_list (homeowners_id, collection_id, date_created, paid) VALUES (:homeowners_id, :collection_id, :date_created, :paid)";
    //   $data3 = [
    //     "homeowners_id" => $homeowners_id, 
    //     "collection_id" => $id,
    //     "date_created" => $current_date,
    //     "paid" => $paid
    //   ];
    //   $connection3 = $server->openConn();
    //   $stmt3 = $connection3->prepare($query3);
    //   $stmt3->execute($data3);
    // }
  }



  // foreach ($id_array as $id){
  //   echo $id;
  // }

  $_SESSION['status'] = "Payment Success";
  $_SESSION['text'] = "";
  $_SESSION['status_code'] = "success";
} else {
  $_SESSION['status'] = "Error";
  $_SESSION['text'] = "";
  $_SESSION['status_code'] = "error";
}


?>

