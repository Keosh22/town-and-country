<?php
require_once("../libs/server.php");

$server = new Server;

// Assuming $_SESSION["user_id"] is set
$id = $_SESSION["user_id"];

$query = "SELECT
    payments_list.id,
    payments_list.transaction_number,
    payments_list.homeowners_id,
    payments_list.property_id,
    payments_list.collection_id,
    payments_list.collection_fee_id,
    payments_list.date_created,
    payments_list.paid,
    homeowners_users.id AS user_id,
    homeowners_users.account_number,
    property_list.id AS property_id,
    collection_list.id AS collection_id,
    collection_list.property_id AS collection_property_id,
    collection_list.collection_fee_id AS collection_fee_id,
    collection_list.balance,
    collection_list.status,
    collection_fee.id AS fee_id,
    collection_fee.category,
    collection_fee.fee
FROM
    payments_list
INNER JOIN homeowners_users ON payments_list.homeowners_id = homeowners_users.id
INNER JOIN property_list ON payments_list.property_id = property_list.id
INNER JOIN collection_list ON payments_list.collection_id = collection_list.id
INNER JOIN collection_fee ON payments_list.collection_fee_id = collection_fee.id
WHERE
    payments_list.homeowners_id = :user_id";

$data = ["user_id" => $id];
$connection = $server->openConn();
$stmt = $connection->prepare($query);
$stmt->execute($data);
$count = $stmt->rowCount();

$response = []; // Define an empty array to store the response

if ($count > 0) {
    while ($result = $stmt->fetch()) {
        $transaction_number = $result["transaction_number"];

        // User information
        $user_id = $result['user_id'];
        $account_number = $result['account_number'];

        // Collection fee details
        $collection_fee_id = $result["category"];
        $date_created = $result["date_created"];
        $status = $result["status"];

        // Populate $response array
        $response[] = [
            "transaction_number" => $transaction_number,
            "user_id" => $user_id,
            "account_number" => $account_number,
            "collection_fee_id" => $collection_fee_id,
            "date_created" => $date_created,
            "status" => $status,
        ];
    }
}

echo json_encode($response);
?>
