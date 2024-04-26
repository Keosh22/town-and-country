<?php
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;
?>

<?php
if(isset($_POST['category_id'])){
  $category_id = filter_input(INPUT_POST, 'category_id', FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($category_id)){
    $_SESSION['status'] = "Payment Failed";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "error";
    } else {
    $query = "DELETE FROM maintenance WHERE id = :category_id";
  $data = ["category_id" => $category_id];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  if($stmt->rowCount() > 0){
    $_SESSION['status'] = "Delete Success";
    $_SESSION['text'] = "Maintenance successfully deleted.";
    $_SESSION['status_code'] = "success";
  } else {
       $_SESSION['status'] = "Delete Failed";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "error";
  }
    }
 
}


?>


