
<?php
session_start();
require_once "../libs/server.php";
?>

<?php




$server = new Server;
$id = $_SESSION["user_id"];
$query1 =  "SELECT 
MAX(DATE_FORMAT(date_created, '%Y-%m-%d')) AS max_year_month,
MIN(DATE_FORMAT(date_created, '%Y-%m-%d')) AS min_year_month
FROM payments_list 
WHERE payments_list.homeowners_id = :user_id;";



$data1 = ["user_id" => $id];
$connection1 = $server->openConn();
$stmt1 = $connection1->prepare($query1);
$stmt1->execute($data1);

header('Content-Type: application/json');

if ($stmt1->rowCount() > 0) {
    $result = $stmt1->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
} else {
    echo json_encode(['error' => 'No data found']);
    exit();
}


?>