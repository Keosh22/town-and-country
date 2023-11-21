<?php 
require_once("../libs/server.php"); 
session_start();
?>

<?php 
$server = new Server;
if (isset($_POST['street_id'])) {

  $id = $_POST['street_id'];
 
  // Retrieve current street
  $query = "SELECT * FROM street_list WHERE id = :id";
  $data = ["id" => $id];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  $count = $stmt->rowCount();
  if ($count) {
    while ($result = $stmt->fetch()) {
      $street_phase = $result['phase'];
      $street_name = $result['street'];
    }
  } else {
    $_SESSION['status'] = "Warning";
    $_SESSION['text'] = "Something went wrong.";
    $_SESSION['status_code'] = "warning";
  }
} else {
  
}

?>

<script>
  
     
</script>