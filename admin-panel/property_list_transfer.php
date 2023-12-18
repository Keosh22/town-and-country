<?php
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;
if (isset($_POST['transfer'])) {
  $homeowners_id = filter_input(INPUT_POST, 'transfer_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $property_id = filter_input(INPUT_POST, 'property_transfer_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $transfer_password = filter_input(INPUT_POST, 'transfer_password', FILTER_SANITIZE_SPECIAL_CHARS);
  $property_address = filter_input(INPUT_POST, 'property_address', FILTER_SANITIZE_SPECIAL_CHARS);
  $property_currentOwner = filter_input(INPUT_POST, 'property_currentOwner', FILTER_SANITIZE_SPECIAL_CHARS);
  $newOwner_name = filter_input(INPUT_POST, 'newOwner_name', FILTER_SANITIZE_SPECIAL_CHARS);
  $admin_id = $_SESSION['admin_id'];

  if (empty($homeowners_id) || empty($property_id)) {
    $_SESSION['status'] = "Warning!";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "warning";
  } else {
    $query = "SELECT * FROM admin_users WHERE id = :admin_id";
    $data = [
      "admin_id" => $admin_id
    ];
    $pass = $transfer_password;
    $isTrue = $server->verifyPassword($query, $data, $pass);

    if ($isTrue) {
      $query = "UPDATE property_list SET homeowners_id = :homeowners_id WHERE id = :property_id ";
      $data = [
        "homeowners_id" => $homeowners_id,
        "property_id" => $property_id
      ];
      $connection = $server->openConn();
      $stmt = $connection->prepare($query);
      $stmt->execute($data);
      $count = $stmt->rowCount();
      if ($count > 0) {
        $_SESSION['status'] = "Transfer Success!";
        $_SESSION['text'] = "You successfuly transfer the ownersip of this property.";
        $_SESSION['status_code'] = "success";
        $action = "Transfer property: " . $property_address . " FROM:  " . $property_currentOwner . " TO: " . $newOwner_name . "";
        $server->insertActivityLog($action);
      } else {
        $_SESSION['status'] = "Transfer Failed!";
        $_SESSION['text'] = "Transfer of ownership failed.";
        $_SESSION['status_code'] = "danger";
      }
    } else {
      $_SESSION['status'] = "Wrong Password!";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "danger";
    }
  }
  header("location: ../admin-panel/property_list.php");
}

?>