<?php
// Server
require_once("../libs/server.php");
?>

<?php
$server = new Server;
if (isset($_POST['update'])) {

  

  $street_id = $_POST['street_id'];
  $street_update = $_POST['street_update'];
  $phase_update = $_POST['phase_update'];

  if (isset($street_id) && isset($street_update) && isset($phase_update)) {

    $query = "SELECT * FROM street_list WHERE id = :street_id";
    $data = ["street_id" => $street_id];
    $connection = $server->openConn();
    $stmt = $connection->prepare($query);
    $stmt->execute($data);
    $count = $stmt->rowCount();

    if ($count) {
    
      while ($result = $stmt->fetch()) {
        $phase = $result['phase'];
        $street = $result['street'];
      }
      if ($phase == $phase_update && $street == $street_update ) {
       
        $_SESSION['status'] = "Warning!";
        $_SESSION['text'] = "You enter the same phase!";
        $_SESSION['status_code'] = "warning";
      } else {
        
        $query = "UPDATE street_list SET phase = :phase_update, street = :street_update WHERE id = :street_id";
        $data = [
          "phase_update" => $phase_update,
          "street_update" => $street_update,
          "street_id" => $street_id
        ];
        $connection = $server->openConn();
        $stmt = $connection->prepare($query);
        $stmt->execute($data);
        $count = $stmt->rowCount();
        if ($count) {
          $_SESSION['status'] = "Success!";
          $_SESSION['text'] = "Update Success";
          $_SESSION['status_code'] = "success";
        }
      }
    } else {
      
      $_SESSION['status'] = "Warning!";
      $_SESSION['text'] = "Something went wrong!";
      $_SESSION['status_code'] = "warning";
    }
  }
  header("location: ../admin-panel/street.php");
}
?>