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
  $ACTIVE = "ACTIVE";

  // CHECK IF THERE IS CURRENT ACTIVE PROPERTY ALREADY REGISTERED
  $query1 = "SELECT blk,lot FROM property_list WHERE 
  blk = :blk AND
  lot = :lot AND
  archive = :ACTIVE
  ";
  $data1 = [
    "blk" => $blk,
    "lot" => $lot,
    "ACTIVE" => $ACTIVE
  ];
  $connection1 = $server->openConn();
  $stmt1 = $connection1->prepare($query1);
  $stmt1->execute($data1);
  if($stmt1->rowCount() > 0){
    $_SESSION['status'] = "Failed!";
    $_SESSION['text'] = "Property already exist!";
    $_SESSION['status_code'] = "error";
  } else {


  

  $query2 = "INSERT INTO property_list (homeowners_id, blk, lot, phase, street) VALUES(:homeowners_id, :blk, :lot, :phase, :street)";
  $data2 = [
    "homeowners_id" => $homeowners_id,
    "blk" => $blk,
    "lot" => $lot,
    "phase" => $phase,
    "street" => $street
  ];
  $path = "../admin-panel/property.php";
  $server->insert($query2, $data2);



  $query3 = "SELECT * FROM homeowners_users WHERE id = :id";
  $data3 = ["id" => $homeowners_id];
  $connection3 = $server->openConn();
  $stmt3 = $connection3->prepare($query3);
  $stmt3->execute($data3);
  $count3 = $stmt3->rowCount();

  if ($count3) {
    while ($result = $stmt3->fetch()) {
      $account_number = $result['account_number'];
      $firstname = $result['firstname'];
      $lastname = $result['lastname'];
    }
  }
  $action = "Register property: ". "BLK-". $blk ." ". "LOT-". $lot ." ". $phase ." ". $street ." to " . $account_number . ": " . $firstname ." ". $lastname ."";
  $server->insertActivityLog($action);
  $server->insertCollection();
  // $connection = $server->openConn();
  // $stmt = $connection->prepare($query);
  // $stmt->execute($data);
  // $count = $stmt->rowCount();

}

}

?>