<?php
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;
if (isset($_POST['construction_payment_id'])) {
  $construction_payment_id = filter_input(INPUT_POST, 'construction_payment_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $ACTIVE = 'ACTIVE';
  $REFUNDED = 'REFUNDED';

  $query1 = "UPDATE construction_payment SET refund = :REFUNDED WHERE id = :construction_payment_id AND archive = :ACTIVE";
  $data1 = [
    "REFUNDED" => $REFUNDED,
    "construction_payment_id" => $construction_payment_id,
    "ACTIVE" => $ACTIVE
  ];
  $connection1 = $server->openConn();
  $stmt1 = $connection1->prepare($query1);
  $stmt1->execute($data1);
  if($stmt1->rowCount() > 0){
    $_SESSION['status'] = "Construction Bond Refunded";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "success";
  }
}
?>

