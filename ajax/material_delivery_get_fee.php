<?php
require_once("../libs/server.php");
?>

<?php
$server = new Server;
if (isset($_POST['wheelers'])) {
  $wheelers = filter_input(INPUT_POST, 'wheelers', FILTER_SANITIZE_SPECIAL_CHARS);

  $response = [];

  $query1 = "SELECT id,category, description, fee FROM collection_fee WHERE collection_fee_number = :wheelers";
  $data1 = ["wheelers" => $wheelers];
  $connection1 = $server->openConn();
  $stmt1 = $connection1->prepare($query1);
  $stmt1->execute($data1);
  if($stmt1->rowCount() > 0){
    while($result1 = $stmt1->fetch()){
      $fee = $result1['fee'];
      $collection_fee_number = ['collection_fee_number'];
      $collection_id = $result1['id'];
      $response = ["fee" => $fee, "collection_fee_id" => $collection_id];
      
    }
  }
  echo json_encode($response);
}
?>

