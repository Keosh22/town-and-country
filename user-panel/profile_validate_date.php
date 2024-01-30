
<?php
session_start();
require_once "../libs/server.php";
?>

<?php
$server = new Server;
$id = $_SESSION["user_id"];
$date_range =  "SELECT 
MAX(DATE_FORMAT(date_created, '%Y-%m')) AS max_year_month,
MIN(DATE_FORMAT(date_created, '%Y-%m')) AS min_year_month
FROM payments_list 
WHERE payments_list.homeowners_id = :user_id;";



$data = ["user_id" => $id];
$connection = $server->openConn();
$stmt = $connection->prepare($date_range);
$stmt->execute($data);

header('Content-Type: application/json');

if ($stmt->rowCount() > 0) {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
} else {
    echo json_encode(['error' => 'No data found']);
}


?>