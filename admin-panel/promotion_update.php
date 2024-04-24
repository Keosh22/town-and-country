<?php
require_once("../libs/server.php");
?>

<?php
DATE_DEFAULT_TIMEZONE_SET("Asia/Manila");
session_start();
$server = new Server;


if(isset($_POST['update_promotion'])){
  $promotion_id = filter_input(INPUT_POST, 'promotion_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $update_business_name = filter_input(INPUT_POST, 'update_business_name', FILTER_SANITIZE_SPECIAL_CHARS);
  $update_promotion_due = filter_input(INPUT_POST, 'update_promotion_due', FILTER_SANITIZE_SPECIAL_CHARS);
  $promotion_status = filter_input(INPUT_POST,  'promotion_status', FILTER_SANITIZE_SPECIAL_CHARS);
  $update_promotion_content = $_POST['update_promotion_content'];
  $date_created = date("Y-m-d H:i:sA", strtotime("now"));

  if(empty($promotion_id) || empty($update_business_name) || empty($update_promotion_due) || empty($promotion_status) || empty($update_promotion_content)){
    $_SESSION['status'] = "Please fill all the required fields";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "warning";
  } else {
    $query = "UPDATE promotion SET business_name = :business_name, content = :content, status = :status, date_created = :date_created, date_expired = :date_expired WHERE id = :id";
    $data = [
      "business_name" => $update_business_name,
      "content" => $update_promotion_content,
      "status" => $promotion_status,
      "date_created" => $date_created,
      "date_expired" => $update_promotion_due,
      "id" => $promotion_id
    ];
    $connection = $server->openConn();
    $stmt = $connection->prepare($query);
    $stmt->execute($data);
    $count = $stmt->rowCount();
    if($count > 0){
      $_SESSION['status'] = "Promotion updated successfully!";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "success";
    } else {
      $_SESSION['status'] = "Updating failed";
      $_SESSION['text'] = "Something went wrong.";
      $_SESSION['status_code'] = "danger";
    }
  }
}
header("location: ../admin-panel/promotion.php");
?>