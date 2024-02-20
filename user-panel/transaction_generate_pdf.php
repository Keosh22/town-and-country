<?php
session_start();
require_once("../libs/server.php");
require_once("../includes/header.php");
require_once("../tcpdf/include");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');


// if(isset($_POST["start_date"]) && isset($_POST["end_date"])){
//   $start_date = $_POST["start_date"];
//   $end_date = $_POST["end_date"];

// }

$server = new Server;
$startDate = isset($_GET['start_date']) ? urldecode($_GET['start_date']) : '';
$endDate = isset($_GET['end_date']) ? urldecode($_GET['end_date']): '';
$id = $_SESSION["user_id"];

$tableRows = "";

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
homeowners_users.account_number AS account_number,
homeowners_users.id,
homeowners_users.firstname AS firstname,
homeowners_users.lastname AS lastname,
homeowners_users.middle_initial AS middle_initial,
homeowners_users.blk AS blk,
homeowners_users.lot AS lot,
homeowners_users.street AS street,
homeowners_users.phase AS phase,

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


$data = [
  "user_id" => $id,
  "start_date" => $startDate,
  "end_date" => $endDate
];

$connection = $server->openConn();

$stmt = $connection->prepare($query);
$stmt->execute($data);

if($stmt->rowCount()>0){
  while($result = $stmt->fetch()){
    //user data
    $account_number = $result["account_number"];
    $name = $result["lastname"] . ", " . $result["firstname"] . " " . $result["middle_initial"] . ".";
    
    $address = $result["blk"] . " " . $result["lot"] . " " . $result["street"] . " " . $result["phase"];


    // table data
    $category = $result["category"];
    $date_created = $result["date_created"];
    $status = $result["status"];
    $month = $result["month"];
    $year = $result["year"];
    $monthyear = "{$month}, {$year}";
    

    $tableRows .= "<td>$date_created</td>";
    $tableRows .= "<td>{$result['transaction_number']}</td>";
    $tableRows .= "<td>$category</td>";
    $tableRows .= "<td>$monthyear</td>";
    $tableRows .= "</tr>";
}
} else {
$tableRows = "<tr><td colspan='4'>No results</td></tr>";
}

$pdf = new TCPDF()

?>

<div class="receipt-wrapper">
<h1 class="text-center title-receipt">Payment Receipt</h1>
<h5 class="text-center title-receipt">Town And Country Heights Subdivision</h5>
<div class="divider-receipt"></div>
<div class="flex">
    <div class="w-50">
        <h4 class="details-title">Homeowners Details</h4>
        <p>Account Number: <b id="account_number"><?php echo $account_number; ?></b></p>
        <p>Name: <b id="name"><?php echo $name;?></b></p>
        <p>Current Address: <b id="current_address"><?php echo $address; ?></b></p>
    </div>
</div>
<div class="divider-receipt"></div>
<h4>Payment Summary:</h4>
<table class="table">
    <thead>
        <tr>
            <th scope="col" width="30%">DATE AND TIME</th>
            <th scope="col" width="20%">TRANSACTION NUMBER</th>
            <th scope="col" width="25%">CATEGORY</th>
            <th scope="col" width="25%">MONTH AND YEAR</th>
        </tr>
    </thead>
    <tbody>
        <?php echo $tableRows; ?>
    </tbody>
</table>
</div>