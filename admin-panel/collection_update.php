<?php
require_once("../libs/server.php");
date_default_timezone_set('Asia/Manila');
session_start();
$server = new Server;
?>

<?php
if (isset($_POST['update_collection_btn'])) {
  $collection_id = filter_input(INPUT_POST, 'update_collection_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $category = filter_input(INPUT_POST, 'update_category', FILTER_SANITIZE_SPECIAL_CHARS);
  $description = filter_input(INPUT_POST, 'update_description', FILTER_SANITIZE_SPECIAL_CHARS);
  $fee = filter_input(INPUT_POST, 'update_fee', FILTER_SANITIZE_SPECIAL_CHARS);

  if (isset($collection_id) && isset($category) && isset($fee)) {
    $query = "UPDATE collection_fee SET category = :category, description = :description, fee = :fee WHERE id = :collection_id";
    $data = [
      "category" => $category,
      "description" => $description,
      "fee" => $fee,
      "collection_id" => $collection_id
    ];
    $connection = $server->openConn();
    $stmt = $connection->prepare($query);
    $stmt->execute($data);
    $count = $stmt->rowCount();

    if($count > 0){
      $_SESSION['status'] = "Update Success!";
      $_SESSION['text'] = "collection Succesfuly updated";
      $_SESSION['status_code'] = "success";
    }
  } else {
    $_SESSION['status'] = "Failed!";
    $_SESSION['text'] = "Invalid input, please fill all the required fields";
    $_SESSION['status_code'] = "danger";
  }
}
header("location: ../admin-panel/collections.php");
?>