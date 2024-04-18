
<?php
session_start();
require_once "../libs/server.php";

?>

<?php




$server = new Server;
$id = $_SESSION["user_id"];
$date_query =
    "SELECT 
    DATE_FORMAT(date_created, '%Y-%m-%d') AS transaction_date
  FROM 
    payments_list
  WHERE 
    payments_list.homeowners_id = :user_id
    AND DATE_FORMAT(date_created, '%Y-%m-%d') IN (:dates_to_check)
  GROUP BY 
    DATE_FORMAT(date_created, '%Y-%m-%d')
  ORDER BY 
    DATE_FORMAT(date_created, '%Y-%m-%d') ASC;";



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
    $result = array('error' => "Not date range found!");
}


// if ($stmt2->rowCount() > 0) {
//   $response["payment_data"] = $stmt2->fetch(PDO::FETCH_ASSOC);

// } else {
//   $response["payment_data"] = array('error'=> "Not date range found!");
// }



?>