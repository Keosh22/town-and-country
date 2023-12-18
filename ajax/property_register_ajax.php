<!-- SERVER -->
<?php
require_once("../libs/server.php");

?>

<?php
session_start();
$server = new Server;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $homeowners_id = $_POST['homeowners_id'];
  $blk = $_POST['blk'];
  $lot = $_POST['lot'];
  $phase = $_POST['phase'];
  $street = $_POST['street'];



  $query = "INSERT INTO property_list (homeowners_id, blk, lot, phase, street) VALUES(:homeowners_id, :blk, :lot, :phase, :street)";
  $data = [
    "homeowners_id" => $homeowners_id,
    "blk" => $blk,
    "lot" => $lot,
    "phase" => $phase,
    "street" => $street
  ];
  $path = "../admin-panel/property.php";
  $server->insert($query, $data);



  $query = "SELECT * FROM homeowners_users WHERE id = :id";
  $data = ["id" => $homeowners_id];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  if ($count) {
    while ($result = $stmt->fetch()) {
      $account_number = $result['account_number'];
      $firstname = $result['firstname'];
      $lastname = $result['lastname'];
    }
  }
  $action = "Register property: ". "BLK-". $blk ." ". "LOT-". $lot ." ". $phase ." ". $street ." to " . $account_number . ": " . $firstname ." ". $lastname ."";
  $server->insertActivityLog($action);
  // $connection = $server->openConn();
  // $stmt = $connection->prepare($query);
  // $stmt->execute($data);
  // $count = $stmt->rowCount();



}

?>