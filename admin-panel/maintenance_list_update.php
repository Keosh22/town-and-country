<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server;

if (isset($_POST['category_update']) && isset($_POST['category_id'])) {
  $category = filter_input(INPUT_POST, 'category_update', FILTER_SANITIZE_SPECIAL_CHARS);
  $category_id = filter_input(INPUT_POST, 'category_id', FILTER_SANITIZE_SPECIAL_CHARS);

  if (empty($category) || empty($category_id)) {
    $_SESSION['status'] = "Update Failed!";
    $_SESSION['text'] = "Please fill all the required fields.";
    $_SESSION['status_code'] = "error";
  } else {
    $query2 = "SELECT category FROM maintenance WHERE category = :category";
    $data2 = ["category" => $category];
    $connection2 = $server->openConn();
    $stmt2 = $connection2->prepare($query2);
    $stmt2->execute($data2);
    if ($stmt2->rowCount() > 0) {
      $_SESSION['status'] = "Update Failed!";
      $_SESSION['text'] = "Already exist. Please input different maintenance category.";
      $_SESSION['status_code'] = "warning";
    } else {
      $query1 = "UPDATE maintenance SET category = :category WHERE id = :id";
      $data1 = ["category" => $category, "id" => $category_id];
      $connection1 = $server->openConn();
      $stmt1 = $connection1->prepare($query1);
      $stmt1->execute($data1);
      if ($stmt1->rowCount() > 0) {
        $_SESSION['status'] = "Maintenance service updated succesfully";
        $_SESSION['text'] = "";
        $_SESSION['status_code'] = "success";
      } else {
        $_SESSION['status'] = "Error";
        $_SESSION['text'] = "Something went wrong";
        $_SESSION['status_code'] = "error";
      }
    }
  }
}



?>