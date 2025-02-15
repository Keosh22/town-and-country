<?php
require_once("../libs/server.php");
?>

<?php
$server = new Server;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $account_number = $_POST['account_number'];
  $tenant = "Tenant";
  $query = "SELECT * FROM homeowners_users WHERE account_number = :account_number AND status = :tenant";
  $data = ["account_number" => $account_number, "tenant" => $tenant];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  $count = $stmt->rowCount();


  $response = '';

  if ($count > 0) {
    while ($result = $stmt->fetch()) {
      $id = $result['id'];
      $firstname = $result['firstname'];
      $lastname = $result['lastname'];
      $middle_initial = $result['middle_initial'];
    }
    $fullname = $firstname . " " . $middle_initial . " " . $lastname;
    $response = '<div class="col">
  <label for="newOwner_name" class="form-label">Tenant:</label>
  <input type="text" class="form-control" name="newOwner_name" id="newOwner_name" value="' . $fullname . '" readonly>
  <input type="hidden" name="transfer_id" id="transfer_id" value="' . $id . '">
  <input type="hidden" name="tenant_id" id="tenant_id" value="' . $id . '">
  </div>
  <div class="col">
  <label for="transfer_password" class="form-label">Input Password:</label>
  <input type="password" class="form-control" name="transfer_password" id="transfer_password" required>
  
  </div>
  
  ';
  } else {
  }
  echo $response;
}
?>

