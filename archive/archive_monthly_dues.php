<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server;

if (isset($_POST['payment_id']) && isset($_POST['transaction_number'])) {

  $payment_id = filter_input(INPUT_POST, 'payment_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $transaction_number = filter_input(INPUT_POST, 'transaction_number', FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);


  $admin_id = $_SESSION['admin_id'];

  $query1 = "SELECT * FROM admin_users WHERE id = :admin_id";
  $data1 = ["admin_id" => $admin_id];
  $isTrue = $server->verifyPassword($query1, $data1, $password);

  if ($isTrue) {

    $connection1 = $server->openConn();
    $stmt1 = $connection1->prepare($query1);
    $stmt1->execute($data1);
    if ($stmt1->rowCount() > 0) {
      while ($result1 = $stmt1->fetch()) {
        $account_number = $result1['account_number'];
        $firstname = $result1['firstname'];
      }
    }

    // Get the payment list
    $query2 = "SELECT * FROM payments_list WHERE id = :payment_id AND transaction_number = :transaction_number";
    $data2 = ["payment_id" => $payment_id, "transaction_number" => $transaction_number];
    $connection2 = $server->openConn();
    $stmt2 = $connection2->prepare($query2);
    $stmt2->execute($data2);
    if ($stmt2->rowCount() > 0) {

      while ($result2 = $stmt2->fetch()) {
        $id = $result2['id'];
        $tn_number = $result2['transaction_number'];
        $homeowners_id = $result2['homeowners_id'];
        $property_id = $result2['property_id'];
        $collection_id = $result2['collection_id'];
        $collection_fee_id = $result2['collection_fee_id'];
        $collection_fee_id = $result2['collection_fee_id'];
        $date_created = $result2['date_created'];
        $paid = $result2['paid'];
      }
    }


    // Insert Archive
    $query3 = "INSERT INTO archive_payments_list (
      payment_list_id,
      transaction_number,
      homeowners_id,
      property_id,
      collection_id,
      collection_fee_id,
      date_created,
      paid
      )
      VALUES (
      :payment_list_id,
      :transaction_number,
      :homeowners_id,
      :property_id,
      :collection_id,
      :collection_fee_id,
      :date_created,
      :paid
      )
      ";
    $data3 = [
      "payment_list_id" => $id,
      "transaction_number" => $tn_number,
      "homeowners_id" => $homeowners_id,
      "property_id" => $property_id,
      "collection_id" => $collection_id,
      "collection_fee_id" => $collection_fee_id,
      "date_created" => $date_created,
      "paid" => $paid
    ];
    $connection3 = $server->openConn();
    $stmt3 = $connection3->prepare($query3);
    $stmt3->execute($data3);
    if ($stmt3->rowCount() > 0) {
      $available = "AVAILABLE";
      // Update collection list to AVAILABLE
      $query4 = "UPDATE collection_list SET status = :available WHERE id = :collection_id";
      $data4 = ["available" => $available,"collection_id" => $collection_id];
      $connection4 = $server->openConn();
      $stmt4 = $connection4->prepare($query4);
      $stmt4->execute($data4);

      $query5 = "DELETE FROM payments_list WHERE id = :payment_id AND transaction_number = :transaction_number";
      $data5 = ["payment_id" => $payment_id, "transaction_number" => $transaction_number];
      $connection5 = $server->openConn();
      $stmt5 = $connection5->prepare($query5);
      $stmt5->execute($data5);

      $_SESSION['status'] = "Archive Success!";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "success";

    }
  } else {
    $_SESSION['status'] = "Failed!";
    $_SESSION['text'] = "You input a wrong password";
    $_SESSION['status_code'] = "error";
  }
} else {
}
?>