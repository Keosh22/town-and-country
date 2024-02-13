
<?php
require_once("../libs/server.php");
session_start();

DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');

$server = new Server;
?>

<?php

$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];



$query2 = "SELECT * FROM payments_list WHERE DATE(date_created) BETWEEN :start_date AND :end_date AND id = :user_id";


$connection2 = $server->openConn();
$stmt2 = $connection2->prepare($query2);
$stmt2->execute($data2);

header('Content-Type: application/json');

if ($stmt2->rowCount() > 0) {
    $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result2);
} else {
    echo json_encode(['error' => 'No data found']);
    exit();
}
?>