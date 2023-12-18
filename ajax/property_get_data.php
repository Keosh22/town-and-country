<?php 
require_once("../libs/server.php"); 
?>

<?php 
$server = new Server;
if(isset($_POST['property_id'])){
  $property_id = $_POST['property_id'];
  $query = "SELECT * FROM property_list WHERE id = :property_id";
  $data = ["property_id" => $property_id];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  if($count > 0){
    $row = $stmt->fetch();
    echo json_encode($row);
  } else {
    echo "No record found";
  }



}
  

?>

