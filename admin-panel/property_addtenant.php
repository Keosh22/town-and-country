<?php
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;
if (isset($_POST['add_tenant'])) {
  $tenant_id = filter_input(INPUT_POST, 'tenant_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $property_id = filter_input(INPUT_POST, 'property_id_tenant', FILTER_SANITIZE_SPECIAL_CHARS);
  $transfer_password = filter_input(INPUT_POST, 'transfer_password', FILTER_SANITIZE_SPECIAL_CHARS);
  $property_address = filter_input(INPUT_POST, 'property_address', FILTER_SANITIZE_SPECIAL_CHARS);
  $tenant_name = filter_input(INPUT_POST, 'newOwner_name', FILTER_SANITIZE_SPECIAL_CHARS);
  $admin_id = $_SESSION['admin_id'];

  if (empty($tenant_id) || empty($property_id)) {
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
      $query = "UPDATE property_list SET tenant = :tenant_id WHERE id = :property_id ";
      $data = [
        "tenant_id" => $tenant_id,
        "property_id" => $property_id
      ];
      $connection = $server->openConn();
      $stmt = $connection->prepare($query);
      $stmt->execute($data);
      $count = $stmt->rowCount();
      if ($count > 0) {
        $_SESSION['status'] = "Add tenant Success!";
        $_SESSION['text'] = "You successfully add tenant to this property.";
        $_SESSION['status_code'] = "success";
        $action = "Add tenant to property: " . $property_address . " Tenant Acc#: " .  $tenant_name . "";
        $server->insertActivityLog($action);
      } else {
        $_SESSION['status'] = "Add tenant Failed!";
        $_SESSION['text'] = "";
        $_SESSION['status_code'] = "error";
      }
    } else {
      $_SESSION['status'] = "Wrong Password!";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "error";
    }
  }
  header("location: ../admin-panel/homeowners.php");
}

?>