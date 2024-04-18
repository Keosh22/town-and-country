<?php
session_start();
require_once "../libs/server.php";

$server = new Server;
$id = $_SESSION["user_id"];

$date_query = "SELECT 
                DATE_FORMAT(date_created, '%Y-%m-%d') AS dates,
                MAX(DATE_FORMAT(date_created, '%Y-%m-%d')) AS max_year_month,
                MIN(DATE_FORMAT(date_created, '%Y-%m-%d')) AS min_year_month
                FROM payments_list 
                WHERE payments_list.homeowners_id = :user_id;";

$all_date = "SELECT 
              DATE_FORMAT(date_created, '%Y-%m-%d') AS dates
              FROM payments_list 
              WHERE payments_list.homeowners_id = :user_id;";

$data = ["user_id" => $id];

$connection = $server->openConn();

$stmt1 = $connection->prepare($date_query);
$stmt1->execute($data);

$stmt2 =  $connection->prepare($all_date);
$stmt2->execute($data);

header('Content-Type: application/json');

$response = array();

if ($stmt1->rowCount() > 0) {
    $result = $stmt1->fetch(PDO::FETCH_ASSOC);
    $response["date_range"] = $result;
} else {
    $response["date_range"] = array('error' => "No date range found!");
}

if ($stmt2->rowCount() > 0) {
    $result = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    $response["all_dates"] = $result;
} else {
    $response["all_dates"] = array('error' => "No dates found!");
}

echo json_encode($response);
