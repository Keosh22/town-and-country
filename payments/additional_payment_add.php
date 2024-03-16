<?php
require_once("../libs/server.php");
date_default_timezone_set('Asia/Manila');
?>

<?php
session_start();
$server = new Server;

if (isset($_POST['payment_arr']) && isset($_POST['amount']) && isset($_POST['amount']) && $_SERVER['REQUEST_METHOD'] == "POST") {
  $payment_jsonObj = $_POST['payment_arr'];
  $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_SPECIAL_CHARS);
  $paid_by = filter_input(INPUT_POST, 'paid_by', FILTER_SANITIZE_SPECIAL_CHARS);
  $remarks = filter_input(INPUT_POST, 'remarks', FILTER_SANITIZE_SPECIAL_CHARS);
  $date_created = date("Y-m-d H:i:sA", strtotime("now"));
  $admin = $_SESSION['admin_name'];
  $transction_number = $server->transactionNumberGenerator();
  $i = 0;
  $payment_arr = $payment_jsonObj['payment'];
  $payment_id = 0;

  if (strlen($paid_by) == 0) {
    $_SESSION['status'] = "Payment Error";
    $_SESSION['text'] = "Please fill the the required fields";
    $_SESSION['status_code'] = "error";
  } else {
    if (count($payment_arr) > 0) {
      foreach ($payment_arr as $payment) {
        $payment_id = $payment['payment'];
        $query = "INSERT INTO payments_list (transaction_number, collection_fee_id, date_created, paid, remarks, paid_by, quantity, admin) VALUES (:transaction_number, :collection_fee_id, :date_created, :paid, :remarks, :paid_by, :quantity, :admin)";
        $data = [
          "transaction_number" => $transction_number,
          "collection_fee_id" => $payment['payment'],
          "date_created" => $date_created,
          "paid" => $payment['amount'],
          "remarks" => $remarks,
          "paid_by" => $paid_by,
          "quantity" => $payment['quantity'],
          "admin" => $admin
        ];
        $connection = $server->openConn();
        $stmt = $connection->prepare($query);
        $stmt->execute($data);
      }
      if ($stmt->rowCount() > 0) {
        $_SESSION['status'] = "Payment Success";
        $_SESSION['text'] = "";
        $_SESSION['status_code'] = "success";
        $action = "Payment: Transaction No# " . $transction_number . " Additional payment";
        $server->insertActivityLog($action);

        $response = [
          "collection_fee_id" => $payment_id,
          "transaction_number" => $transction_number,
        ];
        echo json_encode($response);
      }
      
    }
  }
}


?>