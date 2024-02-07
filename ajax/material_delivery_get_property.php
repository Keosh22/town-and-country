<?php
require_once("../libs/server.php");
?>

<?php
$server = new Server;
if (isset($_POST['blk']) && isset($_POST['lot']) && isset($_POST['phase'])  && isset($_POST['street'])) {

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
    homeowners_users.firstname,
    homeowners_users.middle_initial,
    homeowners_users.lastname,
    homeowners_users.id as homeowners_id
    FROM property_list INNER JOIN
    homeowners_users ON property_list.homeowners_id = homeowners_users.id WHERE property_list.archive = :ACTIVE AND property_list.blk = :blk AND property_list.lot = :lot AND property_list.phase = :phase AND property_list.street = :street LIMIT 1
  ";
  $data1 = ["ACTIVE" => $ACTIVE, "blk" => $blk, "lot" => $lot, "phase" => $phase, "street" => $street];
  $connection1 = $server->openConn();
  $stmt1 = $connection1->prepare($query1);
  $stmt1->execute($data1);
  if ($stmt1->rowCount() > 0) {
    while ($result1 = $stmt1->fetch()) {
      $firstname = $result1['firstname'];
      $middle_name = $result1['middle_initial'];
      $lastname = $result1['lastname'];
      $homeowners_id = $result1['homeowners_id'];

      $name = $firstname . ' ' . $middle_name . ' ' . $lastname;
      
    }
    $response = ["name" => $name, "homeowners_id" => $homeowners_id];
  } else {
    $response = ["name" => 'No Record Found'];
  }
  echo json_encode($response);
}
?>

