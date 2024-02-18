
<?php
session_start();
require_once "../libs/server.php";

?>

<?php


  // Get the values of start date and end date from $_POST
  // $startDate = $_GET['start_date'];
  // $endDate = $_GET['end_date'];


  $server = new Server;
  $id = $_SESSION["user_id"];
  $date_query =  "SELECT 
  MAX(DATE_FORMAT(date_created, '%Y-%m-%d')) AS max_year_month,
  MIN(DATE_FORMAT(date_created, '%Y-%m-%d')) AS min_year_month
  FROM payments_list 
  WHERE payments_list.homeowners_id = :user_id;";

  $query =  "SELECT
  payments_list.id,
  payments_list.transaction_number,
  payments_list.homeowners_id,
  payments_list.property_id,
  payments_list.collection_id,
  payments_list.collection_fee_id,
  payments_list.date_created,
  payments_list.paid,
  homeowners_users.id,
  homeowners_users.account_number,
  homeowners_users.id,
  homeowners_users.firstname,
  homeowners_users.lastname,
  homeowners_users.middle_initial,
  homeowners_users.blk,
  homeowners_users.lot,
  homeowners_users.street,
  homeowners_users.phase,

  property_list.id,

  collection_list.id,
  collection_list.property_id,
  collection_list.collection_fee_id,
  collection_list.month,
  collection_list.year,


  collection_list.balance,
  collection_list.status,
  collection_fee.id,
  collection_fee.category,
  collection_fee.fee



  FROM payments_list
  INNER JOIN homeowners_users ON payments_list.homeowners_id = homeowners_users.id
  INNER JOIN property_list ON payments_list.property_id = property_list.id
  INNER JOIN collection_list ON payments_list.collection_id = collection_list.id
  INNER JOIN collection_fee ON payments_list.collection_fee_id = collection_fee.id


  WHERE payments_list.homeowners_id = :user_id
  AND DATE(payments_list.date_created) >= :start_date
  AND DATE(payments_list.date_created) <= :end_date

  ORDER BY date_created DESC;";


  $data1 = ["user_id" => $id];
  // // $data2 = [
  //   "user_id" => $id,
  //   "start_date" => $startDate,
  //   "end_date" => $endDate

  // ];

  $connection = $server->openConn();

  $stmt1 = $connection->prepare($date_query);
  $stmt1->execute($data1);

  // $stmt2 =  $connection->prepare($query);
  // $stmt2->execute($data2);

  header('Content-Type: application/json');
  //$response = array();

  if ($stmt1->rowCount() > 0) {
      $result = $stmt1->fetch(PDO::FETCH_ASSOC);
      echo json_encode($result);

  } else {
      $result = array('error'=> "Not date range found!");
  }


  // if ($stmt2->rowCount() > 0) {
  //   $response["payment_data"] = $stmt2->fetch(PDO::FETCH_ASSOC);
    
  // } else {
  //   $response["payment_data"] = array('error'=> "Not date range found!");
  // }



  ?>