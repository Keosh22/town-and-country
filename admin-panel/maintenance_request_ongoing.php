<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server;

if (isset($_POST['maintenance_request_id'])) {
  
  $maintenance_request_id = filter_input(INPUT_POST, 'maintenance_request_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $address = $_POST['address'];
  $ONGOING = "ONGOING";

  $query = "UPDATE maintenance_request SET status = :ONGOING WHERE id = :maintenance_request_id";
  $data = [
    "ONGOING" => $ONGOING,
    "maintenance_request_id" => $maintenance_request_id
  ];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  
  if ($stmt->rowCount() > 0) {
    $_SESSION['status'] = "Request Updated";
    $_SESSION['text'] = "This maintenance request is now ongoing";
    $_SESSION['status_code'] = "success";
    $action = "Maintenance Request: Property " . $address . " update to Ongoing";
    $server->insertActivityLog($action);
  } else {
    $_SESSION['status'] = "Request Update Failed";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "error";
  }
}

?>