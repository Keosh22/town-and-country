<?php
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;
// if($_SERVER["REQUEST_METHOD"] == "POST"){
if (isset($_POST['update_property_modal'])) {


  $property_id = filter_input(INPUT_POST, 'property_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $blk_property = filter_input(INPUT_POST, 'blk_property', FILTER_SANITIZE_SPECIAL_CHARS);
  $lot_property = filter_input(INPUT_POST, 'lot_property', FILTER_SANITIZE_SPECIAL_CHARS);
  $phase_property = filter_input(INPUT_POST, 'phase_property', FILTER_SANITIZE_SPECIAL_CHARS);
  $street_property = filter_input(INPUT_POST, 'street_property', FILTER_SANITIZE_SPECIAL_CHARS);

  if (empty($blk_property) && empty($blk_property) && empty($lot_property) && empty($phase_property) && empty($street_property)) {
    $_SESSION['status'] = "Failed!";
    $_SESSION['text'] = "Invalid input, please fill all the required fields";
    $_SESSION['status_code'] = "danger";
  } else {
    $query = "SELECT * FROM property_list WHERE id = :property_id";
    $data = ["property_id" => $property_id];
    $connection = $server->openConn();
    $stmt = $connection->prepare($query);
    $stmt->execute($data);
    $count = $stmt->rowCount();

    if ($count > 0) {
      while ($result = $stmt->fetch()) {
        $property_id_fetch = $result['id'];
        $blk_property_fetch = $result['blk'];
        $lot_property_fetch = $result['lot'];
        $phase_property_fetch = $result['phase'];
        $street_property_fetch = $result['street'];
      }


      $query = "UPDATE property_list SET blk = :blk_property, lot = :lot_property, phase = :phase_property, street = :street_property WHERE id = :property_id";
      $data = [
        "blk_property" => $blk_property,
        "lot_property" => $lot_property,
        "phase_property" => $phase_property,
        "street_property" => $street_property,
        "property_id" => $property_id
      ];
      $connection = $server->openConn();
      $stmt = $connection->prepare($query);
      $stmt->execute($data);
      $count = $stmt->rowCount();
      $changed = "The following information has been updated: ";

      if ($blk_property_fetch == $blk_property && $lot_property_fetch == $lot_property && $phase_property_fetch == $phase_property && $street_property_fetch == $street_property) {
        $_SESSION['status'] = "No information has been changed!";
        $_SESSION['text'] = "";
        $_SESSION['status_code'] = "info";
      } else {


        if ($blk_property_fetch != $blk_property) {
          $changed .= " BLK";
        }
        if ($lot_property_fetch != $lot_property) {
          $changed .= "LOT";
        }
        if ($phase_property_fetch != $phase_property) {
          $changed .= "PHASE";
        }
        if ($street_property_fetch != $street_property) {
          $changed .= "STREET";
        }
        $_SESSION['status'] = "Success!";
        $_SESSION['text'] = $changed;
        $_SESSION['status_code'] = "success";
        // Activity log
        $action = "Update property information of " . $account_number . ": " . $firstname . " = " . $changed . "";
        $server->insertActivityLog($action);
      }
    }
  }
header("location: ../admin-panel/homeowners.php");
}
