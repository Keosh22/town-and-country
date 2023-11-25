<?php
// Server
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;
if (isset($_POST['add'])) {

  $phase = $_POST['phase'];
  $street = $_POST['street'];
  if (empty($phase) || empty($street)) {
    $_SESSION['status'] = "Warning";
    $_SESSION['text'] = "Something went wrong.";
    $_SESSION['status_code'] = "warning";
    header("location: ../admin-panel/street.php");
   
  } else {
    $query = "SELECT * FROM street_list WHERE street = :street";
    $data = ["street" => $street];
    $connection = $server->openConn();
    $stmt = $connection->prepare($query);
    $stmt->execute($data);
    $count = $stmt->rowCount();

    if ($count) {
      $_SESSION['status'] = "Warning";
      $_SESSION['text'] = "The street you enter already exist!";
      $_SESSION['status_code'] = "warning";
      header("location: ../admin-panel/street.php");
     
    } else {
     
      $query = "INSERT INTO street_list (phase, street) VALUES (:phase, :street)";
      $data = ["phase" => $phase, "street" => $street];
      $path = "../admin-panel/street.php";
      $server->insertPhase($query, $data, $path);
      

      // $connection = $server->openCo $patnn();
      // $stmt = $connection->prepare($query);
      // $stmt->execute($data);
      // $count = $stmt->rowCount();

      // if ($count) {
      //   $_SESSION['status'] = "Success!";
      //   $_SESSION['text'] = "Phase successfuly added.";
      //   $_SESSION['status_code'] = "success";

      // }
    }
  }

}
?>