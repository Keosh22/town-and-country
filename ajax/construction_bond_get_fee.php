<?php
require_once("../libs/server.php");
?>

<?php
$server = new Server;
if (isset($_POST['sqm_cb'])) {
  $sqm_cb = filter_input(INPUT_POST, 'sqm_cb', FILTER_SANITIZE_SPECIAL_CHARS);
  $collection_fee_number = 'C002';
  $status = 'ACTIVE';
  $response = [];

  $query1 = "SELECT id,category, description, fee FROM collection_fee WHERE collection_fee_number = :collection_fee_number AND status = :ACTIVE";
  $data1 = ["collection_fee_number" => $collection_fee_number, "ACTIVE" => $status];
  $connection1 = $server->openConn();
  $stmt1 = $connection1->prepare($query1);
  $stmt1->execute($data1);
  if($stmt1->rowCount() > 0){
    while($result1 = $stmt1->fetch()){
      $fee = $result1['fee'];

      $collection_id = $result1['id'];

      $total_fee = $sqm_cb * intval($fee);
      
      $response = ["fee" => $total_fee, "collection_fee_id" => $collection_id];
      
    }
  }
  echo json_encode($response);
}
?>

