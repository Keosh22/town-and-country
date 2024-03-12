<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server;

if (isset($_POST['category']) && $_POST['category'] != "") {
  $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
  $date_created = date("Y-m-d H:s:iA", strtotime("now"));

  $query1 = "INSERT INTO maintenance (category, date_created) VALUES (:category, :date_created)";
  $data1 = ["category" => $category, "date_created" => $date_created];
  $connection1 = $server->openConn();
  $stmt1 = $connection1->prepare($query1);
  $stmt1->execute($data1);
  if ($stmt1->rowCount() > 0) {
    $_SESSION['status'] = "Maintenance service created succesfuly";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "success";
  } else {
    $_SESSION['status'] = "Error";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
  }
} 



?>