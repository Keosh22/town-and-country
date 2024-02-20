<?php
require_once "../libs/server.php";

DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>


<?php
session_start();
$server = new Server;
if (isset($_POST['property_id_arr']) && isset($_POST['service_maintenance'])) {

  $property_id_arr = $_POST['property_id_arr'];
  $service_maintenance = filter_input(INPUT_POST, 'service_maintenance', FILTER_SANITIZE_SPECIAL_CHARS);
  $date_requested = date("Y-m-d H:i:sA", strtotime("now"));
  $ACTIVE = "ACTIVE";
  $PENDING = "PENDING";
  $ONGOING = "ONGOING";

  foreach ($property_id_arr as $property_id) {

    // Check first if there is current request 
    $query1 = "SELECT property_id, maintenance, status FROM maintenance_request WHERE property_id = :property_id AND maintenance = :service_maintenance AND archive = :ACTIVE AND status IN (:PENDING, :ONGOING)";
    $data1 = [
      "property_id" => $property_id,
      "service_maintenance" => $service_maintenance,
      "ACTIVE" => $ACTIVE,
      "PENDING" => $PENDING,
      "ONGOING" => $ONGOING
    ];

    $connection1 = $server->openConn();
    $stmt1 = $connection1->prepare($query1);
    $stmt1->execute($data1);

    if ($stmt1->rowCount() > 0) {

      $_SESSION['status'] = "Request Failed";
      $_SESSION['text'] = "One of your property already have requested a maintenance service.Please try again";
      $_SESSION['status_code'] = "error";
      break;
    } else {
      $query2 = "INSERT INTO maintenance_request (property_id, maintenance, date_created) VALUES (:property_id, :maintenance, :date_created) ";
      $data2 = [
        "property_id" => $property_id,
        "maintenance" => $service_maintenance,
        "date_created" => $date_requested
      ];
      $connection2 = $server->openConn();
      $stmt2 = $connection2->prepare($query2);
      $stmt2->execute($data2);
   
        $_SESSION['status'] = "Request Success";
        $_SESSION['text'] = "Your request has been sent.";
        $_SESSION['status_code'] = "success";
      
        
    }
  }
}


?>