<?php
require_once("../libs/server.php");
date_default_timezone_set('Asia/Manila');
session_start();
$server = new Server;
?>

<?php
if (isset($_POST['add_collection_btn'])) {
  $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
  $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
  $fee = filter_input(INPUT_POST, 'fee', FILTER_SANITIZE_SPECIAL_CHARS);
  $date_created = date("Y/m/d g:i:A", strtotime("now"));
  if (isset($category) && isset($fee)) {

    $query1 = "SELECT collection_fee_number FROM collection_fee ORDER BY collection_fee_number DESC LIMIT 1";
    $connection1 = $server->openConn();
    $stmt1 = $connection1->prepare($query1);
    $stmt1->execute();
    if ($stmt1->rowCount() > 0) {
      if ($result1 = $stmt1->fetch()) {
        $collection_fee_number = $result1['collection_fee_number'];

        $get_number = str_replace("C", "", $collection_fee_number);
        $number_increment = $get_number + 1;
        $number_pad = str_pad($number_increment, 3, 0, STR_PAD_LEFT);
        $new_collection_fee_num = "C" . $number_pad;
      }
    }


    $query = "INSERT INTO collection_fee (collection_fee_number, category,description, fee, date_created) VALUES (:collection_fee_number,:category, :description, :fee, :date_created)";
    $data = ["collection_fee_number" => $new_collection_fee_num, "category" => $category, "description" => $description, "fee" => $fee, "date_created" => $date_created];
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



