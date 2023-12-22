<?php
require_once("../libs/server.php");
date_default_timezone_set('Asia/Manila');
session_start();
$server = new Server;
?>

<?php
if (isset($_POST['add_collection_btn'])) {
  $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
  $fee = filter_input(INPUT_POST, 'fee', FILTER_SANITIZE_SPECIAL_CHARS);
  $date_created = date("Y/m/d g:i:A", strtotime("now"));
  if (isset($description) && isset($fee)) {
    $query = "INSERT INTO collection_list (description, fee, date_created) VALUES (:description, :fee, :date_created)";
    $data = ["description" => $description, "fee" => $fee, "date_created" => $date_created];
    $connection = $server->openConn();
    $stmt = $connection->prepare($query);
    $stmt->execute($data);
    $count = $stmt->rowCount();
    if ($count > 0) {
      $_SESSION['status'] = "Collection has been successfuly added!";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "success";
    } else {
      $_SESSION['status'] = "Creating Collection Failed!";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "danger";
    }
  } else {
    $_SESSION['status'] = "Creating Collection Failed!";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "danger";
  }

  header("location: ../admin-panel/collections.php");
}
?>



