<?php
require_once("../libs/server.php");
?>
<?php
$server = new Server;
if(isset($_POST['collection_id'])){
  $collection_id = filter_input(INPUT_POST, 'collection_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $query = "SELECT * FROM collection_fee WHERE id = :collection_id";
  $data = ["collection_id" => $collection_id];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  if($count > 0){
    $row = $stmt->fetch();
    echo json_encode($row);
  } else {
    echo "no record found";
  }


}
?>