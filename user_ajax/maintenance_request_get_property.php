<?php
require_once "../libs/server.php";
session_start();
$server = new Server;
?>

<?php
if (isset($_POST['user_id'])) {
  $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $property_list = "";
  $ACTIVE = "ACTIVE";

  $query = "SELECT * FROM property_list WHERE homeowners_id = :user_id AND archive = :ACTIVE ";
  $data = ["user_id" => $user_id, "ACTIVE" => $ACTIVE];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  if ($stmt->rowCount() > 0) {
    while ($result = $stmt->fetch()) {
      $property_id = $result['id'];
      $address = "BLK-" . $result['blk'] . " LOT-" . $result['lot'] . " " . $result['street'] . " St. " . $result['phase'];

      $property_list .= '
    <div class="col-12">
      <div class="input-group">
        <div class="input-group-text">
          <div class="form-check">
            <input type="checkbox" class="form-check-input property_id_checkbox"  value="' . $property_id . '">
            <label  class="form-check-label"><b>Property</b></label>
          </div>
        </div>
        <input type="text" class="form-control" value="' . $address . '" readonly>
      </div>
    </div>
      ';
    }

    echo $property_list;
  }
}
?>