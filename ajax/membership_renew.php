<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$server = new Server;
session_start();
if (isset($_POST['homeowners_id']) && isset($_POST['collection_fee_id']) && isset($_POST['membership_fee'])) {
  $date_created = date("Y-m-d H:s:iA", strtotime("now"));
  $homeowners_id = filter_input(INPUT_POST, 'homeowners_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $collection_fee_id = filter_input(INPUT_POST, 'collection_fee_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $membership_fee = filter_input(INPUT_POST, 'membership_fee', FILTER_SANITIZE_SPECIAL_CHARS);
  $remarks = "";
  $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);
  $Member = "Member";
  $admin_name = $_SESSION['admin_name'];
  $transaction_number = $server->transactionNumberGenerator();

  if ($status == "EXPIRED") {
    $remarks = "Renew Membership";
  } elseif ($status == "Non-member") {
    $remarks = "New Membership";
  }


  $query1 = "INSERT INTO payments_list (transaction_number, homeowners_id, collection_fee_id, date_created, paid, remarks, admin) VALUES (:transaction_number, :homeowners_id, :collection_fee_id, :date_created, :membership_fee, :remarks, :admin)";
  $data1 = [
    "transaction_number" => $transaction_number,
    "homeowners_id" => $homeowners_id,
    "collection_fee_id" => $collection_fee_id,
    "date_created" => $date_created,
    "membership_fee" => $membership_fee,
    "remarks" => $remarks,
    "admin" => $admin_name
  ];
  $connection1 = $server->openConn();
  $stmt1 = $connection1->prepare($query1);
  $stmt1->execute($data1);
  if ($stmt1->rowCount() > 0) {
    $query2 = "UPDATE homeowners_users SET status = :Member, date_created = :date_created WHERE id = :homeowners_id";
    $data2 = [
      "Member" => $Member,
      "date_created" => $date_created,
      "homeowners_id" => $homeowners_id
    ];
    $connection2 = $server->openConn();
    $stmt2 = $connection2->prepare($query2);
    $stmt2->execute($data2);
    if($stmt2->rowCount() < 0){
      $_SESSION['status'] = "Payment Success";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "success";
      
    }
  }
  echo $transaction_number;
}
?>