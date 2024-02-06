<?php
require_once("../libs/server.php");
?>

<?php
$server = new Server;
if(isset($_POST['blk']) && isset($_POST['lot']) && isset($_POST['phase'])  && isset($_POST['blk'])  ){

  $blk = filter_input(INPUT_POST, 'blk', FILTER_SANITIZE_SPECIAL_CHARS);
  $lot = filter_input(INPUT_POST, 'lot', FILTER_SANITIZE_SPECIAL_CHARS);
  $phase = filter_input(INPUT_POST, 'phase', FILTER_SANITIZE_SPECIAL_CHARS);
  $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_SPECIAL_CHARS);
  $ACTIVE = "ACTIVE";
  $response = [];
  $query1 = "SELECT
    property_list.blk as property_blk,
    property_list.lot as property_lot,
    property_list.phase as property_phase,
    property_list.street as property_street,
    homeowners_users.name,
    homeowners_users.middle_initial,
    homeowners_users.lastname
    FROM property_list INNER JOIN
    homeowners_users ON property_list.homeowners_users = homeowners_users.id WHERE archive = :ACTIVE LIMIT 1
  ";
  $data1 = ["ACTIVE" => $ACTIVE];
  $connection1 = $server->openConn();
  $stmt1 = $connection1->prepare($query1);
  $stmt1->execute($data1);
  if($stmt1->rowCount() > 0){
    echo json_encode($stmt1->fetchAll());
  }  else {
    echo "No record found";
  }
}
?>

