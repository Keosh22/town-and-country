<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server;

if (isset($_POST['property_id'])) {
    $property_id = filter_input(INPUT_POST, 'property_id', FILTER_SANITIZE_SPECIAL_CHARS);
    $INACTIVE = "INACTIVE";

    // DELETE COLLECTION LIST RECORD 
    $query = "SELECT property_id FROM collection_list WHERE property_id = :property_id AND archive = :INACTIVE";
    $data = ["property_id" => $property_id, "INACTIVE" => $INACTIVE];
    $connection = $server->openConn();
    $stmt = $connection->prepare($query);
    $stmt->execute($data);
    if($stmt->rowCount() > 0){
      while($result = $stmt->fetch()){
        $property_id_result = $result['property_id'];
        $query2 = "DELETE FROM collection_list WHERE property_id = :property_id AND archive = :INACTIVE";
        $data2 = ["property_id" => $property_id_result, "INACTIVE" => $INACTIVE];
        $connection2 = $server->openConn();
        $stmt2 = $connection->prepare($query2);
        $stmt2->execute($data2);
      }
    }

    // DELETE PROPERTY RECORD
    $query1 = "DELETE FROM property_list WHERE id = :property_id AND archive = :INACTIVE";
    $data1 = ["property_id" => $property_id, "INACTIVE" => $INACTIVE];
    $connection1 = $server->openConn();
    $stmt1 = $connection1->prepare($query1);
    $stmt1->execute($data1);
    if($stmt1->rowCount() > 0){
      $_SESSION['status'] = "This property has been permanently deleted!";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "success";
    }


} else {
}
?>